<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.news-slider-track');
    const slides = Array.from(track.children);
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    
    let currentIndex = 0;

    // Helper: Get how many cards are visible based on screen width
    function getVisibleCards() {
        if (window.innerWidth >= 992) return 3; // Desktop
        if (window.innerWidth >= 768) return 2; // Tablet
        return 1; // Mobile
    }

    function updateSliderPosition() {
        const slideWidth = slides[0].getBoundingClientRect().width;
        // The gap is defined in CSS (24px)
        const gap = 24; 
        // Calculate move distance
        const moveAmount = (slideWidth + gap) * currentIndex;
        track.style.transform = `translateX(-${moveAmount}px)`;
        
        // Optional: Disable buttons at ends
        const visibleCards = getVisibleCards();
        prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        prevBtn.style.pointerEvents = currentIndex === 0 ? 'none' : 'all';
        
        const maxIndex = slides.length - visibleCards;
        nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
        nextBtn.style.pointerEvents = currentIndex >= maxIndex ? 'none' : 'all';
    }

    nextBtn.addEventListener('click', () => {
        const visibleCards = getVisibleCards();
        // Prevent going past the last group of cards
        if (currentIndex < slides.length - visibleCards) {
            currentIndex++;
            updateSliderPosition();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSliderPosition();
        }
    });

    // Update on resize to fix math
    window.addEventListener('resize', () => {
        // Reset to 0 to prevent alignment bugs on resize
        currentIndex = 0; 
        updateSliderPosition();
    });

    // Initialize
    updateSliderPosition();
});
</script>