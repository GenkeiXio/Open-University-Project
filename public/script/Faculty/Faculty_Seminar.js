/**
 * Faculty_Seminar.js  v2
 * Full implementation: modal open/close, dynamic edit population,
 * filter tabs with live counts, search with debounce,
 * delete confirmation with animation, view toggle (grid/list),
 * form validation, toast notifications, CSV export.
 */

/* ══════════════════════════════════════════════════════════════
   TOAST NOTIFICATIONS
══════════════════════════════════════════════════════════════ */
(function () {
    const container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);

    window.showToast = function (message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.innerHTML = `<span class="toast-dot"></span>${message}`;
        container.appendChild(toast);
        setTimeout(() => toast.remove(), 3100);
    };
})();

/* ══════════════════════════════════════════════════════════════
   MODAL HELPERS
══════════════════════════════════════════════════════════════ */
function openModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
    setTimeout(() => {
        const first = modal.querySelector('input:not([type=hidden]), select, textarea');
        if (first) first.focus();
    }, 260);
    if (typeof lucide !== 'undefined') lucide.createIcons();
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    modal.classList.remove('open');
    document.body.style.overflow = '';
    clearFormErrors(modal);
}

/* Close on backdrop */
document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', e => {
        if (e.target === overlay) closeModal(overlay.id);
    });
});

/* Close on Escape */
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        document.querySelectorAll('.modal-overlay.open').forEach(m => closeModal(m.id));
    }
});

/* ══════════════════════════════════════════════════════════════
   FORM VALIDATION
══════════════════════════════════════════════════════════════ */
function clearFormErrors(scope) {
    scope.querySelectorAll('.form-input.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    scope.querySelectorAll('.form-error.visible').forEach(el => el.classList.remove('visible'));
}

function validateForm(form) {
    let valid = true;
    form.querySelectorAll('[required]').forEach(el => {
        const errorEl = el.parentElement.querySelector('.form-error');
        if (!el.value.trim()) {
            el.classList.add('is-invalid');
            if (errorEl) errorEl.classList.add('visible');
            valid = false;
        } else {
            el.classList.remove('is-invalid');
            if (errorEl) errorEl.classList.remove('visible');
        }
    });
    return valid;
}

document.querySelectorAll('.form-input[required]').forEach(el => {
    el.addEventListener('input', function () {
        if (this.value.trim()) {
            this.classList.remove('is-invalid');
            const err = this.parentElement.querySelector('.form-error');
            if (err) err.classList.remove('visible');
        }
    });
});

/* ══════════════════════════════════════════════════════════════
   DELETE CONFIRMATION
══════════════════════════════════════════════════════════════ */
let cardToDelete = null;

function confirmDelete(btn) {
    cardToDelete = btn.closest('.pres-card, .pres-list-card');
    openModal('deleteModal');
}

document.getElementById('confirmDeleteBtn')?.addEventListener('click', () => {
    if (cardToDelete) {
        cardToDelete.style.transition = 'opacity .3s ease, transform .3s ease';
        cardToDelete.style.opacity = '0';
        cardToDelete.style.transform = 'scale(.94)';
        setTimeout(() => {
            cardToDelete.remove();
            cardToDelete = null;
            refreshUI();
            showToast('Presentation deleted.', 'error');
        }, 320);
    }
    closeModal('deleteModal');
});

/* ══════════════════════════════════════════════════════════════
   DYNAMIC EDIT MODAL — populate from card data
══════════════════════════════════════════════════════════════ */
function openEditModal(btn) {
    const card = btn.closest('.pres-card, .pres-list-card');
    const form = document.getElementById('editPresForm');
    if (!card || !form) return;

    // Read data attributes set on the card
    form.querySelector('[name="txt_title"]').value    = card.dataset.title    || '';
    form.querySelector('[name="txt_venue"]').value    = card.dataset.venue    || '';
    form.querySelector('[name="txt_location"]').value = card.dataset.location || '';
    form.querySelector('[name="txt_date"]').value     = card.dataset.isodate  || '';
    form.querySelector('[name="txt_type"]').value     = card.dataset.type     || '';
    form.querySelector('[name="txt_role"]').value     = card.dataset.role     || '';
    form.querySelector('[name="txt_status"]').value   = card.dataset.status   || '';

    form._editCard = card;
    openModal('editModal');
}

/* ══════════════════════════════════════════════════════════════
   FILTER TABS
══════════════════════════════════════════════════════════════ */
function buildTabCounts() {
    const cards = document.querySelectorAll('[data-pres-type]');
    const counts = { all: cards.length };
    cards.forEach(c => {
        const t = c.getAttribute('data-pres-type');
        counts[t] = (counts[t] || 0) + 1;
    });

    document.querySelectorAll('.filter-tab').forEach(tab => {
        const filter  = tab.getAttribute('data-filter');
        const countEl = tab.querySelector('.tab-count');
        if (countEl) countEl.textContent = counts[filter] ?? 0;
    });
}

let currentFilter = 'all';

document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        currentFilter = this.getAttribute('data-filter');
        applyFilters();
    });
});

