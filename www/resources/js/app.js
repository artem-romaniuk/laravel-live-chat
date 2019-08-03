window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

function scrollDown() {
    var chat_scroll = $('#messagesContainer');
    chat_scroll.scrollTop(chat_scroll.prop('scrollHeight'));
}

import Echo from "laravel-echo"
window.io = require('socket.io-client');

let echo = new Echo({
    broadcaster: 'socket.io',
    host: '0.0.0.0:6001'
});

const messagesContainer = $('#messagesContainer');

echo
    .channel(`livechat_database_live-chat`)
    .listen('.message-live-chat', (e) => {
        messagesContainer.append('<li><p>' + e.message.message + '</p><span>' + e.message.user.name + ' (' + e.message.created_at + ')</span></li>');
        scrollDown();
    });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        "Accept":"application/json",
        "Authorization":"Bearer " + user.api_token
    }
});

// Get all messages
$.ajax({
    method: "GET",
    url: "/api/chat"
})
    .done(function(response) {
        if (response.data.length > 0) {
            response.data.forEach(function (item) {
                messagesContainer.append('<li><p>' + item.message + '</p><span>' + item.user.name + ' (' + item.created_at + ')</span></li>');
                scrollDown();
            });
        }
    });

// Send message
$('#submitMessage').on('click', function (e) {
    e.preventDefault();
    const submitButton = $(this);
    const messageField = $('textarea[name=message]');
    const errorsContainer = $('.errors-container');

    errorsContainer.html('');
    submitButton.prop('disabled', true);

    $.ajax({
        method: "POST",
        url: "/api/chat",
        data: {
            'message': messageField.val(),
            'user_id': user.id
        },
        statusCode: {
            201: function () {
                submitButton.prop('disabled', false);
                messageField.val('');
            },
            422: function (response) {
                submitButton.prop('disabled', false);
                const errors = response.responseJSON.errors.message;
                errors.forEach(function (item) {
                    errorsContainer.html('<span class="badge badge-danger">' + item + '</span>');
                });
            },
            503: function() {
                submitButton.prop('disabled', false);
            }
        }
    })
        .done(function(response) {
            //console.log(response);
        });
});
