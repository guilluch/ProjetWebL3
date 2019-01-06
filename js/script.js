let lastAjaxUrl = 'ajax.php?action=index';

function getView(url) {
    $('.view').html('<img class="h-align-center v-align-center" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/585d0331234507.564a1d239ac5e.gif"/>');
    $.ajax({
        url: url
    }).done(function (data) {
        data = JSON.parse(data);
        $('.view').html(data.view);
        lastAjaxUrl = url;
    }).fail(function (error) {
        console.log(error);
    });
}

function index(event) {
    event.preventDefault();
    getView('ajax.php?action=index');
}

function wall(event, userId) {
    event.preventDefault();
    getView(userId ? 'ajax.php/?action=wall&id=' + userId : 'ajax.php/?action=wall');
}

function friendsList(event) {
    event.preventDefault();
    getView('ajax.php/?action=friendsList');
}

function like(event, messageId) {
    event.preventDefault();
    $.ajax({
        url: 'ajax.php?action=like&messageId=' + messageId
    }).done(function (data) {
        data = JSON.parse(data);
        $(event.srcElement).parent().parent().find('.aime').html(data.aime);
    }).fail(function (error) {
        console.log(error);
    });
}

function share(event, messageId) {
    event.preventDefault();
    $.ajax({
        url: 'ajax.php?action=share&messageId=' + messageId
    }).done(function (data) {
        data = JSON.parse(data);
        getView('ajax.php?action=wall');
    }).fail(function (error) {
        console.log(error);
    });
}

function login(event) {
    event.preventDefault();
    $.ajax({
        url: 'ajax.php?action=login'
    }).done(function (data) {
        data = JSON.parse(data);
        if (data.state === false) {
            notify('Erreur de login ou mot de passe');
        } else if (data.state === true) {
            getView('ajax.php?action=index');
        } else {
            $('.view').html(data.view);
            lastAjaxUrl = url;
        }
    }).fail(function (error) {
        console.log(error);
    });
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