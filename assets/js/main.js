let swipers = [];

function initCarousels() {
  // Destroy existing swipers to enable "dyanmic view"
  swipers.forEach(s => s.destroy(true, true));
  swipers = [];

  document.querySelectorAll('.swiper').forEach(carousel => {
    const container = carousel.closest('.carousel-section');

    const swiper = new Swiper(carousel, {
      slidesPerView: 3,
      slidesPerGroup: 3,
      grid: {
        rows: 2,
        fill: 'row'
      },
      spaceBetween: 20,
      loop: false,
      pagination: {
        el: carousel.querySelector('.swiper-pagination'),
        clickable: true
      },
      navigation: {
        nextEl: container.querySelector('.swiper-button-next'),
        prevEl: container.querySelector('.swiper-button-prev')
      },
      breakpoints: {
        0: {
            slidesPerView: 1,
            slidesPerGroup: 1
        },
        480: {
            slidesPerView: 2,
            slidesPerGroup: 2
        },
        768: {
            slidesPerView: 3,
            slidesPerGroup: 3
        },
        992: {
            slidesPerView: 3,
            slidesPerGroup: 3
        }
        }

    });

    swipers.push(swiper);
  });
}

initCarousels();

let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        initCarousels();
    }, 250);
});

function myFunction(x) {
    x.classList.toggle("change");
}


document.addEventListener('DOMContentLoaded', function () {
    // ===== Burger Button & Sidebar Toggle =====
    const burgerBtn = document.querySelector('.burger-btn');
    const sidebarNav = document.querySelector('.sidebar-nav');

    if (burgerBtn && sidebarNav) {
        burgerBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            sidebarNav.classList.toggle('active');

            if (sidebarNav.classList.contains('active')) {
                document.addEventListener('click', handleOutsideClick);
            } else {
                document.removeEventListener('click', handleOutsideClick);
            }
        });

        function handleOutsideClick(e) {
            if (!sidebarNav.contains(e.target) && !burgerBtn.contains(e.target)) {
                sidebarNav.classList.remove('active');
                burgerBtn.classList.remove('change');
                document.removeEventListener('click', handleOutsideClick);
            }
        }
    }

    // ===== View More Button for Industry Grid (Mobile) =====
    const viewMoreBtn = document.querySelector('.view-more-btn');
    const gridWrapper = document.querySelector('.industry-wrapper');

    if (viewMoreBtn && gridWrapper) {
        viewMoreBtn.addEventListener('click', function () {
            gridWrapper.classList.toggle('collapsed');

            viewMoreBtn.textContent = gridWrapper.classList.contains('collapsed')
                ? 'View More'
                : 'View Less';
        });
    }

    // ===== Accordion Toggle for Our Mission / Vision / Values =====
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    // Initial expansion if already marked as active
    accordionHeaders.forEach(header => {
        const content = header.nextElementSibling;
        const icon = header.querySelector('.icon');

        if (header.classList.contains('active') && content) {
            content.style.height = content.scrollHeight + 'px';

            setTimeout(() => {
                content.style.height = 'auto';
                content.style.overflow = 'visible';
            }, 300);

            if (icon) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            }
        }
    });

    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.icon');
            const isActive = header.classList.contains('active');

            // Collapse all
            accordionHeaders.forEach(h => {
                const c = h.nextElementSibling;
                const i = h.querySelector('.icon');
                h.classList.remove('active');
                if (c) {
                    c.style.height = c.scrollHeight + 'px';
                    requestAnimationFrame(() => {
                        c.style.height = '0px';
                        c.style.overflow = 'hidden';
                    });
                }
                if (i) {
                    i.classList.remove('fa-minus');
                    i.classList.add('fa-plus');
                }
            });

            // Expand if not already active
            if (!isActive && content) {
                header.classList.add('active');
                if (icon) {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }

                content.style.height = '0px';
                content.style.overflow = 'hidden';

                requestAnimationFrame(() => {
                    content.style.height = content.scrollHeight + 'px';
                });

                setTimeout(() => {
                    content.style.height = 'auto';
                    content.style.overflow = 'visible';
                }, 300);
            }
        });
    });


    // ===== About Me Modal for Team Cards (Mobile) =====
    const modal = document.getElementById("bioModal");
    const modalContent = document.getElementById("modalContent");
    const closeBtn = document.querySelector(".modal-close");

    if (modal && modalContent && closeBtn) {
        document.querySelectorAll(".about-btn").forEach(btn => {
            btn.addEventListener("click", function () {
                const card = this.closest(".team-card-wrapper");

                const imgSrc = card.querySelector("img").getAttribute("src");
                const name = card.querySelector(".team-card-label div:first-child").textContent;
                const title = card.querySelector(".team-card-label div:nth-child(2)").textContent;
                const bio = card.querySelector("p.bio-text")?.innerHTML || card.querySelector("p").innerHTML;

                modalContent.innerHTML = `
                    <div class="modal-card-header-row">
                        <img src="${imgSrc}" alt="${name}">
                        <div class="modal-card-text">
                            <h3>${name}</h3>
                            <p>${title}</p>
                        </div>
                    </div>
                    <div class="modal-card-body">${bio}</div>
                `;
                modal.style.display = "block";
            });
        });

        closeBtn.onclick = () => modal.style.display = "none";

        window.onclick = (e) => {
            if (e.target == modal) modal.style.display = "none";
        };
    }

});

