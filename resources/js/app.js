require('./bootstrap');

window.Vue = require('vue');

Vue.component('Navbar', require('./components/Navbar.vue').default);
Vue.component('Blognav', require('./components/BlogNavbar.vue').default);
Vue.component('tags-input', require('./components/Tags.vue').default);
Vue.component('editor', require('./components/Editor.vue').default);
Vue.component('Dashboard', require('./components/Dashboard.vue').default);
Vue.component('share-box', require('./components/ShareBox.vue').default);
Vue.component('article-box', require('./components/ArticleBox.vue').default);
Vue.component('pagination', require('./components/Pagination.vue').default);



const app = new Vue({
    el: '#app'
});