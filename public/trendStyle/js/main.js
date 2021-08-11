$(function(){
// slider

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    adaptiveHeight: true,
    asNavFor: '.slider-nav'

});

$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    centerMode: true,
    focusOnSelect: true

});
$('.commentor-slider-runner').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  centerMode: true,

});
// slider end

$('[data-countdown]').each(function() {

    var $this = $(this), finalDate = $(this).data('countdown');

    $this.countdown(finalDate, function(event) {

      $this.html(event.strftime(''

      + '<div class="counter-single-item"><div>%D</div> <p>օր</p> </div> '

      + '<div class="counter-single-item"><div>%H</div> <p>ժամ</p></div> '

      + '<div class="counter-single-item"><div>%M</div> <p>րոպե</p></div> '

      + '<div class="counter-single-item seconds-countdown"><div>%S</div> <p>վրկ․</p></div>'));

    });

  });
    // scroll to down btn
    $(document)
    .on('click', 'button[data-to]', function(e) {
        e.preventDefault();
        let target = $(this).attr('data-to');
        $('html, body')
            .animate({
                scrollTop: $(target).offset().top - 100}, 'slow', 'swing', function() {
                  $('#callInput').focus()
                });
    });
    // scroll to down btn en
    const redColor =  document.querySelector('#spanRed').style.color;
    const blueColor =  document.querySelector('#spanBlue').style.color;
    const gradientColor =  document.querySelector('#spanGradient').style.background;
    const root = document.querySelector(':root');
    root.style.setProperty('--blueColor', blueColor);
    root.style.setProperty('--redColor', redColor);
    root.style.setProperty('--commentGradient', gradientColor);
});

const pulseCall = document.querySelector('.relative-content');
if(pulseCall) {
  const pulseForm =  pulseCall.querySelector('form');

  // If a click happens somewhere outside the dropdown, close it.


window.addEventListener("click", function(e) {
  if(pulseCall) {
    if(e.target.hasAttribute("data-open-pulse")) {
      if(pulseForm.classList.contains('d-none')) {
        pulseForm.classList.remove('d-none');
        pulseForm.classList.add('d-flex');
      }else {
        pulseForm.classList.add('d-none');
        pulseForm.classList.remove('d-flex');
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

jQuery.extend(jQuery.validator.messages, {
    required: "Պարտադիր դաշտ",
    digits: "Խնդրում ենք մուտքագրել միայն թվանշաններ",
    maxlength: "Խնդրում ենք մուտքագրել ոչ ավելի, քան 9 նիշ",
    minlength: "Խնդրում ենք մուտքագրել առնվազն 8 նիշ"
});

$("#shop-form").validate({
    rules: {
        phone: {
            required: true,
            digits: true,
            maxlength: 9,
            minlength: 8
        },
    },
    onfocusout: function (element) {
        this.element(element);
    },
})

$("#shop-form").on('submit',function(){
    if($("#shop-form").valid() === true){
        $("#submit-btn").attr('disabled',true);
    }
})
