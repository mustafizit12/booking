<?php

use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date = Carbon::now();

        $users = [
            [
                'role_id' => USER_ROLE_SUPER_ADMIN,
                'username' => 'admin',
                'email' => 'admin@codemen.org',
                'password' => Hash::make('admin'),
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'role_id' => USER_ROLE_ADMIN,
                'username' => 'vendor',
                'email' => 'vendor@codemen.org',
                'password' => Hash::make('vendor'),
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'role_id' => USER_ROLE_USER,
                'username' => 'agent',
                'email' => 'agent@codemen.org',
                'password' => Hash::make('agent'),
                'is_accessible_under_maintenance' => UNDER_MAINTENANCE_ACCESS_INACTIVE,
                'is_email_verified' => EMAIL_VERIFICATION_STATUS_ACTIVE,
                'is_active' => ACTIVE_STATUS_ACTIVE,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];

        User::insert($users);
    }
}
