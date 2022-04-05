<?php

use App\Models\User\UserProfile;
use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon\Carbon::now();
        $profiles = [
            [
                'user_id' => 2,
                'first_name' => "Mr",
                'last_name' => "Vendor",
                'phone' => '01114548545',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 3,
                'first_name' => "Mr",
                'last_name' => "Agent",
                'phone' => '01114548545',
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];
        $superadmin = [];
        if(env('APP_INSTALLED')){
            $superadmin = [
                [
                    'user_id' => 1,
                    'first_name' => "Mr",
                    'last_name' => "Admin",
                    'phone' => '01114548545',
                    'created_at' => $date,
                    'updated_at' => $date
                ]
            ];
        }
        $profiles = array_merge($superadmin,$profiles);

        UserProfile::insert($profiles);
    }
}