/* ══════════════════════════════════════════════════════════════
   SEARCH WITH DEBOUNCE
══════════════════════════════════════════════════════════════ */
let searchQuery = '';
let searchTimer;

document.getElementById('presSearch')?.addEventListener('input', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
        searchQuery = this.value.trim().toLowerCase();
        applyFilters();
    }, 180);
});

/* ══════════════════════════════════════════════════════════════
   COMBINED FILTER + SEARCH
══════════════════════════════════════════════════════════════ */
function applyFilters() {
    const cards   = document.querySelectorAll('[data-pres-type]');
    let visible   = 0;

    cards.forEach(card => {
        const typeMatch   = currentFilter === 'all' || card.getAttribute('data-pres-type') === currentFilter;
        const searchMatch = !searchQuery || card.textContent.toLowerCase().includes(searchQuery);
        const show        = typeMatch && searchMatch;

        card.style.display = show ? '' : 'none';
        if (show) visible++;
    });

    updatePresCount(visible, cards.length);
    toggleEmptyState(visible === 0);
}

function updatePresCount(visible, total) {
    const el = document.getElementById('presCount');
    if (!el) return;
    el.textContent = visible === total
        ? `${total} presentation${total === 1 ? '' : 's'}`
        : `${visible} of ${total} presentations`;
}

function toggleEmptyState(show) {
    const empty = document.getElementById('presEmptyState');
    if (empty) empty.style.display = show ? 'block' : 'none';
}

/* ══════════════════════════════════════════════════════════════
   VIEW TOGGLE (grid / list)
══════════════════════════════════════════════════════════════ */
const gridWrapper = document.getElementById('presGrid');
const listWrapper = document.getElementById('presList');

document.getElementById('viewGrid')?.addEventListener('click', function () {
    setViewMode('grid');
});

document.getElementById('viewList')?.addEventListener('click', function () {
    setViewMode('list');
});

function setViewMode(mode) {
    document.getElementById('viewGrid')?.classList.toggle('active', mode === 'grid');
    document.getElementById('viewList')?.classList.toggle('active', mode === 'list');
    if (gridWrapper) gridWrapper.style.display = mode === 'grid' ? '' : 'none';
    if (listWrapper) listWrapper.style.display = mode === 'list' ? '' : 'none';
}

/* ══════════════════════════════════════════════════════════════
   FORM SUBMIT — ADD PRESENTATION
══════════════════════════════════════════════════════════════ */
const TYPE_COLORS = {
    International: '#10b981',
    National:      '#2563eb',
    Regional:      '#06b6d4',
    Local:         '#7c3aed',
    'Invited Talk':'#F57C00',
};

const TYPE_BADGES = {
    International: 'badge-green',
    National:      'badge-blue',
    Regional:      'badge-blue',
    Local:         'badge-purple',
    'Invited Talk':'badge-orange',
};

