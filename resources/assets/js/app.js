
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Pages components
import Main from './components/pages/Main.vue';
import Player from './components/pages/Player.vue';
import Static from  './components/pages/Static.vue';

// Other components
Vue.component('surats-list', require('./components/surats-list/SuratsList.vue'));
Vue.component('list-column', require('./components/surats-list/ListColumn.vue'));

const router = new VueRouter({
    routes: [{
        path: '/',
        component: Main
    }, {
        path: '/surat/:number',
        component: Player
    }, {
        path: '/about',
        component: Static,
    }, {
        path: '/contact',
        component: Static,
    }],
});

Vue.filter('highlight', function (value, search) {
    return value.replace(new RegExp(search, "ig"), '<span class="highlight">' + search + '</span>');
});

const app = new Vue({
    el: '#app',
    router,
});
