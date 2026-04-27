/**
 * Faculty_Seminar.js (Presentations)
 * Handles: modal, filter tabs, search, delete confirmation.
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

/* ── Filter tabs ───────────────────────────────────────────── */
document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        const filter = this.getAttribute('data-filter');
        document.querySelectorAll('.pres-card[data-type]').forEach(card => {
            card.style.display = (filter === 'all' || card.getAttribute('data-type') === filter) ? '' : 'none';
        });
        updateCount();
    });
});

/* ── Search ────────────────────────────────────────────────── */
document.getElementById('presSearch')?.addEventListener('input', function () {
    const q = this.value.trim().toLowerCase();
    document.querySelectorAll('.pres-card').forEach(card => {
        card.style.display = card.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
    updateCount();
});

/* ── Delete confirm ────────────────────────────────────────── */
let targetCard = null;

function confirmDelete(btn) {
    targetCard = btn.closest('.pres-card');
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

/* ── Count ─────────────────────────────────────────────────── */
function updateCount() {
    const all     = document.querySelectorAll('.pres-card');
    const visible = [...all].filter(c => c.style.display !== 'none').length;
    const el      = document.getElementById('presCount');
    if (el) {
        el.textContent = visible === all.length
            ? `${all.length} presentations`
            : `${visible} of ${all.length} presentations`;
    }
}

/* ── Form stub ─────────────────────────────────────────────── */
document.getElementById('addPresForm')?.addEventListener('submit', function (e) {
    e.preventDefault();
    console.info('Presentation form submitted — connect to backend route.');
    closeModal('addModal');
    this.reset();
});