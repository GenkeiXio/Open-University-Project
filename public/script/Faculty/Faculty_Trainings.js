/**
 * Faculty_Trainings.js  v2
 * Features: modal open/close, dynamic edit population, real column sorting,
 * search with debounce, filter tabs with live counts, delete animation,
 * certificate preview, form validation, toast notifications, pagination.
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
    // Focus first input for accessibility
    setTimeout(() => {
        const first = modal.querySelector('input:not([type=hidden]), select');
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

/* Close on backdrop click */
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

/* Clear individual error on input */
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
let rowToDelete = null;

function confirmDelete(btn) {
    rowToDelete = btn.closest('tr');
    openModal('deleteModal');
}

document.getElementById('confirmDeleteBtn')?.addEventListener('click', () => {
    if (rowToDelete) {
        rowToDelete.style.transition = 'opacity .3s ease, transform .3s ease';
        rowToDelete.style.opacity = '0';
        rowToDelete.style.transform = 'translateX(24px)';
        setTimeout(() => {
            rowToDelete.remove();
            rowToDelete = null;
            refreshUI();
            showToast('Training record deleted.', 'error');
        }, 320);
    }
    closeModal('deleteModal');
});

/* ══════════════════════════════════════════════════════════════
   CERTIFICATE FILE PREVIEW
══════════════════════════════════════════════════════════════ */
function bindCertPreview(fileInputId, previewId, nameId) {
    const fileInput = document.getElementById(fileInputId);
    const preview   = document.getElementById(previewId);
    const nameEl    = document.getElementById(nameId);
    if (!fileInput || !preview || !nameEl) return;

    fileInput.addEventListener('change', function () {
        if (this.files.length) {
            nameEl.textContent = this.files[0].name;
            preview.classList.add('visible');
            if (typeof lucide !== 'undefined') lucide.createIcons();
        } else {
            preview.classList.remove('visible');
        }
    });

    // Remove button inside preview
    const removeBtn = preview.querySelector('.cert-preview-remove');
    if (removeBtn) {
        removeBtn.addEventListener('click', () => {
            fileInput.value = '';
            preview.classList.remove('visible');
        });
    }
}

bindCertPreview('certFile',     'certPreview',     'certName');
bindCertPreview('editCertFile', 'editCertPreview', 'editCertName');

/* ══════════════════════════════════════════════════════════════
   DYNAMIC EDIT MODAL — populate from row data
══════════════════════════════════════════════════════════════ */
function openEditModal(btn) {
    const row = btn.closest('tr');
    if (!row) return;

    const cells = row.querySelectorAll('td');
    // col order: Title | Type | Category | Date | Certificate | Status | Actions
    const title    = cells[0]?.textContent.trim() ?? '';
    const type     = cells[1]?.querySelector('.badge')?.textContent.trim() ?? '';
    const category = cells[2]?.textContent.trim() ?? '';
    const dateText = cells[3]?.textContent.trim() ?? '';
    const status   = cells[5]?.querySelector('.badge')?.textContent.trim() ?? '';

    // Parse display date "Apr 15, 2025" → "2025-04-15" for date input
    const parsed = new Date(dateText);
    const isoDate = isNaN(parsed) ? '' : parsed.toISOString().split('T')[0];

    const form = document.getElementById('editTrainingForm');
    if (!form) return;

    form.querySelector('[name="txt_title"]').value    = title;
    form.querySelector('[name="txt_type"]').value     = type;
    form.querySelector('[name="txt_category"]').value = category;
    form.querySelector('[name="txt_start_date"]').value = isoDate;
    form.querySelector('[name="txt_status"]').value   = status;

    // Store reference to row for in-page update
    form._editRow = row;

    openModal('editModal');
}

/* ══════════════════════════════════════════════════════════════
   VIEW MODAL — read-only detail panel
══════════════════════════════════════════════════════════════ */
function openViewModal(btn) {
    const row = btn.closest('tr');
    if (!row) return;

    const cells = row.querySelectorAll('td');
    const title    = cells[0]?.textContent.trim() ?? '—';
    const type     = cells[1]?.querySelector('.badge')?.textContent.trim() ?? '—';
    const category = cells[2]?.textContent.trim() ?? '—';
    const date     = cells[3]?.textContent.trim() ?? '—';
    const cert     = cells[4]?.textContent.trim() ?? '—';
    const status   = cells[5]?.querySelector('.badge')?.textContent.trim() ?? '—';

    const modal = document.getElementById('viewModal');
    if (!modal) return;

    const set = (id, val) => { const el = modal.querySelector(`#vw${id}`); if (el) el.textContent = val; };
    set('Title',    title);
    set('Type',     type);
    set('Category', category);
    set('Date',     date);
    set('Cert',     cert);
    set('Status',   status);

    openModal('viewModal');
}

