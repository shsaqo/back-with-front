const swiper = new Swiper(".swiper-container-hero", {
    slidesPerView: 1,
    loop: true,
    navigation: {
        nextEl: ".swiper-hero-slider-buttons-next",
        prevEl: ".swiper-hero-slider-buttons-prev"
    }
});

// modal start
const modalOpeners = document.querySelectorAll(".modal-opener");
const modals = document.querySelectorAll(".modal");
const modalCloser = document.querySelectorAll(".modal-closer");

modalOpeners.forEach(elem => {
    elem.addEventListener("click", function(e) {
        e.preventDefault();
        let path = e.currentTarget.getAttribute("data-path");

        modals.forEach(modal => {
            modal.classList.remove("modal-show");
        });
        if (document.querySelector(`[data-target="${path}"]`)) {
            document.body.classList.add("overflow-hidden");
            document
                .querySelector(`[data-target="${path}"]`)
                .classList.add("modal-show");
            setTimeout(() => {
                const thumbs = document.querySelectorAll(".gallery-thumb");

                thumbs.forEach(thumb => {
                    let galleryThumb = new Swiper(thumb, {
                        spaceBetween: 20,
                        slidesPerView: 5,
                        // freeMode: true,
                        watchSlidesVisibility: true,
                        watchSlidesProgress: true,
                        slidesPerGroup: 5
                    });

                    const top = thumb
                        .closest(".modal-sliders-parent")
                        .querySelector(".gallery-top");

                    let galleryTop = new Swiper(top, {
                        spaceBetween: 10,
                        navigation: {
                            nextEl: ".swiper-thumbs-slider-buttons-prev",
                            prevEl: ".swiper-thumbs-slider-buttons-next"
                        },
                        thumbs: {
                            swiper: galleryThumb
                        }
                    });
                });
            }, 500);
        }
    });
});
modals.forEach(modalItem => {
    modalItem.addEventListener("click", function(e) {
        if (e.target === modalItem || e.target === modalCloser) {
            document.body.classList.remove("overflow-hidden");
            modalItem.classList.remove("modal-show");
        }
    });
});
modalCloser.forEach(item => {
    item.addEventListener("click", function() {
        modals.forEach(modal => {
            document.body.classList.remove("overflow-hidden");
            modal.classList.remove("modal-show");
        });
    });
});

const swiperMob = new Swiper(".product-mobile-slider", {
    slidesPerView: 1,
    loop: false,
    navigation: {
        nextEl: ".swiper-products-mobile-buttons-next",
        prevEl: ".swiper-products-mobile-buttons-prev"
    },
    lazy: true,
    breakpoints: {
        992: {
            allowTouchMove: false
        }
    }
});
const commentorsSmallSlider = document.querySelectorAll(
    ".commentorsSmallSlider"
);
if (commentorsSmallSlider) {
    Array.from(commentorsSmallSlider).forEach(sliderItem => {
        new Swiper(sliderItem, {
            slidesPerView: 3,
            loop: true,
            autoplay: true,
            lazy: true,
            spaceBetween: 10,
            breakpoints: {
                992: {
                  slidesPerView: 3,
                },
                0: {
                  slidesPerView: 2,
                },
            }
        });
    });
}

// modal end
//** JQUERY PART */

