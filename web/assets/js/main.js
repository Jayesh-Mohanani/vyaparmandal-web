/**
 * Main JavaScript for Vyapar Mandal
 * Handles interactions, animations, and dynamic functionality
 */

(function() {
    'use strict';

    // ====================
    // Smooth Scrolling
    // ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId !== '#') {
                e.preventDefault();
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // ====================
    // Navbar Scroll Effect
    // ====================
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                navbar.classList.add('shadow');
            } else {
                navbar.classList.remove('shadow');
            }
        });
    }

    // ====================
    // Form Validation
    // ====================
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // ====================
    // Counter Animation
    // ====================
    function animateCounter(element, start, end, duration) {
        let startTime = null;

        function animation(currentTime) {
            if (!startTime) startTime = currentTime;
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(animation);
            }
        }

        requestAnimationFrame(animation);
    }

    // Trigger counter animation when in viewport
    const counters = document.querySelectorAll('.stat-number');
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                const target = parseInt(entry.target.getAttribute('data-count')) || 0;
                animateCounter(entry.target, 0, target, 2000);
                entry.target.classList.add('counted');
            }
        });
    }, observerOptions);

    counters.forEach(counter => observer.observe(counter));

    // ====================
    // Image Lazy Loading (fallback for older browsers)
    // ====================
    const images = document.querySelectorAll('img[loading="lazy"]');
    if ('loading' in HTMLImageElement.prototype) {
        // Browser supports lazy loading
    } else {
        // Fallback for browsers that don't support lazy loading
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    // ====================
    // Auto-hide Alerts
    // ====================
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // ====================
    // Character Counter for Textareas
    // ====================
    const textareas = document.querySelectorAll('textarea[maxlength]');
    textareas.forEach(textarea => {
        const maxLength = textarea.getAttribute('maxlength');
        const counterDiv = document.createElement('small');
        counterDiv.className = 'form-text text-muted';
        textarea.parentNode.appendChild(counterDiv);

        function updateCounter() {
            const remaining = maxLength - textarea.value.length;
            counterDiv.textContent = `${remaining} characters remaining`;
        }

        textarea.addEventListener('input', updateCounter);
        updateCounter();
    });

    // ====================
    // Phone Number Formatting
    // ====================
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.slice(0, 10);
            }
            e.target.value = value;
        });
    });

    // ====================
    // Confirm Delete Actions
    // ====================
    const deleteButtons = document.querySelectorAll('[data-confirm-delete]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            if (!confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });

    // ====================
    // File Upload Preview
    // ====================
    const fileInputs = document.querySelectorAll('input[type="file"][data-preview]');
    fileInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const previewId = input.getAttribute('data-preview');
                    const preview = document.getElementById(previewId);
                    if (preview) {
                        preview.src = event.target.result;
                        preview.style.display = 'block';
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // ====================
    // Search Functionality
    // ====================
    const searchInputs = document.querySelectorAll('[data-search-target]');
    searchInputs.forEach(input => {
        input.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const targetSelector = input.getAttribute('data-search-target');
            const items = document.querySelectorAll(targetSelector);

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // ====================
    // Tooltips and Popovers
    // ====================
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));

    // ====================
    // Print Functionality
    // ====================
    const printButtons = document.querySelectorAll('[data-print]');
    printButtons.forEach(button => {
        button.addEventListener('click', () => {
            window.print();
        });
    });

    // ====================
    // Copy to Clipboard
    // ====================
    const copyButtons = document.querySelectorAll('[data-copy]');
    copyButtons.forEach(button => {
        button.addEventListener('click', () => {
            const text = button.getAttribute('data-copy');
            navigator.clipboard.writeText(text).then(() => {
                const originalText = button.textContent;
                button.textContent = 'Copied!';
                setTimeout(() => {
                    button.textContent = originalText;
                }, 2000);
            });
        });
    });

    // ====================
    // Console Welcome Message
    // ====================
    console.log('%c Welcome to Vyapar Mandal ', 'background: #667eea; color: white; font-size: 20px; padding: 10px;');
    console.log('%c Empowering Traders Across Uttar Pradesh ', 'font-size: 12px; color: #666;');

})();
