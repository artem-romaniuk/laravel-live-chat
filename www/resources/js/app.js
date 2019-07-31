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
    host: 'http://localhost:6001' // значение должно быть равным authHost из конфига + порт
});

echo
    .channel(`live-chat`)
    .listen('message-live-chat', (e) => {
        console.log(e);
        /**
         * Действия, происходящие при получении события клиентом
         * напр. console.log(e);
         */
        // comments.list.find('ul > li.empty').remove();
        // comments.list.find('ul').append(e.view);
        // comments.count.text(parseInt(comments.count.text()) + 1);
        // comments.list.scrollTop(9999999999);
        // comments.sound.play();
    });
