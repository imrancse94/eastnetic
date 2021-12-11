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
        children: [{
                path: 'dashboard',
                name: 'admin.dashboard',
                component: () =>
                    import ('./../components/Content/Dashboard.vue'),
                meta: {
                    requiresAuth: true,
                    permission: 'dashboard-list',
                    isIndex: true
                }
            },
            {
                path: 'module',
                name: 'module-index',
                component: () =>
                    import ('../components/Content/Module/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'module/add',
                name: 'module-add',
                component: () =>
                    import ('../components/Content/Module/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'module/edit/:id',
                name: 'module-edit',
                component: () =>
                    import ('../components/Content/Module/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'submodule',
                name: 'submodule-index',
                component: () =>
                    import ('../components/Content/Submodule/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'submodule/add',
                name: 'submodule-add',
                component: () =>
                    import ('../components/Content/Submodule/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'submodule/edit/:id',
                name: 'submodule-edit',
                component: () =>
                    import ('../components/Content/Submodule/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'page',
                name: 'page-index',
                component: () =>
                    import ('../components/Content/Page/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'page/add',
                name: 'page-add',
                component: () =>
                    import ('../components/Content/Page/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'page/edit/:id',
                name: 'page-edit',
                component: () =>
                    import ('../components/Content/Page/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'rolepage/list',
                name: 'role-page-assoc',
                component: () =>
                    import ('../components/Content/RolePage/index.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'company',
                name: 'company-index',
                component: () =>
                    import ('../components/Content/Company/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'company/add',
                name: 'company-add',
                component: () =>
                    import ('../components/Content/Company/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'company/edit/:id',
                name: 'company-edit',
                component: () =>
                    import ('../components/Content/Company/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'user',
                name: 'user-index',
                component: () =>
                    import ('../components/Content/User/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'user/add',
                name: 'user-add',
                component: () =>
                    import ('../components/Content/User/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'user/edit/:id',
                name: 'user-edit',
                component: () =>
                    import ('../components/Content/User/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'role',
                name: 'role-index',
                component: () =>
                    import ('../components/Content/Role/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'role/add',
                name: 'role-add',
                component: () =>
                    import ('../components/Content/Role/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'role/edit/:id',
                name: 'role-edit',
                component: () =>
                    import ('../components/Content/Role/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'usergroup',
                name: 'usergroup-index',
                component: () =>
                    import ('../components/Content/Usergroup/index.vue'),
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: 'usergroup/add',
                name: 'usergroup-add',
                component: () =>
                    import ('../components/Content/Usergroup/add.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'usergroup/edit/:id',
                name: 'usergroup-edit',
                component: () =>
                    import ('../components/Content/Usergroup/edit.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'usergroup/role/assoc',
                name: 'usergroup-role-assoc',
                component: () =>
                    import ('../components/Content/Usergroup/index.vue'),
                meta: {
                    requiresAuth: true,

                }
            },
            {
                path: 'site/settings',
                name: 'site-settings',
                component: () =>
                    import ('../components/Content/Usergroup/index.vue'),
                meta: {
                    requiresAuth: true,

                }
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