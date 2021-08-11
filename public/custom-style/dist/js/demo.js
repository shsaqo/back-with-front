/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function() {



    // TODO RATING STARS
    let rateIndexItem = document.querySelectorAll(".rateYo");
    Array.from(rateIndexItem).forEach(item => {
        $(item).rateYo({
            readOnly: item.getAttribute("data-readonly") !== "false",
            ratedFill: "#FFDA46",
            rating: item.getAttribute("data-rate"),
            spacing: "6px",
            starWidth: "16px"
        });
    });

    let rateCreateEditItem = document.querySelectorAll(".rateYoCreateEdit");
    Array.from(rateCreateEditItem).forEach(item => {
        $(item).rateYo({
            ratedFill: "#FFDA46",
            rating: item.getAttribute("data-rate"),
            onChange: function(rating) {
                $(this)
                    .next()
                    .val(rating);
            },
            spacing: "6px",
            starWidth: "16px"
        });
    });

    // TODO RATING STARS end

    $(".multiselect").multiselect({
        allSelectedText: "Բոլորը ընտրված են",
        selectAllText: "Ընտրել/Հեռացնել բոլորը",
        nonSelectedText: "Ընտրել",
        includeSelectAllOption: true,
        buttonWidth: "320px",
        numberDisplayed: 1,
        nSelectedText: "ապրանք ընտրված են"
    });
    ("use strict");

    var $sidebar = $(".control-sidebar");
    var $container = $("<div />", {
        class: "p-3 control-sidebar-content"
    });

    $sidebar.append($container);

    var navbar_dark_skins = [
        "navbar-primary",
        "navbar-secondary",
        "navbar-info",
        "navbar-success",
        "navbar-danger",
        "navbar-indigo",
        "navbar-purple",
        "navbar-pink",
        "navbar-navy",
        "navbar-lightblue",
        "navbar-teal",
        "navbar-cyan",
        "navbar-dark",
        "navbar-gray-dark",
        "navbar-gray"
    ];

    var navbar_light_skins = [
        "navbar-light",
        "navbar-warning",
        "navbar-white",
        "navbar-orange"
    ];

    $container.append('<h5>Customize AdminLTE</h5><hr class="mb-2"/>');

    var $no_border_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".main-header").hasClass("border-bottom-0"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".main-header").addClass("border-bottom-0");
        } else {
            $(".main-header").removeClass("border-bottom-0");
        }
    });
    var $no_border_container = $("<div />", { class: "mb-1" })
        .append($no_border_checkbox)
        .append("<span>No Navbar border</span>");
    $container.append($no_border_container);

    var $text_sm_body_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $("body").hasClass("text-sm"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $("body").addClass("text-sm");
        } else {
            $("body").removeClass("text-sm");
        }
    });
    var $text_sm_body_container = $("<div />", { class: "mb-1" })
        .append($text_sm_body_checkbox)
        .append("<span>Body small text</span>");
    $container.append($text_sm_body_container);

    var $text_sm_header_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".main-header").hasClass("text-sm"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".main-header").addClass("text-sm");
        } else {
            $(".main-header").removeClass("text-sm");
        }
    });
    var $text_sm_header_container = $("<div />", { class: "mb-1" })
        .append($text_sm_header_checkbox)
        .append("<span>Navbar small text</span>");
    $container.append($text_sm_header_container);

    var $text_sm_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".nav-sidebar").hasClass("text-sm"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".nav-sidebar").addClass("text-sm");
        } else {
            $(".nav-sidebar").removeClass("text-sm");
        }
    });
    var $text_sm_sidebar_container = $("<div />", { class: "mb-1" })
        .append($text_sm_sidebar_checkbox)
        .append("<span>Sidebar nav small text</span>");
    $container.append($text_sm_sidebar_container);

    var $text_sm_footer_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".main-footer").hasClass("text-sm"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".main-footer").addClass("text-sm");
        } else {
            $(".main-footer").removeClass("text-sm");
        }
    });
    var $text_sm_footer_container = $("<div />", { class: "mb-1" })
        .append($text_sm_footer_checkbox)
        .append("<span>Footer small text</span>");
    $container.append($text_sm_footer_container);

    var $flat_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".nav-sidebar").hasClass("nav-flat"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".nav-sidebar").addClass("nav-flat");
        } else {
            $(".nav-sidebar").removeClass("nav-flat");
        }
    });
    var $flat_sidebar_container = $("<div />", { class: "mb-1" })
        .append($flat_sidebar_checkbox)
        .append("<span>Sidebar nav flat style</span>");
    $container.append($flat_sidebar_container);

    var $legacy_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".nav-sidebar").hasClass("nav-legacy"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".nav-sidebar").addClass("nav-legacy");
        } else {
            $(".nav-sidebar").removeClass("nav-legacy");
        }
    });
    var $legacy_sidebar_container = $("<div />", { class: "mb-1" })
        .append($legacy_sidebar_checkbox)
        .append("<span>Sidebar nav legacy style</span>");
    $container.append($legacy_sidebar_container);

    var $compact_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".nav-sidebar").hasClass("nav-compact"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".nav-sidebar").addClass("nav-compact");
        } else {
            $(".nav-sidebar").removeClass("nav-compact");
        }
    });
    var $compact_sidebar_container = $("<div />", { class: "mb-1" })
        .append($compact_sidebar_checkbox)
        .append("<span>Sidebar nav compact</span>");
    $container.append($compact_sidebar_container);

    var $child_indent_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".nav-sidebar").hasClass("nav-child-indent"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".nav-sidebar").addClass("nav-child-indent");
        } else {
            $(".nav-sidebar").removeClass("nav-child-indent");
        }
    });
    var $child_indent_sidebar_container = $("<div />", { class: "mb-1" })
        .append($child_indent_sidebar_checkbox)
        .append("<span>Sidebar nav child indent</span>");
    $container.append($child_indent_sidebar_container);

    var $child_hide_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".nav-sidebar").hasClass("nav-collapse-hide-child"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".nav-sidebar").addClass("nav-collapse-hide-child");
        } else {
            $(".nav-sidebar").removeClass("nav-collapse-hide-child");
        }
    });
    var $child_hide_sidebar_container = $("<div />", { class: "mb-1" })
        .append($child_hide_sidebar_checkbox)
        .append("<span>Sidebar nav child hide on collapse</span>");
    $container.append($child_hide_sidebar_container);

    var $no_expand_sidebar_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".main-sidebar").hasClass("sidebar-no-expand"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".main-sidebar").addClass("sidebar-no-expand");
        } else {
            $(".main-sidebar").removeClass("sidebar-no-expand");
        }
    });
    var $no_expand_sidebar_container = $("<div />", { class: "mb-1" })
        .append($no_expand_sidebar_checkbox)
        .append("<span>Main Sidebar disable hover/focus auto expand</span>");
    $container.append($no_expand_sidebar_container);

    var $text_sm_brand_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $(".brand-link").hasClass("text-sm"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $(".brand-link").addClass("text-sm");
        } else {
            $(".brand-link").removeClass("text-sm");
        }
    });
    var $text_sm_brand_container = $("<div />", { class: "mb-1" })
        .append($text_sm_brand_checkbox)
        .append("<span>Brand small text</span>");
    $container.append($text_sm_brand_container);

    var $dark_mode_checkbox = $("<input />", {
        type: "checkbox",
        value: 1,
        checked: $("body").hasClass("dark-mode"),
        class: "mr-1"
    }).on("click", function() {
        if ($(this).is(":checked")) {
            $("body").addClass("dark-mode");
        } else {
            $("body").removeClass("dark-mode");
        }
    });
    var $dark_mode_container = $("<div />", { class: "mb-4" })
        .append($dark_mode_checkbox)
        .append("<span>Dark Mode</span>");
    $container.append($dark_mode_container);

    $container.append("<h6>Navbar Variants</h6>");

    var $navbar_variants = $("<div />", {
        class: "d-flex"
    });
    var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins);
    var $navbar_variants_colors = createSkinBlock(
        navbar_all_colors,
        function() {
            var color = $(this).data("color");
            var $main_header = $(".main-header");
            $main_header.removeClass("navbar-dark").removeClass("navbar-light");
            navbar_all_colors.forEach(function(color) {
                $main_header.removeClass(color);
            });

            if (navbar_dark_skins.indexOf(color) > -1) {
                $main_header.addClass("navbar-dark");
            } else {
                $main_header.addClass("navbar-light");
            }

            $main_header.addClass(color);
        }
    );

    $navbar_variants.append($navbar_variants_colors);

    $container.append($navbar_variants);

    var sidebar_colors = [
        "bg-primary",
        "bg-warning",
        "bg-info",
        "bg-danger",
        "bg-success",
        "bg-indigo",
        "bg-lightblue",
        "bg-navy",
        "bg-purple",
        "bg-fuchsia",
        "bg-pink",
        "bg-maroon",
        "bg-orange",
        "bg-lime",
        "bg-teal",
        "bg-olive"
    ];

    var accent_colors = [
        "accent-primary",
        "accent-warning",
        "accent-info",
        "accent-danger",
        "accent-success",
        "accent-indigo",
        "accent-lightblue",
        "accent-navy",
        "accent-purple",
        "accent-fuchsia",
        "accent-pink",
        "accent-maroon",
        "accent-orange",
        "accent-lime",
        "accent-teal",
        "accent-olive"
    ];

    var sidebar_skins = [
        "sidebar-dark-primary",
        "sidebar-dark-warning",
        "sidebar-dark-info",
        "sidebar-dark-danger",
        "sidebar-dark-success",
        "sidebar-dark-indigo",
        "sidebar-dark-lightblue",
        "sidebar-dark-navy",
        "sidebar-dark-purple",
        "sidebar-dark-fuchsia",
        "sidebar-dark-pink",
        "sidebar-dark-maroon",
        "sidebar-dark-orange",
        "sidebar-dark-lime",
        "sidebar-dark-teal",
        "sidebar-dark-olive",
        "sidebar-light-primary",
        "sidebar-light-warning",
        "sidebar-light-info",
        "sidebar-light-danger",
        "sidebar-light-success",
        "sidebar-light-indigo",
        "sidebar-light-lightblue",
        "sidebar-light-navy",
        "sidebar-light-purple",
        "sidebar-light-fuchsia",
        "sidebar-light-pink",
        "sidebar-light-maroon",
        "sidebar-light-orange",
        "sidebar-light-lime",
        "sidebar-light-teal",
        "sidebar-light-olive"
    ];

    $container.append("<h6>Accent Color Variants</h6>");
    var $accent_variants = $("<div />", {
        class: "d-flex"
    });
    $container.append($accent_variants);
    $container.append(
        createSkinBlock(accent_colors, function() {
            var color = $(this).data("color");
            var accent_class = color;
            var $body = $("body");
            accent_colors.forEach(function(skin) {
                $body.removeClass(skin);
            });

            $body.addClass(accent_class);
        })
    );

    $container.append("<h6>Dark Sidebar Variants</h6>");
    var $sidebar_variants_dark = $("<div />", {
        class: "d-flex"
    });
    $container.append($sidebar_variants_dark);
    $container.append(
        createSkinBlock(sidebar_colors, function() {
            var color = $(this).data("color");
            var sidebar_class = "sidebar-dark-" + color.replace("bg-", "");
            var $sidebar = $(".main-sidebar");
            sidebar_skins.forEach(function(skin) {
                $sidebar.removeClass(skin);
            });

            $sidebar.addClass(sidebar_class);
        })
    );

    $container.append("<h6>Light Sidebar Variants</h6>");
    var $sidebar_variants_light = $("<div />", {
        class: "d-flex"
    });
    $container.append($sidebar_variants_light);
    $container.append(
        createSkinBlock(sidebar_colors, function() {
            var color = $(this).data("color");
            var sidebar_class = "sidebar-light-" + color.replace("bg-", "");
            var $sidebar = $(".main-sidebar");
            sidebar_skins.forEach(function(skin) {
                $sidebar.removeClass(skin);
            });

            $sidebar.addClass(sidebar_class);
        })
    );

    var logo_skins = navbar_all_colors;
    $container.append("<h6>Brand Logo Variants</h6>");
    var $logo_variants = $("<div />", {
        class: "d-flex"
    });
    $container.append($logo_variants);
    var $clear_btn = $("<a />", {
        href: "#"
    })
        .text("clear")
        .on("click", function(e) {
            e.preventDefault();
            var $logo = $(".brand-link");
            logo_skins.forEach(function(skin) {
                $logo.removeClass(skin);
            });
        });
    $container.append(
        createSkinBlock(logo_skins, function() {
            var color = $(this).data("color");
            var $logo = $(".brand-link");
            logo_skins.forEach(function(skin) {
                $logo.removeClass(skin);
            });
            $logo.addClass(color);
        }).append($clear_btn)
    );

    function createSkinBlock(colors, callback) {
        var $block = $("<div />", {
            class: "d-flex flex-wrap mb-3"
        });

        colors.forEach(function(color) {
            var $color = $("<div />", {
                class:
                    (typeof color === "object" ? color.join(" ") : color)
                        .replace("navbar-", "bg-")
                        .replace("accent-", "bg-") + " elevation-2"
            });

            $block.append($color);

            $color.data("color", color);

            $color.css({
                width: "40px",
                height: "20px",
                borderRadius: "25px",
                marginRight: 10,
                marginBottom: 10,
                opacity: 0.8,
                cursor: "pointer"
            });

            $color.hover(
                function() {
                    $(this)
                        .css({ opacity: 1 })
                        .removeClass("elevation-2")
                        .addClass("elevation-4");
                },
                function() {
                    $(this)
                        .css({ opacity: 0.8 })
                        .removeClass("elevation-4")
                        .addClass("elevation-2");
                }
            );

            if (callback) {
                $color.on("click", callback);
            }
        });

        return $block;
    }

    $(".product-image-thumb").on("click", function() {
        var image_element = $(this).find("img");
        $(".product-image").prop("src", $(image_element).attr("src"));
        $(".product-image-thumb.active").removeClass("active");
        $(this).addClass("active");
    });
})(jQuery);

