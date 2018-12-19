$(document).ready(function () {
    $('.chat-btn').on('click', function (e) {
        e.preventDefault();
        $('.chat').find('.card-body').animate({ scrollTop: $('.chat').height() + 1000});
        $('.chat').fadeIn(300);
    });
    $('.close-chat').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.chat').fadeOut(300);
    });
    $('.chat').draggable({
        containment: 'parent'
    }).resizable({
        handles: 'w, e'
    });
});