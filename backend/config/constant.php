<?php

//  define('ADMIN_USER_TYPE_ID',1);
//  define('BUYER_USER_TYPE_ID',2);
$admin_user_type = 1;
$buyer_user_type = 2;

$ORDER_PENDING = 0;
$ORDER_APPROVED = 1;
$ORDER_REJECTED = 2;
$ORDER_PROCESSING = 3;
$ORDER_SHIPPED = 4;
$ORDER_DELIVERED = 5;
$ORDER_CANCELED = 6;

return [
    
    'PERMISSION_ERROR'=>"P401",

    "SUCCESS_CODE"=>100,

    'ADMIN_USER_TYPE'=>$admin_user_type,
    'BUYER_USER_TYPE'=>$buyer_user_type,

    'DEFAULT_PAGINATE_LIMIT'=>10,
    'ADMIN_EMAIL'=>'imrancse94@gmail.com',

    'VALIDATION_ERROR'=>1000,
    'UNATHENTICATED_ERROR'=>4001,

    'ORDER_PENDING'=> $ORDER_PENDING,
    'ORDER_APPROVED'=> $ORDER_APPROVED,
    'ORDER_REJECTED'=> $ORDER_REJECTED,
    'ORDER_PROCESSING'=> $ORDER_PROCESSING,
    'ORDER_SHIPPED'=> $ORDER_SHIPPED,
    'ORDER_DELIVERED'=> $ORDER_DELIVERED,
    'ORDER_CANCELED'=> $ORDER_CANCELED,

    'PRODUCT_ADD_SUCCESS'=>100,
    'PRODUCT_ADD_FAILED'=>-100,
    
    'PRODUCT_EDIT_FAILED'=>-101,
    'PRODUCT_EDIT_SUCCESS'=>101,
    
    'PRODUCT_GET_BY_ID_FAILED'=>-102,
    'PRODUCT_GET_BY_ID_SUCCESS'=>102,
    
    'PRODUCT_GET_LIST_FAILED'=>-103,
    'PRODUCT_GET_LIST_SUCCESS'=>103,
    
    'PRODUCT_DELETED_FAILED'=>-104,
    'PRODUCT_DELETED_SUCCESS'=>104,
    
    'LOGIN_FAILED'=>-105,
    'LOGIN_SUCCESS'=>105,
    
    'USER_SIGNUP_FAILED'=>-106,
    'USER_SIGNUP_SUCCESS'=>106,

    'ORDER_ADDED_FAILED'=>-107,
    'ORDER_ADDED_SUCCESS'=>107,
    
    'ORDER_EDITED_FAILED'=>-108,
    'ORDER_EDITED_SUCCESS'=>108,

    'ORDER_LIST_SUCCESS'=>109,
    'ORDER_LIST_FAILED'=>-109,

    'ORDER_GET_SUCCESS'=>110,
    'ORDER_GET_FAILED'=>-110,
    
    'ORDER_DELETE_SUCCESS'=>110,
    'ORDER_DELETE_FAILED'=>-110,

    'USER_LOGOUT_SUCCESS'=>111,
    'USER_LOGOUT_FAILED'=>-111,

    'AUTH_USER_SUCCESS'=>112,

    // always first route will be default route
    "PERMISSIONS"=>[
        "$admin_user_type" =>[
                'dashboard.index', 
                'product.index',
                'product.add',
                'product.edit',
                'product.delete',
                'order.index',
                'order.add',
                'order.edit',
                'order.delete',
            ],
        "$buyer_user_type" =>[
            'order.index',
            'order.add',
            'order.edit',
            'order.delete',
        ]

],

    "ORDER_STATUS_LIST"=>[
        "$admin_user_type" =>[
            $ORDER_PENDING =>"PENDING",
            $ORDER_APPROVED => "APPROVED",
            $ORDER_REJECTED =>"REJECTED",
            $ORDER_PROCESSING =>"PROCESSING",
            $ORDER_SHIPPED =>"SHIPPED",
            $ORDER_DELIVERED =>"DELIVERED"
        ],
        "$buyer_user_type"=>[
            $ORDER_PENDING =>"PENDING",
            $ORDER_CANCELED =>"CANCEL"
        ]
    ],
];