var colorPickers = document.querySelectorAll(".description_color");
var colorUnPickedImages = document.querySelectorAll(".color-image");
if (colorPickers) {
    colorPickers.forEach(elem => {
        elem.addEventListener("input", function() {
            elem.style.opacity = "1";
            colorUnPickedImages.forEach(item => {
                item.style.opacity = "0";
                item.style.visibility = "hidden";
            });
        });
    });
}

var counter = 0;
function addInput(event) {
    event.preventDefault();
    var newTextBoxDiv = $(document.createElement("div")).attr({
        id: "TextBoxDiv" + counter,
        class: "TextBoxDiv"
    });
    newTextBoxDiv
        .after()
        .html(
            '<input type="text" name="info_short_description_text[]' +
                counter +
                '" id="textbox' +
                counter +
                '" value="" >' +
                '<button class="removeInput" id="' +
                counter +
                '"><svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85"><path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)"/></svg></button>'
        );
    newTextBoxDiv.appendTo("#short_desc");
    counter++;

    $(document).on("click", ".removeInput", function(e) {
        e.preventDefault();
        var button_id = $(this).attr("id");
        $("#TextBoxDiv" + button_id).remove();
    });
}

var long_desc_inputs_count = 0;
function addLongDescInput(event) {
    event.preventDefault();
    var newTextBoxDiv = $(document.createElement("div")).attr({
        id: "TextBoxDiv" + long_desc_inputs_count,
        class: "TextBoxDiv"
    });
    newTextBoxDiv
        .after()
        .html(
            '<input type="text" name="info_long_description_text[]' +
                long_desc_inputs_count +
                '" id="textbox' +
                long_desc_inputs_count +
                '" value="" >' +
                '<button class="removeInput" id="' +
                long_desc_inputs_count +
                '"><svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85"><path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)"/></svg></button>'
        );
    newTextBoxDiv.appendTo("#long_desc_container");
    long_desc_inputs_count++;
    $(document).on("click", ".removeInput", function(e) {
        e.preventDefault();
        var button_id = $(this).attr("id");
        $("#TextBoxDiv" + button_id).remove();
    });
}

