$( document ).ready(function() {
    $('.statusBtn').on('click', function () {
        $(this).closest($('form')).submit();
    })
});


