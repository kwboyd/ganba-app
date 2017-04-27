
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('App', require('./components/App.vue'));
Vue.component('Credits', require('./components/Credits.vue'));
Vue.component('Styles', require('./components/Styles.vue'));

const app = new Vue({
    el: '#app',
    template: '<App />'
});

const credits = new Vue({
    el: '#credits',
    template: '<Credits />'
});

const styles = new Vue({
    el: '#styles',
    template: '<Styles />'
});