var thank_desc_count = 0;
function addThanksDescription(event) {
    event.preventDefault();
    var newTextBoxDiv = $(document.createElement("div")).attr({
        id: "TextBoxDiv" + thank_desc_count,
        class: "TextBoxDiv"
    });
    newTextBoxDiv
        .after()
        .html(
            '<input type="text" name="description[]' +
                thank_desc_count +
                '" id="textbox' +
                thank_desc_count +
                '" value="" >' +
                '<button class="removeInput" id="' +
                thank_desc_count +
                '"><svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="20.85" viewBox="0 0 20.851 20.85"><path d="M175.673,172.545a2.212,2.212,0,1,1-3.129,3.129l-6.648-6.649-6.648,6.649a2.212,2.212,0,0,1-3.129-3.129l6.648-6.648-6.648-6.648a2.212,2.212,0,1,1,3.129-3.129l6.648,6.648,6.648-6.648a2.212,2.212,0,1,1,3.129,3.129l-6.648,6.648Zm0,0" transform="translate(-155.471 -155.471)"/></svg></button>'
        );
    newTextBoxDiv.appendTo("#thanks_desc_container");
    thank_desc_count++;
    $(document).on("click", ".removeInput", function(e) {
        e.preventDefault();
        var button_id = $(this).attr("id");
        $("#TextBoxDiv" + button_id).remove();
    });
}

