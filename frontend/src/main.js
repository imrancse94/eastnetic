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
//import './assets/css/style.css'
import './assets/tailwind/index.css'
import './assets/css/custom.css'

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';


import pagination from './components/pagination';
import ContentPageHeader from './components/Include/ContentPageHeader';
import ProductShow from './components/Include/ProductShow.vue';
import Modal from './components/Include/Modal.vue';
import OrderEditModal from './components/Include/OrderEditModal';

Vue.component('OrderEditModal', OrderEditModal);
Vue.component('Modal', Modal);
Vue.component('ProductShow', ProductShow);
Vue.component('pagination', pagination);
Vue.component('ContentPageHeader', ContentPageHeader);



import GLOBAL_CONSTANT from './constant';

// import plugin
import VueToastr from "vue-toastr";
//import APPLICATION_GLOBAL_CONSTANT
// sweetallert2 plugin
Vue.use(VueSweetalert2);
// tostr
Vue.use(VueToastr, {
    defaultTimeout: 2000,
    defaultProgressBar: false
});

Vue.component("vue-toastr", VueToastr);

Vue.config.productionTip = false
Vue.prototype.$global_contsant = GLOBAL_CONSTANT;
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
        // vue app initialization
    new Vue({
        
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
        .then(() => {
            main();
        })
} else {
    main();
}