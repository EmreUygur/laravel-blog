require('./bootstrap');

window.Vue = require('vue');

Vue.component('Navbar', require('./components/Navbar.vue').default);
Vue.component('Blognav', require('./components/BlogNavbar.vue').default);
Vue.component('tags-input', require('./components/Tags.vue').default);
Vue.component('editor', require('./components/Editor.vue').default);

const app = new Vue({
    el: '#app'
});