$(function() {
    $('[data-toggle="popover"]').popover();
});
$(".withPopover").attr(
    "data-content",
    'Հաջորդ տողից գրելու համար օգտագործեք <span class="popoverBrClass">&#x0003C;/br&#x0003E;</span>'
);

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#uploaded_image").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file").css("display", "inline-flex");
    }
}

var images = [];
var c = 0;
var uploadedFiles = [];
var idCounter = 0;
function readURLImageSlider(input) {
    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            const id = input.files[i].id;
            var reader = new FileReader();
            reader.onload = function(event) {
                ++c;
                images.push(event.target.result);
                $("#slider-form-group").append(
                    `<div class="d-inline-flex mt-2"><div class="image-in-js-parent"><button data-id="${id}"  class="delete-image-icon slider"><img data-id="${id}" src=${window.location.origin}/./images/icons/times-icon.svg alt=""></button> <img class="in-js-image" src=# id=aaa${c}> </div></div>`
                );
                for (let i = 0; i < images.length; ++i) {
                    $("#aaa" + c + "").attr("src", images[i]);
                }
            };
            reader.readAsDataURL(input.files[i]);
        }
    }
}

function deleteUploadSlider(event) {
    let id = event.path[2].id;
    $("#aaa" + event.path[2].id).remove();
    $("#slider").val("");
}

