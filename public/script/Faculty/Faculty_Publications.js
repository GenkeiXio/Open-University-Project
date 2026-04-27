/**
 * Faculty_Publications.js
 * Handles: modal open/close, card/list view toggle,
 * filter tabs, search, delete confirmation.
 */

document.addEventListener('DOMContentLoaded', () => {
    if (typeof lucide !== 'undefined') lucide.createIcons();
    updateCount();
});

/* ── Modal helpers ─────────────────────────────────────────── */
function openModal(id) {
    const el = document.getElementById(id);
    if (el) { el.classList.add('open'); document.body.style.overflow = 'hidden'; }
    if (typeof lucide !== 'undefined') lucide.createIcons();
}

function closeModal(id) {
    const el = document.getElementById(id);
    if (el) { el.classList.remove('open'); document.body.style.overflow = ''; }
}

document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', e => {
        if (e.target === overlay) closeModal(overlay.id);
    });
});

document.addEventListener('keydown', e => {
    if (e.key === 'Escape')
        document.querySelectorAll('.modal-overlay.open').forEach(m => closeModal(m.id));
});

/* ── View toggle (grid / list) ─────────────────────────────── */
const gridView   = document.getElementById('pubGrid');
const listView   = document.getElementById('pubList');
const btnGrid    = document.getElementById('btnGrid');
const btnList    = document.getElementById('btnList');

btnGrid?.addEventListener('click', () => {
    gridView?.classList.remove('hidden');
    listView?.classList.add('hidden');
    btnGrid.classList.add('active');
    btnList.classList.remove('active');
});

btnList?.addEventListener('click', () => {
    listView?.classList.remove('hidden');
    gridView?.classList.add('hidden');
    btnList.classList.add('active');
    btnGrid.classList.remove('active');
});

/* ── Filter tabs ───────────────────────────────────────────── */
document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        const filter = this.getAttribute('data-filter');

        // Grid cards
        document.querySelectorAll('.pub-card[data-type]').forEach(card => {
            card.style.display = (filter === 'all' || card.getAttribute('data-type') === filter) ? '' : 'none';
        });

        // List items
        document.querySelectorAll('.pub-list-item[data-type]').forEach(item => {
            item.style.display = (filter === 'all' || item.getAttribute('data-type') === filter) ? '' : 'none';
        });

        updateCount();
    });
});

/* ── Search ────────────────────────────────────────────────── */
document.getElementById('pubSearch')?.addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();

    document.querySelectorAll('.pub-card, .pub-list-item').forEach(el => {
        el.style.display = el.textContent.toLowerCase().includes(q) ? '' : 'none';
    });

    updateCount();
});

/* ── Delete confirm ────────────────────────────────────────── */
let targetCard = null;

function confirmDelete(btn) {
    targetCard = btn.closest('.pub-card') || btn.closest('.pub-list-item');
    openModal('deleteModal');
}

document.getElementById('confirmDeleteBtn')?.addEventListener('click', () => {
    if (targetCard) {
        targetCard.style.transition = 'opacity .3s, transform .3s';
        targetCard.style.opacity   = '0';
        targetCard.style.transform = 'scale(.95)';
        setTimeout(() => { targetCard.remove(); targetCard = null; updateCount(); }, 300);
    }
    closeModal('deleteModal');
});

/* ── Count helper ──────────────────────────────────────────── */
function updateCount() {
    const all     = document.querySelectorAll('.pub-card');
    const visible = [...all].filter(c => c.style.display !== 'none').length;
    const el      = document.getElementById('pubCount');
    if (el) {
        el.textContent = visible === all.length
            ? `${all.length} publications`
            : `${visible} of ${all.length} publications`;
    }
}

/* ── Add publication form stub ─────────────────────────────── */
document.getElementById('addPubForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    console.info('Publication form submitted — connect to backend route.');
    closeModal('addModal');
    this.reset();
});