import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import auth from "./auth";
import module from "./module";
import submodule from "./submodule";
import RolePage from "./RolePage";
import Page from "./page";
import loading from "./loading";
import test from './test';
import order from "./order";
import product from "./product";

export default new Vuex.Store({
    modules: {
        auth,
        order,
        test,
        loading,
        product
    }
});