document.getElementById('addPresForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validateForm(this)) return;

    const fd   = new FormData(this);
    const data = Object.fromEntries(fd.entries());

    const color     = TYPE_COLORS[data.txt_type]  || '#10b981';
    const isoDate   = data.txt_date || '';
    const dispDate  = isoDate
        ? new Date(isoDate).toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' })
        : '—';
    const isUpcoming = data.txt_status === 'Upcoming';
    const icon      = (data.txt_role === 'Keynote Speaker' || data.txt_role === 'Invited Speaker')
        ? 'mic' : 'presentation';

    // Build grid card
    const card = document.createElement('div');
    card.className = 'pres-card';
    card.setAttribute('data-pres-type', data.txt_type || '');
    card.dataset.title    = data.txt_title    || '';
    card.dataset.venue    = data.txt_venue    || '';
    card.dataset.location = data.txt_location || '';
    card.dataset.isodate  = isoDate;
    card.dataset.type     = data.txt_type  || '';
    card.dataset.role     = data.txt_role  || '';
    card.dataset.status   = data.txt_status || '';
    card.style.animationDelay = '0s';
    card.innerHTML = `
        <div class="pres-card-head" style="background:${color};">
            <div class="pres-card-icon">
                <i data-lucide="${icon}" style="width:20px;height:20px;color:#fff;"></i>
            </div>
            <h6>${escapeHtml(data.txt_title || '')}</h6>
            <div class="pres-venue">${escapeHtml(data.txt_venue || '')}</div>
        </div>
        <div class="pres-card-body">
            <div class="pres-card-meta">
                ${data.txt_location ? `<span><i data-lucide="map-pin" style="width:11px;height:11px;"></i>${escapeHtml(data.txt_location)}</span>` : ''}
                <span><i data-lucide="calendar" style="width:11px;height:11px;"></i>${dispDate}</span>
            </div>
            <div class="pres-tags">
                <span class="badge ${TYPE_BADGES[data.txt_type] || 'badge-green'}" style="font-size:.7rem;">${escapeHtml(data.txt_type || '')}</span>
                ${data.txt_role ? `<span class="pres-role-tag">${escapeHtml(data.txt_role)}</span>` : ''}
            </div>
            <div class="pres-card-footer">
                <span class="pres-status" style="color:${isUpcoming ? '#F57C00' : '#10b981'};">
                    <i data-lucide="${isUpcoming ? 'clock' : 'check-circle'}" style="width:12px;height:12px;"></i>
                    ${escapeHtml(data.txt_status || '')}
                </span>
                <div style="display:flex;gap:4px;">
                    <button class="pres-action-btn edit" title="Edit" onclick="openEditModal(this)">
                        <i data-lucide="pencil" style="width:12px;height:12px;"></i>
                    </button>
                    <button class="pres-action-btn del" title="Delete" onclick="confirmDelete(this)">
                        <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                    </button>
                </div>
            </div>
        </div>`;

    gridWrapper?.appendChild(card);

    // Also add to list view
    if (listWrapper) {
        const listCard = document.createElement('div');
        listCard.className = 'pres-list-card';
        listCard.setAttribute('data-pres-type', data.txt_type || '');
        Object.assign(listCard.dataset, card.dataset);
        listCard.innerHTML = `
            <span class="pres-list-dot" style="background:${color};"></span>
            <div class="pres-list-body">
                <div class="pres-list-title">${escapeHtml(data.txt_title || '')}</div>
                <div class="pres-list-meta">
                    <span>${escapeHtml(data.txt_venue || '')}</span>
                    <span>${dispDate}</span>
                </div>
            </div>
            <span class="badge ${TYPE_BADGES[data.txt_type] || 'badge-green'}" style="font-size:.7rem;">${escapeHtml(data.txt_type || '')}</span>
            <div style="display:flex;gap:4px;">
                <button class="pres-action-btn edit" title="Edit" onclick="openEditModal(this)">
                    <i data-lucide="pencil" style="width:12px;height:12px;"></i>
                </button>
                <button class="pres-action-btn del" title="Delete" onclick="confirmDelete(this)">
                    <i data-lucide="trash-2" style="width:12px;height:12px;"></i>
                </button>
            </div>`;
        listWrapper.appendChild(listCard);
    }

    if (typeof lucide !== 'undefined') lucide.createIcons();
    closeModal('addModal');
    this.reset();
    refreshUI();
    showToast('Presentation added!', 'success');
});