$(function() {
    // TODO logo Icon mobile and desktop
    $(window).on("resize load", function() {
        if ($(this).width() < 992) {
            $(".product_item > a").removeClass("modal-opener");
            $(".product_item > a").removeAttr("data-path");
        } else {
            $(".product_item > a").addClass("modal-opener");
            // $('.product_item > a').attr('data-path', 'product-single-modal');
        }
        if ($(this).width() < 1201) {
            $(".navbar-logo")
                .find("img")
                .attr("src", "/home/img/logo.svg");
        } else {
            $(".navbar-logo")
                .find("img")
                .attr("src", "/home/img/logo-width-text.svg");
        }
        if ($(this).width() < 1200) {
            $(".order-call-fixed")
                .find($(".relative-content"))
                .addClass("modal-opener")
                .removeAttr("data-open-pulse")
                .attr("data-path", "modal-call-modal");
            $(".order-call-fixed").on("click", function() {
                $(".icon-wrapper")
                    .find($(".icon-humburger"))
                    .removeClass("icon-humburger-active");
                $("nav.nav").removeClass("active");
                $("body").removeClass("overflow-hidden");
            });
        } else {
            $(".order-call-fixed")
                .find($(".relative-content"))
                .removeClass("modal-opener")
                .removeAttr("data-path")
                .attr("data-open-pulse", "aaa");
        }
    });
    // TODO logo Icon mobile and desktop end

    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 68) {
            $("header.header").addClass("scroled");
        } else {
            $("header.header").removeClass("scroled");
        }
    });
    // TODO Fixher header
    $("body").css({
        "padding-top": $("header.header").outerHeight() + 10
    });
    // TODO Fixher headerend

    // TODO RATING STARS
    let rateIndexItem = document.querySelectorAll(".rateYo");
    Array.from(rateIndexItem).forEach(item => {
        $(item).rateYo({
            ratedFill: "#FFDA46",
            rating: item.getAttribute("data-rate"),
            readOnly: item.getAttribute("data-readonly") !== "false",
            spacing: "6px",
            starWidth: "16px"
        });
    });

    // TODO RATING STARS end

    // TODO nav
    $(".navlist a").on("click", function(e) {
        let scrollPath = $(this).attr("href");
        e.preventDefault();
        $("html, body").animate(
            {
                scrollTop: $(scrollPath).offset().top - 107
            },
            0
        );
        $(".icon-wrapper")
            .find($(".icon-humburger"))
            .removeClass("icon-humburger-active");
        $("nav.nav").removeClass("active");
        $("body").removeClass("overflow-hidden");
    });
    // TODO navScroll end
    $(".icon-wrapper").on("click", function(e) {
        e.preventDefault();
        $(this)
            .find($(".icon-humburger"))
            .toggleClass("icon-humburger-active");
        $("nav.nav").toggleClass("active");
        $("body").toggleClass("overflow-hidden");
    });
});

const pulseCall = document.querySelector(".relative-content");
if (pulseCall) {
    const pulseForm = pulseCall.querySelector("form");

    // If a click happens somewhere outside the dropdown, close it.

    window.addEventListener("click", function(e) {
        if (pulseCall) {
            if (e.target.hasAttribute("data-open-pulse")) {
                if (pulseForm.classList.contains("d-none")) {
                    pulseForm.classList.remove("d-none");
                    pulseForm.classList.add("d-flex");
                } else {
                    pulseForm.classList.add("d-none");
                    pulseForm.classList.remove("d-flex");
                }
                return;
            }
            if (!e.target.closest(".d-flex")) {
                pulseForm.classList.add("d-none");
                pulseForm.classList.remove("d-flex");
            }
        }
    });
}


let arr = []
const specialOffers = document.querySelectorAll('.special-offer-image__youtube');
if(specialOffers){
    Array.from(specialOffers).forEach(item => {
        item.addEventListener('click', function(e){
            e.target.closest('.poster').classList.add('d-none');
            const getVideoSrc = item.querySelector('iframe').getAttribute('src')
            const getId =item.querySelector('iframe').getAttribute('id')
            arr = [getId]
            const addAutoplayText = arr.includes(getId)? `${getVideoSrc}?autoplay=1`:`${getVideoSrc}?autoplay=0` ;
            item.querySelector('iframe').setAttribute('src', addAutoplayText);
        });
    });
};

const CursorParent = document.querySelectorAll('.wihtLinkSliderCursor');
Array.from(CursorParent).forEach(item => {
    item.style.cursor = `url("${window.location.origin}/images/icons/cursor-image.png"), auto`
})

const da = new DynamicAdapt("max");

da.init();
