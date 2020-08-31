/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap')
import Vue from 'vue';
import Vuetify from 'vuetify';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import { sync } from 'vuex-router-sync'
import router from "./router";
import store from "./store";

// Translation provided by Vuetify (javascript)

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/index.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.use(require('vue-chartist'));
Vue.component('date-picker', VuePersianDatetimePicker);


Vue.use(Vuetify, {
    // rtl: true,
    theme: {
        primary: '#b71c1c',
        success: '#4CAF50'
    }
});
Vue.component('app', require('./index.vue').default);

sync(store, router);

const app = new Vue({
    router,
    store,
    el: '#app',
});

