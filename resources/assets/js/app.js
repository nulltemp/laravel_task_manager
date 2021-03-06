
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(Vuetify)

Vue.prototype.$http = window.axios;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const router = new VueRouter({
     mode: 'history',
     routes: [
         { path: '/', component: require('./components/Root.vue') }
     ]
 })

const app = new Vue({
  router,
    el: '#app'
});
