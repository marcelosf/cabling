import Vuex from 'vuex';
import {Store} from './components/store/index';
import LocalTableComponent from './components/Locals/LocalTableComponent';
import FilterComponent from './components/Filter/FilterComponent';
import LocalFormComponent from './components/Forms/LocalFormComponent';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('materialize-css');

require('./materialize-components');

window.Vue = require('vue');
Vue.use(Vuex);

let store = new Vuex.Store(Store);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * Locals Components
 */
Vue.component('localtable-component', LocalTableComponent);
Vue.component('filter-component', FilterComponent);
Vue.component('localform-component', LocalFormComponent);

const app = new Vue({
    el: '#app',
    store
});
