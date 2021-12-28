const ADMIN = import ('./../components/Admin.vue');
const routes = [{
    path: '/',
    name: 'dashboard',
    component: () =>ADMIN,
    meta: {
        isIndex: false,
        requiresAuth: true
    },
    redirect: { name: "dashboard.index" },
    children: [
        {
            path: 'dashboard',
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
    component: () =>ADMIN,
    meta: {
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
                requiresAuth: true
            }
        },
        {
            path: 'add',
            name: 'order.add',
            component: () =>
                import ('../components/Content/Order/add.vue'),
            meta: {
                requiresAuth: true
            }
        },
        {
            path: 'edit/:id',
            name: 'order.edit',
            component: () =>
                import ('../components/Content/Order/edit.vue'),
            meta: {
                requiresAuth: true
            }
        }
    ]
},

{
    path: '/product',
    name: 'product',
    component: () => ADMIN,
    meta: {
        requiresAuth: true
    },
    redirect: { name: "product.index" },
    children: [
        {
            path: '',
            name: 'product.index',
            component: () =>
                import ('../components/Content/Product/index.vue'),
            meta: {
                requiresAuth: true
            }
        },
        {
            path: 'add',
            name: 'product.add',
            component: () =>
                import ('../components/Content/Product/add.vue'),
            meta: {
                requiresAuth: true
            }
        },
        {
            path: 'edit/:id',
            name: 'product.edit',
            component: () =>
                import ('../components/Content/Product/edit.vue'),
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
        requiresAuth: false,
        isLoginRoute:true
    },
},
{
    path: '/signup',
    name: 'Signup',
    component: () =>
        import ('./../components/Signup.vue'),
    meta: {
        requiresAuth: false
    },
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