function readURLForShortDesc(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#upload_short_desc_file").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file_short_descr").css("display", "inline-flex");
    }
}

function readURLForLongDesc(input) {
    console.log({input})
    console.log(input,'input')
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(".longDescrImageJS").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file_long_descr").css("display", "inline-flex");
    }
}
function readURLForUser(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#user_uploaded_file").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file_user_image").css("display", "inline-flex");
    }
}

function readURLForProduct(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#product_uploaded_file").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file_footer_product_image").css("display", "inline-flex");
    }
}
var counts = 0;
function readURLForSlider(input) {
    ++counts;
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#slider_upload_container").prepend(
                $(
                    "<div class='added-image-product added-image-product_inner'>" +
                        "<button id=" +
                        counts +
                        " class='delete-image-icon'>" +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="11.12" height="11.12" viewBox="0 0 11.12 11.12"><g id="Group_6213" data-name="Group 6213" transform="translate(1.414 1.414)"><line id="Line_1204" data-name="Line 1204" x2="8.292" y2="8.292" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/><line id="Line_1205" data-name="Line 1205" x1="8.292" y2="8.292" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="2"/></g></svg>'
                        +
                        "</button>" +
                        "<img src=" +
                        e.target.result +
                        ">" +
                        "</div>"
                )
            );
            //$('#upload_slider_file').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#slider_upload_container").css("display", "inline-flex");
    }
}

