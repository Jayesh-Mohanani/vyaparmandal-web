<?php
/**
 * Public Web Routes
 * Routes accessible to all users
 */

return [
    // Home page
    '/' => [
        'controller' => 'HomeController@index'
    ],

    // About page
    '/about' => [
        'controller' => 'HomeController@about'
    ],

    // Events pages
    '/events' => [
        'controller' => 'HomeController@events'
    ],
    '/events/{id}' => [
        'controller' => 'HomeController@eventDetail'
    ],

    // Gallery page
    '/gallery' => [
        'controller' => 'HomeController@gallery'
    ],

    // Membership page
    '/membership' => [
        'controller' => 'HomeController@membership'
    ],
    '/membership/submit' => [
        'controller' => 'HomeController@membershipSubmit'
    ],

    // Contact page
    '/contact' => [
        'controller' => 'HomeController@contact'
    ],
    '/contact/submit' => [
        'controller' => 'HomeController@contactSubmit'
    ],

    // Authentication routes
    '/login' => [
        'controller' => 'AuthController@showLogin'
    ],
    '/login/submit' => [
        'controller' => 'AuthController@login'
    ],
    '/register' => [
        'controller' => 'AuthController@showRegister'
    ],
    '/register/submit' => [
        'controller' => 'AuthController@register'
    ],
    '/logout' => [
        'controller' => 'AuthController@logout',
        'middleware' => 'auth'
    ],

    // Profile (requires authentication)
    '/profile' => [
        'controller' => 'HomeController@profile',
        'middleware' => 'auth'
    ],
];
