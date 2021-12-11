import { createApp } from 'vue'
import App from './App.vue'
import IdleVue from "idle-vue";
import VueToast from 'vue-toast-notification';

import './assets/tailwind.css'
import emitter from './Events/eventbus';

import 'vue-toast-notification/dist/theme-sugar.css';

//import Toaster from "@incuca/vue3-toaster";

import router from './router'
import store from './store'
//import { getToken } from './Helper'
import GLOBAL_CONSTANT from './constant';

const main = () => {
    const inactiveTime = 100 // min
    var mixin = {
            data: function() {
                return { GLOBAL_CONSTANT }
            }
        }
        // vue app initialization
    const app = createApp(App)
        app.use(mixin);
        app.use(router);
        app.use(store);
        app.use(IdleVue, {
            eventEmitter: emitter,
            store,
            idleTime: 60000 * inactiveTime,
            startAtIdle: false
        })
        app.config.globalProperties.emitter = emitter;
       // app.component("vue-toastr", VueToastr);
       app.use(VueToast,{
           position:'top-right'
       });
        
        
        app.mount('#app')
        // createApp(App)
        // .use(router)
        // .use(store)
        // .mount('#app')
}

main();
