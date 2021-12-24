import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './../store';
import routes from './routes';
Vue.use(VueRouter);


const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
    linkActiveClass: "active-link"
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
    const permissionType = store.getters['auth/getUserType'];
    var permissionList = [];
   
    routes.map((route,index)=>{
        
        if(route.children){
            route.children.map(child=>{
                if(child.meta.isAdmin && permissionType == 1){
                    permissionList.push(child.name)
                }

                if(child.meta.isBuyer && permissionType == 2){
                    permissionList.push(child.name)
                }
            })
        }
    });
    console.log('router',permissionList)
    if(permissionType == 1){ // for admin
        
    }
    //console.log('permissionList', permissionList)
    if (!permissionList) {
        return true;
    }
    let l = router.resolve({ name: route_name });
    if (permissionList.includes(route_name) && l.resolved.matched.length > 0) {
        result = true;
    }
    //result = true;
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
            next({ name: 'dashboard.index' })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }


})

export default router