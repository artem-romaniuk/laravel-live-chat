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



import Echo from "laravel-echo"
window.io = require('socket.io-client');

let echo = new Echo({
    broadcaster: 'socket.io',
    host: '0.0.0.0:6001'
});

echo
    .channel(`livechat_database_live-chat`)
    .listen('.message-live-chat', (e) => {
        console.log(e.message);
    });


// Get all messages
$.ajax({
    method: "GET",
    url: "/api/chat",
    data: {}
})
    .done(function(response) {
        console.log(response);
    });

// Send message
$('#submitMessage').on('click', function (e) {
    e.preventDefault();

    const messageData = new FormData(document.forms.send_message);

    $.ajax({
        method: "POST",
        url: "/api/chat",
        data: messageData,
        statusCode: {
            503: function() {
                console.log('Error send message');
            }
        }
    })
        .done(function(response) {
            console.log(response);
        });
});
