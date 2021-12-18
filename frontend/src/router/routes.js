const routes = [{
    path: '/',
    name: 'dashboard',
    component: () =>
        import ('./../components/Admin.vue'),
    meta: {
        isIndex: false,
        requiresAuth: true
    },
    redirect: { name: "dashboard.index" },
    children: [
        {
            path: '',
            name: 'dashboard.index',
            component: () =>
                import ('../components/Content/Dashboard/index.vue'),
            meta: {
                requiresAuth: true,
            }
        }
    ]
},
{
    path: '/order',
    name: 'order',
    component: () =>
        import ('./../components/Admin.vue'),
    meta: {
        isIndex: false,
        requiresAuth: true
    },
    redirect: { name: "order.index" },
    children: [
        {
            path: '',
            name: 'order.index',
            component: () =>
                import ('../components/Content/Order/index.vue'),
            meta: {
                requiresAuth: true,
            }
        }
    ]
},

{
    path: '/login',
    name: 'Login',
    component: () =>
        import ('./../components/Login.vue'),
    meta: {
        isIndex: false,
        isLoginRoute: true
    },
},

{
    path: '/',
    name: 'HelloWorld',
    component: () =>
        import ('./../components/HelloWorld.vue'),
    redirect: { path: "/login" }
},
{
    path: '*',
    name: '404',
    component: () =>
        import ('./../components/Content/404.vue'),
    meta: {
        requiresAuth: false
    }
},

]

export default routes;