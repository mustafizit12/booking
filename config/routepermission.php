<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 7/1/18
 * Time: 11:35 AM
 */

return [
    'route_storage' => env('ROUTE_STORAGE', 'cache'),

    'configurable_routes' => [
        ROUTE_SECTION_APPLICATION_MANAGEMENTS => [
            ROUTE_SUB_SECTION_APPLICATION_SETTINGS => [
                ROUTE_GROUP_READER_ACCESS => [
                    'application-settings.index',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'application-settings.edit',
                    'application-settings.update',
                ],
            ],
            ROUTE_SUB_SECTION_ROLE_MANAGEMENTS => [
                ROUTE_GROUP_READER_ACCESS => [
                    'roles.index',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'roles.create',
                    'roles.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'roles.edit',
                    'roles.update',
                    'roles.status',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'roles.destroy',
                ],
            ],
            'system_notice' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'system-notices.index',
                    'system-notices.show'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'system-notices.create',
                    'system-notices.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'system-notices.edit',
                    'system-notices.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'system-notices.destroy',
                ]
            ],
            'menu_manager' => [
                ROUTE_GROUP_FULL_ACCESS => [
                    'menu-manager.index',
                    'menu-manager.save',
                ],
            ],
            'log_viewer' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'logs.index'
                ]
            ],
            'language_managements' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'languages.index',
                    'languages.settings',
                    'languages.translations'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'languages.create',
                    'languages.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'languages.edit',
                    'languages.update',
                    'languages.update.settings',
                    'languages.sync',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'languages.destroy'
                ]
            ],
            'areas' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'areas.index',
                    'areas.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'areas.create',
                    'areas.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'areas.edit',
                    'areas.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'areas.destroy'
                ]
            ],
            'hotels' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'hotels.index',
                    'hotels.show',
                    'hotels.getAgent',
                    'hotel_pending_reservation',
                    'hotel_approved_reservation',
                    'hotel_complete_reservation',
                    'hotel_rejected_reservation',
                    'reservation_approved',
                    'reservation_reject'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'hotels.create',
                    'hotels.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'hotels.edit',
                    'hotels.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'hotels.destroy'
                ]
            ],
            'rooms' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'rooms.index',
                    'rooms.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'rooms.create',
                    'rooms.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'rooms.edit',
                    'rooms.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'rooms.destroy'
                ]
            ],
            'buss' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'buss.index',
                    'buss.show',
                    'bus_pending_reservation',
                    'bus_approved_reservation',
                    'bus_complete_reservation',
                    'bus_rejected_reservation'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'buss.create',
                    'buss.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'buss.edit',
                    'buss.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'buss.destroy'
                ]
            ],
            'rentCars' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'rentCars.index',
                    'rentCars.show',
                    'rentCar_pending_reservation',
                    'rentCar_approved_reservation',
                    'rentCar_complete_reservation',
                    'rentCar_rejected_reservation'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'rentCars.create',
                    'rentCars.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'rentCars.edit',
                    'rentCars.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'rentCars.destroy'
                ]
            ],
            'tourPackages' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'tourPackages.index',
                    'tourPackages.show',
                    'tourPackage_pending_reservation',
                    'tourPackage_approved_reservation',
                    'tourPackage_complete_reservation',
                    'tourPackage_rejected_reservation'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'tourPackages.create',
                    'tourPackages.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'tourPackages.edit',
                    'tourPackages.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'tourPackages.destroy'
                ]
            ],
            'venues' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'venues.index',
                    'venues.show',
                    'venue_pending_reservation',
                    'venue_approved_reservation',
                    'venue_complete_reservation',
                    'venue_rejected_reservation'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'venues.create',
                    'venues.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'venues.edit',
                    'venues.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'venues.destroy'
                ]
            ],
            'visas' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'visas.index',
                    'visas.show',
                    'visa_pending_reservation',
                    'visa_approved_reservation',
                    'visa_complete_reservation',
                    'visa_rejected_reservation'
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'visas.create',
                    'visas.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'visas.edit',
                    'visas.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'visas.destroy'
                ]
            ],
            'sliders' => [
                ROUTE_GROUP_READER_ACCESS => [
                    'sliders.index',
                    'sliders.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'sliders.create',
                    'sliders.store'
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'sliders.edit',
                    'sliders.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'sliders.destroy'
                ]
            ],
        ],
        ROUTE_SECTION_USER_MANAGEMENTS => [
            ROUTE_SUB_SECTION_USERS => [
                ROUTE_GROUP_READER_ACCESS => [
                    'users.index',
                    'users.show',
                ],
                ROUTE_GROUP_CREATION_ACCESS => [
                    'users.create',
                    'users.store',
                ],
                ROUTE_GROUP_MODIFIER_ACCESS => [
                    'users.edit',
                    'users.update',
                ],
                ROUTE_GROUP_DELETION_ACCESS => [
                    'users.update.status',
                    'users.edit.status',
                ],
            ],
        ],
    ],

    ROUTE_CONSTANT_PERMISSION => [
        FIXED_USER_SUPER_ADMIN => [
            ROUTE_MUST_ACCESSIBLE => [
                ROUTE_SECTION_APPLICATION_MANAGEMENTS,
                ROUTE_SECTION_USER_MANAGEMENTS,
            ],
            ROUTE_NOT_ACCESSIBLE => [
            ],
        ],
    ],
    ROUTE_TYPE_AVOIDABLE_MAINTENANCE => [
        'login',
    ],
    ROUTE_TYPE_AVOIDABLE_UNVERIFIED => [

    ],
    ROUTE_TYPE_AVOIDABLE_SUSPENDED => [

    ],
    ROUTE_TYPE_FINANCIAL => [

    ],

    ROUTE_TYPE_PRIVATE => [
        'logout',
        'profile.index',
        'dashboard.index',
        'profile.edit',
        'profile.update',
        'profile.change-password',
        'profile.update-password',
        'profile.avatar.edit',
        'profile.avatar.update',
        'account.index',
        'account.update',
        'account.logout',
        'notices.index',
        'notices.mark-as-read',
        'notices.mark-as-unread',
    ],
];
