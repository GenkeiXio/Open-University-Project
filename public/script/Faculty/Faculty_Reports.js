/**
 * Faculty_Reports.js
 * Handles: bar chart animation, donut chart drawing,
 * gap-table search, period filter, print/export stubs.
 */

document.addEventListener('DOMContentLoaded', () => {

    /* ── Lucide icons ───────────────────────────────────────── */
    if (typeof lucide !== 'undefined') lucide.createIcons();

    /* ── Animate bar chart ──────────────────────────────────── */
    animateBarChart();

    /* ── Draw donut chart ───────────────────────────────────── */
    drawDonut();

    /* ── Animate score bars ─────────────────────────────────── */
    animateScoreBars();

    /* ── Period filter tabs ─────────────────────────────────── */
    document.querySelectorAll('.period-tab').forEach(tab => {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.period-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            // TODO: Reload chart data for selected period via fetch
            const period = this.getAttribute('data-period');
            console.info('Period filter:', period);
        });
    });

    /* ── Gap table search ───────────────────────────────────── */
    const gapSearch = document.getElementById('gapSearch');
    if (gapSearch) {
        gapSearch.addEventListener('input', function () {
            const q = this.value.trim().toLowerCase();
            document.querySelectorAll('#gapTableBody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    }

    /* ── Export button stub ─────────────────────────────────── */
    document.getElementById('exportBtn')?.addEventListener('click', () => {
        // TODO: Wire up server-side export route
        alert('Export feature — connect to /Faculty/reports/export');
    });

    /* ── Print button ───────────────────────────────────────── */
    document.getElementById('printBtn')?.addEventListener('click', () => {
        window.print();
    });
});

/* ── Bar chart animation ────────────────────────────────────── */
function animateBarChart() {
    const fills = document.querySelectorAll('.bar-fill[data-height]');
    fills.forEach((bar, i) => {
        const h = bar.getAttribute('data-height');
        bar.style.height = '0';
        setTimeout(() => {
            bar.style.height = h + '%';
        }, 100 + i * 60);
    });
}

/* ── Donut SVG chart ────────────────────────────────────────── */
function drawDonut() {
    const canvas = document.getElementById('donutCanvas');
    if (!canvas) return;

    const segments = JSON.parse(canvas.getAttribute('data-segments') || '[]');
    const r = 60, cx = 80, cy = 80;
    const circ = 2 * Math.PI * r;

    let offset = 0;
    const svg = canvas;

    segments.forEach((seg, i) => {
        const pct = seg.value / 100;
        const dash = pct * circ;
        const gap  = circ - dash;

        const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        circle.setAttribute('cx', cx);
        circle.setAttribute('cy', cy);
        circle.setAttribute('r', r);
        circle.setAttribute('fill', 'none');
        circle.setAttribute('stroke', seg.color);
        circle.setAttribute('stroke-width', '18');
        circle.setAttribute('stroke-dasharray', `${dash} ${gap}`);
        circle.setAttribute('stroke-dashoffset', -offset * circ);
        circle.style.transition = `stroke-dasharray .6s ease ${i * 0.1}s`;

        svg.insertBefore(circle, svg.firstChild);
        offset += pct;
    });
}

/* ── Score bar animation ────────────────────────────────────── */
function animateScoreBars() {
    document.querySelectorAll('.score-fill[data-width]').forEach((bar, i) => {
        const w = bar.getAttribute('data-width');
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = w + '%';
        }, 200 + i * 80);
    });
}