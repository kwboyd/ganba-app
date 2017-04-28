
// loads external dependencies and libraries
require('./bootstrap');


// creates vue components
// having them all here does result in some errors when going to other routes since not every element is on every page
// however, it does all still work
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
