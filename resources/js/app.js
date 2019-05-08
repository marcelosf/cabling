import Vuex from 'vuex';
import {Store} from './components/store/index';
import LocalTableComponent from './components/Locals/LocalTableComponent';
import FilterComponent from './components/Filter/FilterComponent';
import RackFilterComponent from './components/Filter/RackFilterComponent';
import LocalFormComponent from './components/Forms/LocalFormComponent';
import RackFormComponent from './components/Forms/RackFormComponent';
import RackTableComponent from './components/Rack/RackTableComponent';
import PatchTableComponent from './components/Patches/PatchTableComponent';
import PatchFormComponent from './components/Forms/PatchFormComponent';
import SwitchPortTableComponent from './components/SwitchPort/SwitchPortTableComponent';
import SwitchPortFormComponent  from './components/Forms/SwitchPortFormComponent';
import SwitchPortFilterComponent from './components/Filter/SwitchPortFilterComponent';
import SwitchPortComboComponent from './components/Forms/SwitchPortComboComponent';
import VoicePortTableComponent from './components/VoicePort/VoicePortTableComponent';
import VoicePortFormComponent from './components/Forms/VoicePortFormComponent';
import PhoneTableComponent from './components/Phone/PhoneTableComponent';
import PhoneFormComponent  from './components/Forms/PhoneFormComponent';
import IndexSearchComponent from './components/MainSearch/IndexSearchComponent';
import SearchFormComponent from './components/Forms/SearchFormComponent';
import LoginFormComponent  from './components/Forms/LoginFormComponent';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('materialize-css');

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
Vue.component('rackfilter-component', RackFilterComponent);
Vue.component('localform-component', LocalFormComponent);
Vue.component('rackform-component', RackFormComponent);
Vue.component('racktable-component', RackTableComponent);
Vue.component('patchtable-component', PatchTableComponent);
Vue.component('patchform-component', PatchFormComponent);
Vue.component('switchporttable-component', SwitchPortTableComponent);
Vue.component('switchportform-component', SwitchPortFormComponent);
Vue.component('switchportfilter-component', SwitchPortFilterComponent);
Vue.component('voiceporttable-component', VoicePortTableComponent);
Vue.component('voiceportform-component', VoicePortFormComponent);
Vue.component('phonetable-component', PhoneTableComponent);
Vue.component('phoneform-component', PhoneFormComponent);
Vue.component('switchportcombo-component', SwitchPortComboComponent);
Vue.component('indexsearch-component', IndexSearchComponent);
Vue.component('searchform-component', SearchFormComponent);
Vue.component('login-component', LoginFormComponent);


const app = new Vue({
    el: '#app',
    store
});
