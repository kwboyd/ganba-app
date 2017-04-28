
// loads external dependencies and libraries
require('./bootstrap');


// initializes vue component for app
Vue.component('App', require('./components/App.vue'));


const app = new Vue({
    el: '#app',
    template: '<App />'
});