function readURLImageThankYou(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#thank_you_uploaded_file").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file_thank_you_image").css("display", "inline-flex");
    }
}

function getUploadedImageThankYou() {
    readURLImageThankYou(this);
}

function getUploadedImage() {
    readURL(this);
}

function getUploadedImageForShortDesc() {
    readURLForShortDesc(this);
}

function getUploadedImageForLongDesc() {
    readURLForLongDesc(this);
}

function getUploadedImageForUser() {
    readURLForUser(this);
}

function getUploadedImageForProduct() {
    readURLForProduct(this);
}

function getUploadedImageForSlider() {
    readURLForSlider(this);
}

var sliderIds = [];
$(document).on("click", ".delete-image-icon.review", function(e) {
    e.preventDefault();
    let slider_id = parseInt($(this).attr("id"));
    sliderIds.push(slider_id);
    $("#uploaded_user_file").val("");
    $(this)
        .parent()
        .remove();
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "deleteUserPhoto[]";
    input.value = slider_id;
    form.appendChild(input);
});

function removeUpload(e) {
    e.preventDefault();
    $("#photo").val("");
    $("#uploaded-file").css("display", "none");
    $("#uploaded_image").attr("src", "#");
}

function removeUploadShortDesc(e) {
    e.preventDefault();
    $("#short_photo").val("");
    $("#uploaded-file_short_descr").css("display", "none");
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "deleteShortPhoto";
    input.value = "deleteShortPhoto";
    if (form) {
        form.appendChild(input);
    }
}

function removeUploadShortDescEdit(e) {
    e.preventDefault();
    $("#short_photo").val("");
    $("#uploaded-file_short_descr").css("display", "none");
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "deleteShortPhoto";
    input.value = "deleteShortPhoto";
    form.appendChild(input);
}

function removeUploadLongDesc(e) {
    e.preventDefault();
    $("#info_long_description_photo").val("");
    $("#uploaded-file_long_descr").css("display", "none");
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "deleteLongPhoto";
    input.value = "deleteLongPhoto";
    if (form) {
        form.appendChild(input);
    }
}

function removeUploadComment(target, id) {
    $("#uploaded_comment_file").val("");
    $("#uploaded-file_comment_image" + id).css("display", "none");
}

function removeUploadUser(e) {
    e.preventDefault();
    $("#uploaded_user_file").val("");
    $("#uploaded-file_user_image").css("display", "none");
}

function removeUploadProduct(e) {
    e.preventDefault();
    $("#last_photo").val("");
    $("#uploaded-file_footer_product_image").css("display", "none");
}

function removeUploadSlider(e) {
    e.preventDefault();
}

$(document).on("click", ".del_bttn", function(e) {
    e.preventDefault();
    console.log($(this).parent());
    //$(this).remove();
    // $('#slider_upload_container').css('display', 'none');
});

