let lastAjaxUrl = 'ajax.php?action=index';


/*

notify(): fonction que j'ai codé dans une autre bibliothèque que j'ai importé (omegadesign.js)


 */


/*
    Recupere une vue via un appel ajax grace à l'url
 */
function getView(url) {
    $('.view').html('<img class="h-align-center v-align-center" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/585d0331234507.564a1d239ac5e.gif"/>');
    $.ajax({
        url: url
    }).done(function (data) {
        data = JSON.parse(data);
        $('.view').html(data.view);
        lastAjaxUrl = url;
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
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Recupere la vue index
 */
function index(event) {
    event.preventDefault();
    getView('ajax.php?action=index');
}

/*
    Recupere la vue mur en fonction de l'id utilisateur
 */
function wall(event, userId) {
    event.preventDefault();
    getView(userId ? 'ajax.php/?action=wall&id=' + userId : 'ajax.php/?action=wall');
}

/*
    Recupere la vue liste d'ami
 */
function friendsList(event) {
    event.preventDefault();
    getView('ajax.php/?action=friendsList');
}

/*
    Appel ajax pour liker un message
 */
function like(event, messageId) {
    event.preventDefault();
    $.ajax({
        url: 'ajax.php?action=like&messageId=' + messageId
    }).done(function (data) {
        data = JSON.parse(data);
        notify('Message aimé', 3000);
        $(event.srcElement).parent().parent().find('.aime').html(data.aime);
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Appel ajax pour partager un message
 */
function share(event, messageId) {
    event.preventDefault();
    $.ajax({
        url: 'ajax.php?action=share&messageId=' + messageId
    }).done(function (data) {
        data = JSON.parse(data);
        notify('Message partagé', 3000);
        getView('ajax.php?action=wall');
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Recupere la vue de connexion
 */
function loginView (event) {
    event.preventDefault();
    getView('ajax.php?action=login');
}

/*
    Appel ajax pour se connecter
 */
function login(event) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: 'ajax.php?action=login',
        data: $(event.srcElement).serialize()
    }).done(function (data) {
        data = JSON.parse(data);
        if (data.state === false) {
            notify('Erreur de login ou mot de passe', 3000);
        } else if (data.state === true) {
            document.location.href = '?action=index';
        }
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Appel ajax pour se deconnecter
 */
function logout(event) {
    event.preventDefault();
    $.ajax({
        url: 'ajax.php?action=logout'
    }).done(function (data) {
        data = JSON.parse(data);
        document.location.href = '?action=login';
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Appel ajax pour ajouter un message
 */
function addMessage(event) {
    event.preventDefault();
    let formData = new FormData(event.srcElement);
    $.ajax({
        type: 'post',
        url: 'ajax.php?action=addMessage',
        data: formData,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false
    }).done(function (data) {
        notify('Message posté', 3000);
        getView(lastAjaxUrl);
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Appel ajax pour ajouter un post dans le chat
 */
function addChat(event) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: 'ajax.php?action=addChat',
        data: $(event.srcElement).serialize()
    }).done(function (data) {
        $('#chat-input').val('');
        notify('Message dans le chat posté', 3000);
        reloadChat();
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Appel ajax pour actualiser la vue du chat
 */
function reloadChat() {
    $.ajax({
        url: 'ajax.php/?action=reloadChat'
    }).done(function (data) {
        data = JSON.parse(data);
        $('.chat-content').html(data.view);
    }).fail(function (error) {
        console.log(error);
    });
}

/*
    Appel ajax pour mettre à jour le profil
 */
function updateProfile(event) {
    event.preventDefault();
    let formData = new FormData(event.srcElement);
    $.ajax({
        type: 'post',
        url: 'ajax.php?action=updateProfile',
        data: formData,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false
    }).done(function (data) {
        getView('ajax.php?action=wall');
        notify('Profil mis à jour', 3000);
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
    setInterval(function () {
        reloadChat();
    }, 5000)
});