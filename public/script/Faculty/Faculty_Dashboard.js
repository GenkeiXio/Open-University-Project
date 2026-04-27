/**
 * Faculty_Dashboard.js
 * Handles table search filtering and minor UI interactions.
 */

document.addEventListener('DOMContentLoaded', () => {

    /* ── Live table search ─────────────────────────────── */
    const searchInput  = document.getElementById('tableSearch');
    const globalSearch = document.getElementById('globalSearch');
    const tableBody    = document.getElementById('trainingTable');
    const rowCount     = document.getElementById('rowCount');

    function filterTable(query) {
        if (!tableBody) return;

        const rows    = tableBody.querySelectorAll('tr');
        const q       = query.trim().toLowerCase();
        let   visible = 0;

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const show = !q || text.includes(q);
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        if (rowCount) {
            rowCount.textContent = visible === rows.length
                ? `Showing ${rows.length} entries`
                : `Showing ${visible} of ${rows.length} entries`;
        }
    }

    searchInput?.addEventListener('input', e => filterTable(e.target.value));
    globalSearch?.addEventListener('input', e => filterTable(e.target.value));

    /* ── Filter button (stub – extend with dropdown) ──── */
    document.getElementById('filterBtn')?.addEventListener('click', () => {
        // TODO: open filter dropdown / modal
        console.info('Filter clicked – implement dropdown here.');
    });

    /* ── Re-init lucide in case of dynamic content ─────── */
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
