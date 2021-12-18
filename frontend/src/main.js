import Vue from 'vue'
import IdleVue from "idle-vue";
import App from './App.vue'
import router from './router'
import store from './store'
import { getToken,removeToken } from './Helper'
import VueSweetalert2 from 'vue-sweetalert2';
import jwt from "jsonwebtoken";
import {API_BASE_URL} from './config';

// CSS
import './assets/css/style.css'
import './assets/css/custom.css'

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';


import pagination from './components/pagination';
import ActionButton from './components/Include/Buttons/ActionButton';
import ErrorValidation from './components/Include/ErrorValidation';
import Button from './components/Include/Buttons/Button';
import SubmitButton from './components/Include/Buttons/SubmitButton';
import LinkButton from './components/Include/Buttons/LinkButton';
import IconButton from './components/Include/Buttons/IconButton';
import ContentPageHeader from './components/Include/ContentPageHeader';
import InputText from './components/Include/InputComponent/InputText.vue';
import InputPassword from './components/Include/InputComponent/InputPassword.vue';
import SelectDropdown from './components/Include/InputComponent/SelectDropdown.vue';
import InputEmail from './components/Include/InputComponent/InputEmail.vue';
import VueMultiselectItems from 'vue-multiselect-items'


Vue.component('pagination', pagination);
Vue.component('ErrorValidation', ErrorValidation);
Vue.component('ActionButton', ActionButton);
Vue.component('Button', Button);
Vue.component('SubmitButton', SubmitButton);
Vue.component('LinkButton', LinkButton);
Vue.component('IconButton', IconButton);
Vue.component('ContentPageHeader', ContentPageHeader);
// global registration
Vue.component('InputText',InputText);
Vue.component('InputPassword',InputPassword);
Vue.component('SelectDropdown',SelectDropdown);
Vue.component('InputEmail',InputEmail);
Vue.component('MultiselectComponent',VueMultiselectItems);


import GLOBAL_CONSTANT from './constant';

// import plugin
import VueToastr from "vue-toastr";

// sweetallert2 plugin
Vue.use(VueSweetalert2);
// tostr
Vue.use(VueToastr, {
    defaultTimeout: 2000,
    defaultProgressBar: false
});

Vue.component("vue-toastr", VueToastr);

Vue.config.productionTip = false
const jwt_secret = "pIW9AWDEGRTSwjnOXXFNvVphue7ox7t88ysdaUMlWgFtSngX0mSmJXuFydNaYJ6g";
var token = getToken();
const eventsHub = new Vue();
const inactiveTime = 100 // min
Vue.use(IdleVue, {
    eventEmitter: eventsHub,
    store,
    idleTime: 60000 * inactiveTime,
    startAtIdle: false
});

const main = () => {
    var mixin = {
            data: function() {
                return { GLOBAL_CONSTANT }
            }
        }
        // vue app initialization
    new Vue({
        mixins: [mixin],
        store,
        router,
        render: h => h(App)
    }).$mount('#app')
}

if (token) {
    jwt.verify(token, jwt_secret, (err, decoded) => {
        if (err) {
            removeToken()
            token = null;
        } else {
            if (decoded.iss !== API_BASE_URL+"login") {;
                removeToken()
                token = null;
            }
        }
    });
}
if (token) {
    store.dispatch("auth/authUser")
        .then((response) => {
            console.log('response',response)
            main();
        })
} else {
    main();
}