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
import Role from "./Role";
import User from "./user";
import Usergroup from "./usergroup";
import order from "./order";

export default new Vuex.Store({
    modules: {
        auth,
        order,
        test,
        loading,
        module,
        submodule,
        Page,
        RolePage,
        Role,
        User,
        Usergroup,
    }
});