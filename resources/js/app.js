require('./bootstrap');
require('./buefy');

import IAutocomplete from "./components/inputs/IAutocomplete";
import IDate from "./components/inputs/IDate";
import Ibutton from "./components/inputs/IButton";

Vue.component('i-autocomplete', IAutocomplete);
Vue.component('i-date', IDate);

Vue.component('i-button', Ibutton);

const app = new Vue({
    el: '#app'
});
