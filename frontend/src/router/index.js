
import {createRouter, createWebHistory}  from 'vue-router'
import store from './../store';
import routes from './routes';



const router = createRouter({
    history:createWebHistory(),
    routes
})




// Auth
function isLoggedIn() {
    return store.getters['auth/isAuthenticated'];
}

function isNotPermitted() {
    return store.getters['auth/isNotPermitted'];
}

function isRoutePermitted(route_name) {
    var result = false;

    const permissionList = store.getters['auth/getPermissionList'];
    
    if (!permissionList) {
        return true;
    }
    
    let l = router.resolve({ name: route_name });
    console.log('resolved', l.matched)
    if (permissionList.includes(route_name) && l.matched.length > 0) {
        result = true;
    }

    return result;
}

router.beforeEach((to, from, next) => {
    console.log('to', to)
    if (to.matched.some(record => record.meta.requiresAuth)) {
        var isPermitted = isRoutePermitted(to.name);
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!isLoggedIn()) {
            next({ name: 'Login' })
        } else {
            if (isPermitted) {
                next();
            } else if (!isPermitted && to.name == '404') {
                next();
            } else {
                next({ name: '404' })
            }
        }
    } else if (to.matched.some(record => record.meta.isLoginRoute)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (isLoggedIn()) {
            next({ name: 'admin' })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }


})

export default router