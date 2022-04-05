<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 7/1/18
 * Time: 1:04 PM
 */

/*
 * Common Constant
 */
const LANGUAGE_DEFAULT = 'en';
const TIMEZONE_DEFAULT = '+GMT';
const ITEM_PER_PAGE = 10;

/*
 * Constant user and role IDs
 */
const USER_ROLE_SUPER_ADMIN = 1;
const USER_ROLE_ADMIN = 2;
const USER_ROLE_USER = 3;

const FIXED_USER_SUPER_ADMIN = 1;

/*
 * Response from services
 * used only for return
 */

const SERVICE_RESPONSE_STATUS = 'status';
const SERVICE_RESPONSE_MESSAGE = 'message';

const SERVICE_RESPONSE_SUCCESS = 'success';
const SERVICE_RESPONSE_WARNING = 'warning';
const SERVICE_RESPONSE_ERROR = 'error';

/*
 * Route Configuration file
 */

const ROUTE_SECTION_USER_MANAGEMENTS = 'user_managements';
const ROUTE_SECTION_APPLICATION_MANAGEMENTS = 'application_managements';

const ROUTE_SUB_SECTION_USERS = 'users';
const ROUTE_SUB_SECTION_ROLE_MANAGEMENTS = 'role_managements';
const ROUTE_SUB_SECTION_APPLICATION_SETTINGS = 'settings';

const ROUTE_GROUP_READER_ACCESS = 'reader_access';
const ROUTE_GROUP_CREATION_ACCESS = 'creation_access';
const ROUTE_GROUP_MODIFIER_ACCESS = 'modifier_access';
const ROUTE_GROUP_DELETION_ACCESS = 'deletion_access';
const ROUTE_GROUP_FULL_ACCESS = 'full_access';

const ROUTE_TYPE_AVOIDABLE_MAINTENANCE = 'avoidable_maintenance_routes';
const ROUTE_TYPE_AVOIDABLE_UNVERIFIED = 'avoidable_unverified_routes';
const ROUTE_TYPE_AVOIDABLE_SUSPENDED = 'avoidable_suspended_routes';
const ROUTE_TYPE_FINANCIAL = 'financial_routes';
const ROUTE_TYPE_PRIVATE = 'private_routes';

const ROUTE_CONSTANT_PERMISSION = 'route_constant_permission';
const ROUTE_MUST_ACCESSIBLE = 'route_must_accessible';
const ROUTE_NOT_ACCESSIBLE = 'route_not_accessible';

/*
 * All route redirection
 */

const ROUTE_REDIRECT_TO_UNAUTHORIZED = '401';
const ROUTE_REDIRECT_TO_UNDER_MAINTENANCE = 'under_maintenance';
const ROUTE_REDIRECT_TO_EMAIL_UNVERIFIED = 'email_unverified';
const ROUTE_REDIRECT_TO_ACCOUNT_SUSPENDED = 'account_suspended';
const ROUTE_REDIRECT_TO_FINANCIAL_ACCOUNT_SUSPENDED = 'financial_account_suspended';
const REDIRECT_ROUTE_TO_SUPERADMIN_AFTER_LOGIN = 'profile.index';
const REDIRECT_ROUTE_TO_USER_AFTER_LOGIN = 'profile.index';
const REDIRECT_ROUTE_TO_LOGIN = 'login';

/*
 * All Status
 */
const UNDER_MAINTENANCE_MODE_ACTIVE = 1;
const UNDER_MAINTENANCE_MODE_INACTIVE = 0;

const UNDER_MAINTENANCE_ACCESS_ACTIVE = 1;
const UNDER_MAINTENANCE_ACCESS_INACTIVE = 0;

const ACTIVE_STATUS_ACTIVE = 1;
const ACTIVE_STATUS_INACTIVE = 0;

const FINANCIAL_STATUS_ACTIVE = 1;
const FINANCIAL_STATUS_INACTIVE = 0;

const EMAIL_VERIFICATION_STATUS_ACTIVE = 1;
const EMAIL_VERIFICATION_STATUS_INACTIVE = 0;

const USER_STATUS_INACTIVE = 0;
const USER_STATUS_ACTIVE = 1;
const USER_STATUS_DELETED = -1;

const APPROVE_STATUS_PENDING = 0;
const APPROVE_STATUS_APPROVED = 1;
const APPROVE_STATUS_REJECT = 2;