$(document).on("click", ".removeInput.description-dots", function(e) {
    e.preventDefault();
    $(this)
        .parent()
        .parent()
        .remove();
});
var paths = [];
var formSubmit = document.querySelector(".form");
let inputCreate = document.createElement("input");
inputCreate.type = "hidden";
inputCreate.name = "multiSelectPath[]";
$(document).on("change", "#slider_image", function(e) {
    e.preventDefault();
    var formData = new FormData();
    let file = $(this)[0].files;
    for (let i = 0; i < file.length; ++i) {
        formData.append("upload[]", file[i]);
    }
    fetch("/api/v1/files-path", {
        body: formData,
        method: "post"
    })
        .then(res => {
            return res.json();
        })
        .then(res => {
            let imgs = $(".in-js-image");
            for (let i = 0; i < res.response.length; ++i) {
                paths.push(res.response[i]);
                imgs[i].setAttribute("data", paths[i]);
            }
            for (let i = 0; i < paths.length; ++i) {
                imgs[i].setAttribute("data", paths[i]);
            }
            inputCreate.value = paths;
        })
        .catch(e => {
            console.error(e);
        });
    formSubmit.appendChild(inputCreate);
    readURLImageSlider(e.target);
});

var pathsEdit = [];
let formSubmitEdit = document.querySelector(".edit-form");
let inputEdit = document.createElement("input");
inputEdit.type = "hidden";
inputEdit.name = "multiSelectPath[]";
$(document).on("change", "#slider_image_edit", function(e) {
    e.preventDefault();
    var formData = new FormData();
    let file = $(this)[0].files;
    for (let i = 0; i < file.length; ++i) {
        formData.append("upload[]", file[i]);
    }
    fetch("/api/v1/files-path", {
        body: formData,
        method: "post"
    })
        .then(res => {
            return res.json();
        })
        .then(res => {
            let imgs = $(".in-js-image");
            for (let i = 0; i < res.response.length; ++i) {
                paths.push(res.response[i]);
                imgs[i].setAttribute("data", paths[i]);
            }
            console.log(imgs);
            inputEdit.value = paths;
        })
        .catch(e => {
            console.error(e);
        });
    formSubmitEdit.appendChild(inputEdit);
    readURLImageSlider(e.target);
});

$(document).on("click", ".delete-image-icon.slider", function(e) {
    e.preventDefault();
    let img_data = $(this).parent()[0].childNodes[2].attributes[3].nodeValue;
    paths = paths.filter(item => item !== img_data);
    if (inputEdit.value) {
        inputEdit.value = paths;
    } else {
        inputCreate.value = paths;
    }
    $(this)
        .parent()
        .remove();
});

$(document).on("click", ".delete-slider-icon", function(e) {
    e.preventDefault();
    let photo_id = parseInt($(this).attr("id"));
    $(this)
        .parent()
        .remove();
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "slidersDeleteIds[]";
    input.value = photo_id;
    form.appendChild(input);
});

$("#photo").change(getUploadedImage);
$("#short_photo").change(getUploadedImageForShortDesc);
$("#info_long_description_photo").change(getUploadedImageForLongDesc);
$("#uploaded_user_file").change(getUploadedImageForUser);
$("#last_photo").change(getUploadedImageForProduct);
$("#photo_thank_you").change(getUploadedImageThankYou);
//$("#slider").change(getUploadedImageForSlider);

$("#delete_uploaded_image").click(removeUpload);
$("#deleteDescShortPhoto").click(removeUploadShortDescEdit);
$("#delete_long_desc_image").click(removeUploadLongDesc);
$("#remove_user_uploaded_file").click(removeUploadUser);
//$("#remove_comment_uploaded_file").click(removeUploadComment);
$(document).on("click", "#remove_comment_uploaded_file", function(e) {
    e.preventDefault();
    let attrID = e.target.getAttribute("id");
    removeUploadComment(e.target, attrID);
});
//$("#delete_product_upload_file").click(removeUploadProduct);
$("#delete_short_desc_img").click(removeUploadShortDesc);

