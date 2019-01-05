function index(event) {
    event.preventDefault();
    $('.view').fadeOut(300);
    $.ajax({
        url: 'ajax.php/?action=index'
    }).done(function (data) {
        data = JSON.parse(data);
        $('.view').html(data.view);
        $('.view').fadeIn(300);
    }).fail(function (error) {
        console.log(error);
    });
}

function friendsList(event) {
    event.preventDefault();
    $('.view').fadeOut(300);
    $.ajax({
        url: 'ajax.php/?action=friendsList'
    }).done(function (data) {
        data = JSON.parse(data);
        $('.view').html(data.view);
        $('.view').fadeIn(300);
    }).fail(function (error) {
        console.log(error);
    });
}

function like(event, messageId) {
    event.preventDefault();
}

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