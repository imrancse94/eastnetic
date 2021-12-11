const routes = [{
        path: '/admin',
        name: 'admin',
        component: () =>
            import ('./../components/Admin.vue'),
        meta: {
            isIndex: false,
            requiresAuth: true
        },
        redirect: { name: "module-index" },
        children: [
            {
                path: 'module',
                name: 'module-index',
                component: () =>
                    import ('../components/Content/Module/index.vue'),
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

]

export default routes;