<?php
/**
 * Admin Routes
 * Routes accessible only to administrators
 * All routes require 'admin' middleware
 */

return [
    // Admin Dashboard
    '/admin' => [
        'controller' => 'AdminController@dashboard',
        'middleware' => 'admin'
    ],
    '/admin/dashboard' => [
        'controller' => 'AdminController@dashboard',
        'middleware' => 'admin'
    ],

    // Event Management
    '/admin/events' => [
        'controller' => 'AdminController@manageEvents',
        'middleware' => 'admin'
    ],
    '/admin/events/create' => [
        'controller' => 'AdminController@createEvent',
        'middleware' => 'admin'
    ],
    '/admin/events/store' => [
        'controller' => 'AdminController@storeEvent',
        'middleware' => 'admin'
    ],
    '/admin/events/edit/{id}' => [
        'controller' => 'AdminController@editEvent',
        'middleware' => 'admin'
    ],
    '/admin/events/update/{id}' => [
        'controller' => 'AdminController@updateEvent',
        'middleware' => 'admin'
    ],
    '/admin/events/delete/{id}' => [
        'controller' => 'AdminController@deleteEvent',
        'middleware' => 'admin'
    ],

    // Gallery Management
    '/admin/gallery' => [
        'controller' => 'AdminController@manageGallery',
        'middleware' => 'admin'
    ],
    '/admin/gallery/upload' => [
        'controller' => 'AdminController@uploadGallery',
        'middleware' => 'admin'
    ],
    '/admin/gallery/store' => [
        'controller' => 'AdminController@storeGallery',
        'middleware' => 'admin'
    ],
    '/admin/gallery/delete/{id}' => [
        'controller' => 'AdminController@deleteGallery',
        'middleware' => 'admin'
    ],

    // User Management
    '/admin/users' => [
        'controller' => 'AdminController@manageUsers',
        'middleware' => 'admin'
    ],
    '/admin/users/edit/{id}' => [
        'controller' => 'AdminController@editUser',
        'middleware' => 'admin'
    ],
    '/admin/users/update/{id}' => [
        'controller' => 'AdminController@updateUser',
        'middleware' => 'admin'
    ],
    '/admin/users/delete/{id}' => [
        'controller' => 'AdminController@deleteUser',
        'middleware' => 'admin'
    ],

    // Contact Messages
    '/admin/messages' => [
        'controller' => 'AdminController@manageMessages',
        'middleware' => 'admin'
    ],
    '/admin/messages/{id}' => [
        'controller' => 'AdminController@viewMessage',
        'middleware' => 'admin'
    ],
];
