<script>
    // Simple scroll animation for elements
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all cards and sections
    document.querySelectorAll('.service-card, .benefit-item, .portfolio-carousel-container, .pricing-card, .process-step, .testimonial-card, .overview-column, .showcase-item, .process-step-item, .result-item, .testimonial-content').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    <?php if (isset($hasFAQ) && $hasFAQ): ?>
    // FAQ Accordion functionality
    document.querySelectorAll('.faq-item').forEach(item => {
        item.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all other FAQ items
            document.querySelectorAll('.faq-item').forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            if (isActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
            }
        });
    });
    <?php endif; ?>

    // Portfolio Carousel
    let currentPortfolioIndex = 0;
    const portfolioTrack = document.querySelector('.portfolio-carousel-track');
    const portfolioItems = document.querySelectorAll('.portfolio-carousel-track .portfolio-item');
    const totalPortfolioItems = portfolioItems.length;

    function updatePortfolioCarousel() {
        if (portfolioTrack && totalPortfolioItems > 0) {
            const isMobile = window.innerWidth <= 768;
            const itemsPerPage = isMobile ? 1 : 2;
            const maxIndex = Math.ceil(totalPortfolioItems / itemsPerPage) - 1;

            if (currentPortfolioIndex < 0) {
                currentPortfolioIndex = maxIndex;
            } else if (currentPortfolioIndex > maxIndex) {
                currentPortfolioIndex = 0;
            }

            let offset = currentPortfolioIndex * -100;
            if (isMobile) {
                portfolioTrack.style.transform = `translateX(calc(${offset}% - ${currentPortfolioIndex * 1}rem))`;
            } else {
                portfolioTrack.style.transform = `translateX(calc(${offset}% - ${currentPortfolioIndex * 2}rem))`;
            }
        }
    }

    function movePortfolio(direction) {
        currentPortfolioIndex += direction;
        updatePortfolioCarousel();
    }

    window.addEventListener('resize', () => {
        updatePortfolioCarousel();
    });

    document.addEventListener('DOMContentLoaded', () => {
        updatePortfolioCarousel();
    });

    // Testimonials Carousel
    let currentTestimonialIndex = 0;
    const testimonialTrack = document.querySelector('.testimonials-track');
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.testimonials-dots .dot');
    const totalTestimonials = testimonialCards.length;
    const testimonialCarousel = document.querySelector('.testimonials-carousel');

    function updateTestimonialCarousel() {
        if (testimonialTrack) {
            const offset = currentTestimonialIndex * -100;
            testimonialTrack.style.transform = `translateX(${offset}%)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentTestimonialIndex);
            });
        }
    }

    function moveTestimonial(direction) {
        currentTestimonialIndex += direction;
        
        if (currentTestimonialIndex < 0) {
            currentTestimonialIndex = totalTestimonials - 1;
        } else if (currentTestimonialIndex >= totalTestimonials) {
            currentTestimonialIndex = 0;
        }
        
        updateTestimonialCarousel();
    }

    function currentTestimonial(index) {
        currentTestimonialIndex = index;
        updateTestimonialCarousel();
    }

    // Touch support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    if (testimonialCarousel) {
        testimonialCarousel.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        testimonialCarousel.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });
    }

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe left - next
                moveTestimonial(1);
            } else {
                // Swipe right - previous
                moveTestimonial(-1);
            }
        }
    }

    // Auto-advance carousel every 5 seconds
    let autoAdvanceInterval = setInterval(() => {
        moveTestimonial(1);
    }, 5000);

    // Pause auto-advance on user interaction
    if (testimonialCarousel) {
        testimonialCarousel.addEventListener('touchstart', () => {
            clearInterval(autoAdvanceInterval);
        });
        
        testimonialCarousel.addEventListener('touchend', () => {
            clearInterval(autoAdvanceInterval);
            autoAdvanceInterval = setInterval(() => {
                moveTestimonial(1);
            }, 5000);
        });
    }

    // Floating Navbar - Dynamic dot indicator
    const floatingNavbar = document.querySelector('.floating-navbar');
    if (floatingNavbar) {
        const sections = document.querySelectorAll('#servicios, #portfolio, #planes');
        const navItems = document.querySelectorAll('.nav-item');

        // Adjust rootMargin based on screen size
        const isMobile = window.innerWidth <= 768;
        const observerOptions = {
            threshold: isMobile ? 0.15 : 0.3,
            rootMargin: isMobile ? '-50px 0px -50px 0px' : '-100px 0px -100px 0px'
        };

        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const sectionId = entry.target.id;
                    
                    // Remove active class from all nav items
                    navItems.forEach(item => item.classList.remove('active'));
                    
                    // Add active class to current section's nav item
                    const activeNavItem = document.querySelector(`.nav-item[data-section="${sectionId}"]`);
                    if (activeNavItem) {
                        activeNavItem.classList.add('active');
                    }
                }
            });
        }, observerOptions);

        // Observe all sections
        sections.forEach(section => {
            navObserver.observe(section);
        });

        // Don't set initial active state - let observer handle it
        // After a brief delay, check which section is visible
        setTimeout(() => {
            const viewportCenter = window.innerHeight / 2;
            let closestSection = null;
            let closestDistance = Infinity;

            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                const sectionCenter = rect.top + rect.height / 2;
                const distance = Math.abs(sectionCenter - viewportCenter);

                if (distance < closestDistance && rect.top < window.innerHeight && rect.bottom > 0) {
                    closestDistance = distance;
                    closestSection = section;
                }
            });

            if (closestSection) {
                navItems.forEach(item => item.classList.remove('active'));
                const activeNavItem = document.querySelector(`.nav-item[data-section="${closestSection.id}"]`);
                if (activeNavItem) {
                    activeNavItem.classList.add('active');
                }
            }
        }, 500);
    }
</script>
</body>
</html>

