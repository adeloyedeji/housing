
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Noty = require('Noty');
window.Moment = require('moment');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/Home.vue'));

Vue.component('notification', require('./components/Notification.vue'));

Vue.component('chat-component', require('./components/ChatComponent.vue'));

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('people-in-your-area', require('./components/PeopleInYourArea.vue'));

import { store } from './store'

const app = new Vue({
    el: '#mait', 
    store
});
