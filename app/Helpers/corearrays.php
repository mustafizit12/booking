<?php
/**
 * Created by PhpStorm.
 * User: zahid
 * Date: 2018-07-31
 * Time: 2:24 PM
 */
if (!function_exists('no_header_layout')) {
    function no_header_layout($input = null)
    {
        $output = [
            0 => __('Dark'),
            1 => __('Light'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}
if (!function_exists('top_nav_type')) {
    function top_nav_type($input = null)
    {
        $output = [
            0 => __('Dark'),
            1 => __('Light'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}
if (!function_exists('side_nav_type')) {
    function side_nav_type($input = null)
    {
        $output = [
            0 => __('Dark'),
            1 => __('Light'),
            2 => __('Dark Transparent'),
            3 => __('light Transparent'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}
if (!function_exists('navigation_type')) {
    function navigation_type($input = null)
    {
        $output = [
            0 => __('Top navigation'),
            1 => __('Side navigation'),
            2 => __('Both'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}
if (!function_exists('inversed_logo')) {
    function inversed_logo($input = null)
    {
        $output = [
            ACTIVE_STATUS_ACTIVE => __('Enabled'),
            ACTIVE_STATUS_INACTIVE => __('Disabled')
        ];
        return is_null($input) ? $output : $output[$input];
    }
}
if (!function_exists('maintenance_status')) {
    function maintenance_status($input = null)
    {
        $output = [
            UNDER_MAINTENANCE_MODE_ACTIVE => __('Enabled'),
            UNDER_MAINTENANCE_MODE_INACTIVE => __('Disabled')
        ];
        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('email_status')) {
    function email_status($input = null)
    {
        $output = [
            EMAIL_VERIFICATION_STATUS_ACTIVE => __('Verified'),
            EMAIL_VERIFICATION_STATUS_INACTIVE => __('Unverified')
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('financial_status')) {
    function financial_status($input = null)
    {
        $output = [
            FINANCIAL_STATUS_ACTIVE => __('Active'),
            FINANCIAL_STATUS_INACTIVE => __('Suspended')
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('maintenance_accessible_status')) {
    function maintenance_accessible_status($input = null)
    {
        $output = [
            UNDER_MAINTENANCE_ACCESS_ACTIVE => __('Active'),
            UNDER_MAINTENANCE_ACCESS_INACTIVE => __('Inactive')
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('account_status')) {
    function account_status($input = null)
    {
        $output = [
            USER_STATUS_ACTIVE => __('Active'),
            USER_STATUS_INACTIVE => __('Suspended'),
            USER_STATUS_DELETED => __('Deleted')
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('active_status')) {
    function active_status($input = null)
    {
        $output = [
            ACTIVE_STATUS_ACTIVE => __('Active'),
            ACTIVE_STATUS_INACTIVE => __('Inactive'),
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('course_type')) {
    function course_type($input = null)
    {
        $output = [
            COURSE_TYPE_VIDEO => __('Video Course'),
            COURSE_TYPE_LIVE => __('Live Course'),
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('api_permission')) {
    function api_permission($input = null)
    {
        $output = [
            ROUTE_REDIRECT_TO_UNAUTHORIZED => '401',
            ROUTE_REDIRECT_TO_UNDER_MAINTENANCE => 'under_maintenance',
            ROUTE_REDIRECT_TO_EMAIL_UNVERIFIED => 'email_unverified',
            ROUTE_REDIRECT_TO_ACCOUNT_SUSPENDED => 'account_suspension',
            ROUTE_REDIRECT_TO_FINANCIAL_ACCOUNT_SUSPENDED => 'financial_suspension',
            REDIRECT_ROUTE_TO_USER_AFTER_LOGIN => 'login_success',
            REDIRECT_ROUTE_TO_LOGIN => 'login',
        ];

        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('language_switcher_items')) {
    function language_switcher_items($input = null)
    {
        $output = [
            'name' => __('Name'),
            'short_code' => __('Short Code'),
            'icon' => __('Icon')
        ];
        return is_null($input) ? $output : $output[$input];
    }
}

if (!function_exists('approve_status')) {
    function approve_status($input = null)
    {
        $output = [
            APPROVE_STATUS_PENDING => __('Pending'),
            APPROVE_STATUS_APPROVED => __('Approved'),
            APPROVE_STATUS_REJECT => __('Reject'),
        ];

        return is_null($input) ? $output : $output[$input];
    }
}
