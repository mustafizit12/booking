<?php
return [

    'fixed_roles' => [USER_ROLE_SUPER_ADMIN, USER_ROLE_USER],

    'fixed_users' => [FIXED_USER_SUPER_ADMIN],


    'path_profile_image' => 'images/users/',
    'path_slider_image' => 'images/slider/',
    'path_hotel_image' => 'images/hotel/',
    'path_room_image' => 'images/room/',
    'path_bus_image' => 'images/bus/',
    'path_rent_car_image' => 'images/rent_car/',
    'path_tour_package_image' => 'images/tour_package/',
    'path_venue_image' => 'images/venue/',
    'path_visa_image' => 'images/visa/',
    'path_image' => 'images/',
    'language_icon' => 'images/languages/',
    'email_status' => [
        EMAIL_VERIFICATION_STATUS_ACTIVE => ['color_class' => 'success'],
        EMAIL_VERIFICATION_STATUS_INACTIVE => ['color_class' => 'danger'],
    ],
    'account_status' => [
        USER_STATUS_ACTIVE => ['color_class' => 'success'],
        USER_STATUS_INACTIVE => ['color_class' => 'warning'],
        USER_STATUS_DELETED => ['color_class' => 'danger'],
    ],
    'active_status' => [
        ACTIVE_STATUS_ACTIVE => ['color_class' => 'success'],
        ACTIVE_STATUS_INACTIVE => ['color_class' => 'danger'],
    ],
    'financial_status' => [
        FINANCIAL_STATUS_ACTIVE => ['color_class' => 'success'],
        FINANCIAL_STATUS_INACTIVE => ['color_class' => 'danger'],
    ],
    'maintenance_accessible_status' => [
        UNDER_MAINTENANCE_ACCESS_ACTIVE => ['color_class' => 'success'],
        UNDER_MAINTENANCE_ACCESS_INACTIVE => ['color_class' => 'danger'],
    ],
    'image_extensions' => ['png', 'jpg', 'jpeg', 'gif'],

    'system_notice_types' => ['warning', 'success', 'danger', 'primary', 'info'],

    'strip_tags' => [
        'escape_text' => ['beginning_text', 'ending_text','company_name'],
        'escape_full_text' => ['details_text'],
        'allowed_tag_for_escape_text' => '<p><br><b><i><u><strong><ul><ol><li>',
        'allowed_tag_for_escape_full_text' => '<h1><h2><h3><h4><h5><h6><hr><article><section><video><audio><table><tr><td><thead><tfoot><footer><header><p><br><b><i><u><strong><ul><ol><dl><dt><li><div><sub><sup><span>',
    ],

    'available_commands' => [
        'cache' => 'cache:clear',
        'config' => 'config:clear',
        'route' => 'route:clear',
        'view' => 'view:clear',
    ],

];
