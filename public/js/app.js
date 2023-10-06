// Information modal
$(function () {
    $('.info-trigger').on('click', function() {
        $('.info-modal').addClass('modal-show');
    });

    $('.modal-close').on('click', function() {
        $('.info-modal').removeClass('modal-show');
    });
});
