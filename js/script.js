$(document).ready(function () {
    $('.chat-btn').on('click', function (e) {
        e.preventDefault();
        $('.chat').fadeToggle(300, function () {
            $('.chat').find('.card-body').animate({ scrollTop: $('.chat').height() + 1000});
        });
    });
    $('.chat').draggable({
        containment: 'parent'
    }).resizable({
        handles: 'w, e'
    });
});