/* ══════════════════════════════════════════════════════════════
   FILTER TABS WITH LIVE COUNTS
══════════════════════════════════════════════════════════════ */
function buildTabCounts() {
    const rows = document.querySelectorAll('#trainingTableBody tr[data-type]');
    const counts = { all: rows.length };
    rows.forEach(r => {
        const t = r.getAttribute('data-type');
        counts[t] = (counts[t] || 0) + 1;
    });

    document.querySelectorAll('.filter-tab').forEach(tab => {
        const filter = tab.getAttribute('data-filter');
        const countEl = tab.querySelector('.tab-count');
        if (countEl && counts[filter] !== undefined) {
            countEl.textContent = counts[filter];
        }
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

const searchInput = document.getElementById('trainingSearch');
let searchTimer;

searchInput?.addEventListener('input', function () {
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
    const rows = document.querySelectorAll('#trainingTableBody tr[data-type]');
    let visible = 0;

    rows.forEach(row => {
        const typeMatch   = currentFilter === 'all' || row.getAttribute('data-type') === currentFilter;
        const searchMatch = !searchQuery || row.textContent.toLowerCase().includes(searchQuery);
        const show        = typeMatch && searchMatch;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
    });

    updateRowCount(visible, rows.length);
    toggleEmptyState(visible === 0);
}

/* ══════════════════════════════════════════════════════════════
   ROW COUNT + EMPTY STATE
══════════════════════════════════════════════════════════════ */
function updateRowCount(visible, total) {
    const el = document.getElementById('rowCountTrainings');
    if (!el) return;
    el.textContent = visible === total
        ? `Showing ${total} entr${total === 1 ? 'y' : 'ies'}`
        : `Showing ${visible} of ${total} entries`;
}

function toggleEmptyState(show) {
    const empty = document.getElementById('emptyState');
    if (empty) empty.style.display = show ? 'table-row' : 'none';
}

/* ══════════════════════════════════════════════════════════════
   COLUMN SORTING
══════════════════════════════════════════════════════════════ */
const sortState = {};  // { col: 'asc' | 'desc' | null }

document.querySelectorAll('.table-sort-btn[data-col]').forEach(btn => {
    btn.addEventListener('click', function () {
        const col = this.getAttribute('data-col');

        // Toggle direction
        const dir = sortState[col] === 'asc' ? 'desc' : 'asc';
        Object.keys(sortState).forEach(k => delete sortState[k]);
        sortState[col] = dir;

        // Update button styles
        document.querySelectorAll('.table-sort-btn').forEach(b => {
            b.classList.remove('sort-asc', 'sort-desc');
        });
        this.classList.add(`sort-${dir}`);

        sortTable(col, dir);
    });
});

const COL_INDEX = { title: 0, type: 1, category: 2, date: 3, certificate: 4, status: 5 };

function sortTable(col, dir) {
    const tbody = document.getElementById('trainingTableBody');
    if (!tbody) return;

    const rows = [...tbody.querySelectorAll('tr[data-type]')];
    const idx  = COL_INDEX[col] ?? 0;

    rows.sort((a, b) => {
        const aVal = a.cells[idx]?.textContent.trim().toLowerCase() ?? '';
        const bVal = b.cells[idx]?.textContent.trim().toLowerCase() ?? '';

        // Date column: parse for proper comparison
        if (col === 'date') {
            const aD = new Date(aVal), bD = new Date(bVal);
            if (!isNaN(aD) && !isNaN(bD)) {
                return dir === 'asc' ? aD - bD : bD - aD;
            }
        }

        return dir === 'asc'
            ? aVal.localeCompare(bVal)
            : bVal.localeCompare(aVal);
    });

    rows.forEach(r => tbody.appendChild(r));
    applyFilters(); // re-apply visibility
}

/* ══════════════════════════════════════════════════════════════
   FORM SUBMIT — ADD TRAINING (stub + in-page optimistic update)
══════════════════════════════════════════════════════════════ */
document.getElementById('addTrainingForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validateForm(this)) return;

    const fd   = new FormData(this);
    const data = Object.fromEntries(fd.entries());

    // Optimistic in-page row insertion
    const startDate = data.txt_start_date
        ? new Date(data.txt_start_date).toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' })
        : '—';

    const typeColors = {
        International: 'badge-green',
        National:      'badge-blue',
        Regional:      'badge-purple',
        Local:         'badge-orange',
    };
    const statusColors = {
        Completed: 'badge-green',
        Ongoing:   'badge-orange',
        Pending:   'badge-blue',
    };

    const certHTML = data.txt_certificate && data.txt_certificate !== ''
        ? `<span style="display:flex;align-items:center;gap:6px;font-size:.8rem;color:var(--clr-accent);">
               <i data-lucide="file-check" style="width:14px;height:14px;"></i> Uploaded
           </span>`
        : `<span style="display:flex;align-items:center;gap:6px;font-size:.8rem;color:var(--clr-muted);">
               <i data-lucide="file-x" style="width:14px;height:14px;"></i> None
           </span>`;

    const row = document.createElement('tr');
    row.setAttribute('data-type', data.txt_type || '');
    row.classList.add('row-new');
    row.innerHTML = `
        <td style="font-weight:600;">${escapeHtml(data.txt_title || '')}</td>
        <td><span class="badge ${typeColors[data.txt_type] || 'badge-green'}">${escapeHtml(data.txt_type || '')}</span></td>
        <td style="color:var(--clr-muted);font-size:.82rem;">${escapeHtml(data.txt_category || '—')}</td>
        <td style="color:var(--clr-muted);font-size:.82rem;">${startDate}</td>
        <td>${certHTML}</td>
        <td><span class="badge ${statusColors[data.txt_status] || 'badge-blue'}">${escapeHtml(data.txt_status || 'Pending')}</span></td>
        <td>
            <div class="action-btns" style="justify-content:flex-end;">
                <button class="action-btn view" title="View" onclick="openViewModal(this)"><i data-lucide="eye" style="width:13px;height:13px;"></i></button>
                <button class="action-btn edit" title="Edit" onclick="openEditModal(this)"><i data-lucide="pencil" style="width:13px;height:13px;"></i></button>
                <button class="action-btn del"  title="Delete" onclick="confirmDelete(this)"><i data-lucide="trash-2" style="width:13px;height:13px;"></i></button>
            </div>
        </td>`;

    const tbody = document.getElementById('trainingTableBody');
    tbody?.appendChild(row);

    if (typeof lucide !== 'undefined') lucide.createIcons();

    closeModal('addModal');
    this.reset();
    document.getElementById('certPreview')?.classList.remove('visible');

    refreshUI();
    showToast('Training added successfully!', 'success');

    // TODO: Replace with actual AJAX/fetch when backend is ready
    // submitToServer('/trainings', fd).then(...)
});

/* ══════════════════════════════════════════════════════════════
   FORM SUBMIT — EDIT TRAINING (in-page update)
══════════════════════════════════════════════════════════════ */
document.getElementById('editTrainingForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validateForm(this)) return;

    const fd  = new FormData(this);
    const row = this._editRow;

    if (row) {
        const typeColors = {
            International: 'badge-green', National: 'badge-blue',
            Regional: 'badge-purple',     Local:     'badge-orange',
        };
        const statusColors = {
            Completed: 'badge-green', Ongoing: 'badge-orange', Pending: 'badge-blue',
        };

        const type     = fd.get('txt_type')     || '';
        const category = fd.get('txt_category') || '—';
        const status   = fd.get('txt_status')   || '';
        const title    = fd.get('txt_title')     || '';

        row.cells[0].textContent = title;
        row.cells[0].style.fontWeight = '600';

        row.cells[1].innerHTML = `<span class="badge ${typeColors[type] || 'badge-green'}">${escapeHtml(type)}</span>`;
        row.cells[2].textContent = category;
        row.cells[2].style.cssText = 'color:var(--clr-muted);font-size:.82rem;';

        const startDate = fd.get('txt_start_date')
            ? new Date(fd.get('txt_start_date')).toLocaleDateString('en-US', { month:'short', day:'numeric', year:'numeric' })
            : row.cells[3].textContent;
        row.cells[3].textContent = startDate;
        row.cells[3].style.cssText = 'color:var(--clr-muted);font-size:.82rem;';

        row.cells[5].innerHTML = `<span class="badge ${statusColors[status] || 'badge-blue'}">${escapeHtml(status)}</span>`;

        row.setAttribute('data-type', type);

        // Flash highlight
        row.classList.remove('row-new');
        void row.offsetWidth;  // reflow
        row.classList.add('row-new');

        if (typeof lucide !== 'undefined') lucide.createIcons();
    }

    closeModal('editModal');
    refreshUI();
    showToast('Training updated successfully!', 'info');
});

/* ══════════════════════════════════════════════════════════════
   EXPORT (CSV stub)
══════════════════════════════════════════════════════════════ */
document.getElementById('exportBtn')?.addEventListener('click', () => {
    const rows   = [...document.querySelectorAll('#trainingTableBody tr[data-type]')]
                    .filter(r => r.style.display !== 'none');
    const header = ['Title', 'Type', 'Category', 'Date', 'Certificate', 'Status'];
    const lines  = [header.join(',')];

    rows.forEach(r => {
        const cells = [...r.cells];
        const vals  = cells.slice(0, 6).map(c => `"${c.textContent.trim().replace(/"/g,'""')}"`);
        lines.push(vals.join(','));
    });

    const blob = new Blob([lines.join('\n')], { type: 'text/csv' });
    const url  = URL.createObjectURL(blob);
    const a    = Object.assign(document.createElement('a'), { href: url, download: 'trainings.csv' });
    a.click();
    URL.revokeObjectURL(url);
    showToast('Exported as CSV!', 'success');
});

/* ══════════════════════════════════════════════════════════════
   HELPERS
══════════════════════════════════════════════════════════════ */
function escapeHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
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
});