/* ══════════════════════════════════════════════════════════════
   FORM SUBMIT — EDIT PRESENTATION
══════════════════════════════════════════════════════════════ */
document.getElementById('editPresForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validateForm(this)) return;

    const fd   = new FormData(this);
    const card = this._editCard;

    if (card) {
        const data     = Object.fromEntries(fd.entries());
        const color    = TYPE_COLORS[data.txt_type] || '#10b981';
        const isoDate  = data.txt_date || '';
        const dispDate = isoDate
            ? new Date(isoDate).toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' })
            : '—';

        // Update dataset
        card.dataset.title    = data.txt_title    || '';
        card.dataset.venue    = data.txt_venue    || '';
        card.dataset.location = data.txt_location || '';
        card.dataset.isodate  = isoDate;
        card.dataset.type     = data.txt_type  || '';
        card.dataset.role     = data.txt_role  || '';
        card.dataset.status   = data.txt_status || '';
        card.setAttribute('data-pres-type', data.txt_type || '');

        // Update visible text on grid cards
        if (card.classList.contains('pres-card')) {
            const head = card.querySelector('.pres-card-head');
            if (head) head.style.background = color;
            const titleEl = card.querySelector('.pres-card-head h6');
            if (titleEl) titleEl.textContent = data.txt_title || '';
            const venueEl = card.querySelector('.pres-venue');
            if (venueEl) venueEl.textContent = data.txt_venue || '';
        }

        // Flash
        card.style.transition = 'outline .15s ease';
        card.style.outline = `2px solid ${color}`;
        setTimeout(() => { card.style.outline = ''; }, 700);

        if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    closeModal('editModal');
    refreshUI();
    showToast('Presentation updated!', 'info');
});

/* ══════════════════════════════════════════════════════════════
   EXPORT CSV
══════════════════════════════════════════════════════════════ */
document.getElementById('exportPresBtn')?.addEventListener('click', () => {
    const cards  = [...document.querySelectorAll('[data-pres-type]')]
                    .filter(c => c.style.display !== 'none' && c.dataset.title);
    const header = ['Title', 'Venue', 'Location', 'Date', 'Type', 'Role', 'Status'];
    const lines  = [header.join(',')];

    cards.forEach(c => {
        const row = [c.dataset.title, c.dataset.venue, c.dataset.location,
                     c.dataset.isodate, c.dataset.type, c.dataset.role, c.dataset.status]
            .map(v => `"${(v || '').replace(/"/g,'""')}"`);
        lines.push(row.join(','));
    });

    const blob = new Blob([lines.join('\n')], { type: 'text/csv' });
    const url  = URL.createObjectURL(blob);
    const a    = Object.assign(document.createElement('a'), { href: url, download: 'presentations.csv' });
    a.click();
    URL.revokeObjectURL(url);
    showToast('Exported as CSV!', 'success');
});

/* ══════════════════════════════════════════════════════════════
   HELPERS
══════════════════════════════════════════════════════════════ */
function escapeHtml(str) {
    return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function refreshUI() {
    buildTabCounts();
    applyFilters();
}

/* ══════════════════════════════════════════════════════════════
   INIT
══════════════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
    if (typeof lucide !== 'undefined') lucide.createIcons();
    buildTabCounts();
    applyFilters();
    setViewMode('grid');  // default to grid view
});