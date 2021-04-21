import Vue from "vue";
import {library} from '@fortawesome/fontawesome-svg-core';
import {faUser, faLock, faTimes} from '@fortawesome/free-solid-svg-icons';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

library.add(faUser, faLock, faTimes);
Vue.component('font-awesome-icon', FontAwesomeIcon);
