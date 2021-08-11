const colorVisibleBtns = document.querySelector(".colorVisibleBtns");
const deleteTimes = document.querySelectorAll(".deleteTimes");
if (colorVisibleBtns) {
    colorVisibleBtns.addEventListener("click", function(e) {
        e.target.classList.toggle("underlined");
        if (deleteTimes) {
            deleteTimes.forEach(item => {
                item.classList.toggle("visibleTimes");
            });
        }
    });
}

$("#MultiSelectFilter").multiselect({
    enableFiltering: true,
    includeFilterClearBtn: false,
    buttonWidth: "230px",
    numberDisplayed: 1,
    nonSelectedText: "Ընտրել"
});

$(window).on("load", function(e) {
    if (window.location.href.indexOf("products") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("colors") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("create-product") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("edit-product") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("worker-setting") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("workers") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("thank-you/create") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("home-status") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("code-script") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("password-change") > -1) {
        $(".content-wrapper").addClass("bg-white");
    }
    if (window.location.href.indexOf("home-status") > -1) {
        $(".openedMenu a").removeClass("active");
        $(".home-status-link").addClass("active");
        $(".nav-treeview").css("display", "block");
        $(".right").css("transform", "rotate(-90deg)");
    }
    if (window.location.href.indexOf("slider") > -1) {
        $(".content-wrapper").addClass("bg-white");
        $(".openedMenu a").removeClass("active");
        $(".slider-link").addClass("active");
        $(".nav-treeview").css("display", "block");
        $(".right").css("transform", "rotate(-90deg)");
    }
    if (window.location.href.indexOf("home-product") > -1) {
        $(".content-wrapper").addClass("bg-white");
        $(".openedMenu a").removeClass("active");
        $(".products-link").addClass("active");
        $(".nav-treeview").css("display", "block");
        $(".right").css("transform", "rotate(-90deg)");
    }
    if (window.location.href.indexOf("home-review") > -1) {
        $(".content-wrapper").addClass("bg-white");
        $(".openedMenu a").removeClass("active");
        $(".comments-link").addClass("active");
        $(".nav-treeview").css("display", "block");
        $(".right").css("transform", "rotate(-90deg)");
    }
    if (window.location.href.indexOf("home-special") > -1) {
        $(".content-wrapper").addClass("bg-white");
        $(".openedMenu a").removeClass("active");
        $(".special-offer-link").addClass("active");
        $(".nav-treeview").css("display", "block");
        $(".right").css("transform", "rotate(-90deg)");
    }
});
$(window).on("load", function(e) {

});
const shortDescr = document.querySelectorAll(".productTabContent textarea");
Array.from(shortDescr).forEach(item => {
    if (item) {
        item.addEventListener("input", function() {
            if (item.scrollHeight > 47) {
                item.style.height = item.scrollHeight + "px";
            }
        });
    }
});

let countComment = 0;
$(document).on("click", "#comment_add_btn", function(e) {
    ++countComment;
    e.preventDefault();
    $("#commentsHere").append(
        `<div id="comment${countComment}">
            <div class="row form-group">
                <div class="col-12">
                    <label for="comment_text${countComment}">Գրել Մեկնաբանություն</label>
                    <input value="" name="comment_text[]" type="text" class="form-control" id="comment_text${countComment}" />
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <div class="row">
                        <div class="col-7">
                            <label for="user_name${countComment}">Օգտատիրոջ Անուն</label>
                            <input value="" name="user_name[]" type="text" class="form-control" id="user_name${countComment}" />
                        </div>
                        <div class="col-5">
                            <label for="comment_time${countComment}">Ամսաթիվ</label>
                            <input value="" name="comment_time[]" type="text" class="form-control" placeholder="Օր / Ամիս / Տարի" id="comment_time${countComment}  /">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="user_photo">Օգտատիրոջ նկար</label>
                    <div id="${countComment}" class="input-group">
                        <div class="custom-file">
                            <input name="user_image[]" type="file" class="custom-file-input comment" id="uploaded_comment_file">
                            <label class="custom-file-label" for="uploaded_comment_file${countComment}">Ներբեռնել</label>
                        </div>
                    </div>
                    <div class="added-image-product" id="uploaded-file_comment_image${countComment}">
                        <button class="delete-image-icon comment" id="remove_comment_uploaded_file">
                            <img id="${countComment}" src="${window.location.origin}/./images/icons/times-icon.svg" alt="" />
                        </button>
                        <img src="#" alt="" id="user_comment_file${countComment}"/>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12">
                    <label for="slider${countComment}">Օգտատիրոջ կողմից ավելացված տեսահոլովակի հղում</label>
                    <input name="comment_video[]" type="text" class="form-control" id="slider${countComment}">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <label for="like${countComment}">Հավանումների քանակը</label>
                    <input value="0" name="like[]" id="like${countComment}" type="number" class="form-control w-50" />
                </div>
            </div>
            <button class="form-group delete_added_comment delete-comment-btn" id="${countComment}">Ջնջել</button>
        </div>
        `
    );
});
const commentDelBtn = document.querySelectorAll(".deteleCommentBtn");
if (commentDelBtn) {
    Array.from(commentDelBtn).forEach(element => {
        let dataId = element.getAttribute("data-delete");
        let id = element.getAttribute("id");
        element.addEventListener("click", function(e) {
            e.preventDefault();
            document.querySelector("#" + dataId).remove();
            element.closest(".commentCollapsedItem").remove();
            let input = document.createElement("input");
            input.type = "hidden";
            input.name = "deleteComment[]";
            input.value = id;
            form.appendChild(input);
        });
    });
}
$(document).on("click", ".delete_added_comment", function(e) {
    e.preventDefault();
    let comment_id = $(this).attr("id");
    $("#comment" + comment_id + "").remove();
});

$(document).on("change", ".edit-page .checkBoxItem input", function(e) {
    var isChecked = "true";
    let id = $(this)[0].id;
    $("#" + id).click(function() {
        isChecked = !isChecked;
        $(this).prop("checked", isChecked);
    });
});
