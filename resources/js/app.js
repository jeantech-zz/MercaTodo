require('./bootstrap');
require('./buefy');

import IAutocomplete from "./components/inputs/IAutocomplete";
import IDate from "./components/inputs/IDate";
import Ibutton from "./components/inputs/IButton";
import Ihidden from "./components/inputs/IHidden";

Vue.component('i-autocomplete', IAutocomplete);
Vue.component('i-date', IDate);

Vue.component('i-button', Ibutton);
Vue.component('i-hidden', Ihidden);

const app = new Vue({
    el: '#app',
    data: {
      ids: ""
    },
});

