/**
 * Main JavaScript for Vyapar Mandal
 * Handles interactions, animations, and dynamic functionality
 */

(function() {
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
    const siteHeader = document.querySelector('.site-header');
    const navbar = document.querySelector('.site-navbar');
    const backToTopBtn = document.getElementById('backToTop');
    const siteFooter = document.querySelector('.site-footer');
    const heroCarousel = document.getElementById('heroCarousel');
    const heroCarouselProgress = document.getElementById('heroCarouselProgress');

    const navbarStartY = navbar ? (navbar.getBoundingClientRect().top + window.scrollY) : 0;

    const restartHeroProgress = () => {
        if (!heroCarouselProgress) {
            return;
        }

        heroCarouselProgress.classList.remove('is-animating');
        void heroCarouselProgress.offsetWidth;
        heroCarouselProgress.classList.add('is-animating');
    };

    if (heroCarousel) {
        restartHeroProgress();
        heroCarousel.addEventListener('slid.bs.carousel', restartHeroProgress);
    }

    const updateScrollState = () => {
        const scrolled = window.scrollY > 24;

        if (siteHeader) {
            siteHeader.classList.toggle('site-header--scrolled', scrolled);
        }

        if (navbar) {
            const navbarPinned = window.scrollY >= navbarStartY;

            navbar.classList.toggle('shadow', scrolled);
            navbar.classList.toggle('site-navbar--fixed', navbarPinned);

            if (siteFooter) {
                const footerTop = siteFooter.getBoundingClientRect().top;
                const footerVisible = footerTop <= (window.innerHeight - 40);
                navbar.classList.toggle('site-navbar--hidden', footerVisible && navbarPinned);
            }
        }

        if (backToTopBtn) {
            backToTopBtn.classList.toggle('is-visible', window.scrollY > 300);
        }
    };

    updateScrollState();
    window.addEventListener('scroll', updateScrollState, { passive: true });

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
    // Destructive Actions + Confirm Modal
    // ====================
    const destructivePattern = /delete|remove|cancel/i;
    const interactiveButtons = document.querySelectorAll('a.btn, button.btn, input.btn');

    interactiveButtons.forEach(button => {
        const label = ((button.textContent || button.value || '') + '').trim();
        if (destructivePattern.test(label)) {
            button.classList.add('operation-danger');
        }
    });

    const ensureConfirmModal = () => {
        const existing = document.getElementById('actionConfirmModal');
        if (existing) {
            return existing;
        }

        const modalMarkup = document.createElement('div');
        modalMarkup.innerHTML = `
            <div class="modal fade action-confirm-modal" id="actionConfirmModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h5 class="modal-title d-flex align-items-center gap-2">
                                <span class="action-confirm-modal__icon"><i class="bi bi-exclamation-triangle-fill"></i></span>
                                Confirm Action
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-2">
                            <p id="actionConfirmMessage" class="mb-0 text-muted"></p>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                            <button type="button" class="btn action-cancel-btn" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn action-confirm-btn" id="actionConfirmProceed">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        document.body.appendChild(modalMarkup.firstElementChild);
        return document.getElementById('actionConfirmModal');
    };

    const resolveActionWord = (button) => {
        const explicit = (button.getAttribute('data-confirm-action') || '').trim();
        if (explicit) {
            return explicit;
        }

        const label = ((button.textContent || button.value || '') + '').trim().toLowerCase();
        if (label.includes('remove')) {
            return 'Remove';
        }

        if (label.includes('cancel')) {
            return 'Cancel';
        }

        return 'Delete';
    };

    const bindDeleteConfirmation = () => {
        const deleteButtons = document.querySelectorAll('[data-confirm-delete]');

        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();

                const actionWord = resolveActionWord(button);
                const modalEl = ensureConfirmModal();
                const messageEl = document.getElementById('actionConfirmMessage');
                const confirmEl = document.getElementById('actionConfirmProceed');

                if (!messageEl || !confirmEl || !modalEl) {
                    return;
                }

                messageEl.textContent = `You are about to ${actionWord.toLowerCase()} this item. This action cannot be undone.`;
                confirmEl.textContent = actionWord;

                const modal = bootstrap.Modal.getOrCreateInstance(modalEl);

                const onConfirm = () => {
                    confirmEl.removeEventListener('click', onConfirm);
                    modal.hide();

                    if (button.tagName === 'A') {
                        const href = button.getAttribute('href');
                        if (href) {
                            window.location.href = href;
                        }
                        return;
                    }

                    const parentForm = button.closest('form');
                    if (parentForm) {
                        parentForm.submit();
                    }
                };

                confirmEl.addEventListener('click', onConfirm, { once: true });
                modal.show();
            });
        });
    };

    bindDeleteConfirmation();

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
    // Back to Top Button
    // ====================
    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ====================
    // Console Welcome Message
    // ====================
    console.log('%c Welcome to Vyapar Mandal ', 'background: #667eea; color: white; font-size: 20px; padding: 10px;');
    console.log('%c Empowering Traders Across Uttar Pradesh ', 'font-size: 12px; color: #666;');

})();
