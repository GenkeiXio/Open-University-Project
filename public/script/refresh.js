document.addEventListener("DOMContentLoaded", function() {
    const hash = window.location.hash;
    const tabContent = document.getElementById("buouTabContent");
    
    if (hash) {
        const targetButton = document.querySelector(`button[data-bs-target="${hash}"]`);
        
        if (targetButton) {
            // Remove 'active' and 'show' from the default Home tab
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            // Activate the correct tab based on the URL
            const tabTrigger = new bootstrap.Tab(targetButton);
            tabTrigger.show();
        }
    }

    // Now that the correct tab is active, show the content area
    if (tabContent) {
        tabContent.classList.add('ready');
    }

    // Update URL when user clicks different tabs
    const tabButtons = document.querySelectorAll('button[data-bs-toggle="tab"]');
    tabButtons.forEach(button => {
        button.addEventListener('shown.bs.tab', function(event) {
            const targetId = event.target.getAttribute('data-bs-target');
            history.replaceState(null, null, targetId);
        });
    });
});