$(document).on("click", "#a-link", function() {
    $("#dialog").dialog();
});

var countCommentEdit = 0;
$(document).on("click", "#comment_add_btn_edit", function(e) {
    ++countCommentEdit;
    e.preventDefault();
    $(".comment-big-parent-edit").append(
        "<div id=comment" +
            countCommentEdit +
            ">" +
            '<div class="added-comment-inputs-parent"><div class="form-group"><label for="comment_text">Գրել Մեկնաբանություն</label><input value="" name="comment_text[]" type="text" class="form-control" id="comment_text ' +
            countCommentEdit +
            '"> </div> <div class="form-group"> <label for="user_name">Օգտատիրոջ Անուն</label> <input value="" name="user_name[]" type="text" class="form-control" id="user_name"></div><div class="form-group"> <label for="comment_time">Երբ է Գրվել Մեկնաբանությունը</label> <input value="" name="comment_time[]" type="text" class="form-control" id="comment_time"></div><div class="form-group"><label for="user_photo">Օգտատիրոջ նկար</label><div id=' +
            countCommentEdit +
            ' class="input-group"><div class="custom-file"> <input name="user_image[]" type="file" class="custom-file-input comment" id="uploaded_comment_file"><label class="custom-file-label" for="user_photo">Ներբեռնել</label></div></div> <div class="added-image-product" id="uploaded-file_comment_image' +
            countCommentEdit +
            '"><button class="delete-image-icon comment" id="remove_comment_uploaded_file"> <img id=' +
            countCommentEdit +
            " src=" +
            window.location.origin +
            "/./images/icons/times-icon.svg" +
            ' + alt=""></button><img src="#" alt="" id="user_comment_file' +
            countCommentEdit +
            '" /></div> </div><div class="form-group"> <label for="comment_photo">Ներբեռնել օգտատիրոջ կողմից ավելացրած նկար / վիդեո</label><input name="comment_video[]" type="text" class="form-control" id="slider"></div><div class="form-group mb-0"> <div class="row"><div class="col-12"> <label for="like">Հավանումների քանակը</label></div><div class="col-2"><input value="0" name="like[]" id="like" type="number" class="form-control"> </div></div></div>' +
            "<button class='form-group delete_added_comment delete-comment-btn' id=" +
            countCommentEdit +
            ">" +
            "Ջնջել" +
            "</burron>" +
            "</div>"
    );
});

$(document).on("click", ".delete_added_comment", function(e) {
    e.preventDefault();
    let comment_id = $(this).attr("id");
    $("#comment" + comment_id + "").remove();
});

var form = document.querySelector(".edit-form");

function readURLForComment(input) {
    let elemID = input.closest(".input-group").getAttribute("id");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#user_comment_file" + elemID + "").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $("#uploaded-file_comment_image" + elemID).css(
            "display",
            "inline-flex"
        );
    }
}

function getUploadedImageForComment(target) {
    readURLForComment(target);
}
//$("#uploaded_comment_file").change(getUploadedImageForComment);
$(document).on("change", "#uploaded_comment_file", function(e) {
    e.preventDefault();
    getUploadedImageForComment(e.target);
});
//onDbClick check/uncheck input
$(document).on("change", ".custom-control-input", function(e) {
    var isChecked = "true";
    let id = $(this)[0].id;
    $("#" + id).click(function() {
        isChecked = !isChecked;
        $(this).prop("checked", isChecked);
    });
});

$(document).on("click", ".removeInput.thank-you-desc", function(e) {
    e.preventDefault();
    $(this)
        .parent()
        .remove();
});

$(document).on("click", ".delete-comment", function(e) {
    e.preventDefault();
    let id = $(this).attr("id");
    $(this)
        .parent()
        .remove();
    let input = document.createElement("input");
    input.type = "hidden";
    input.name = "deleteComment[]";
    input.value = id;
    form.appendChild(input);
});
