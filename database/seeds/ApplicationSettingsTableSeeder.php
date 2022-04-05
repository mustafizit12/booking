<?php

use App\Models\Core\ApplicationSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class ApplicationSettingsTableSeeder extends Seeder
{
    public function run()
    {
        $date_time = date('Y-m-d H:i:s');
        $adminSettingArray = [
            'lang' => 'en',
            'lang_switcher' => ACTIVE_STATUS_ACTIVE,
            'lang_switcher_item' => 'short_code',
            'registration_active_status' => ACTIVE_STATUS_ACTIVE,
            'default_role_to_register' => 3,
            'signupable_user_roles' => [3],
            'require_email_verification' => ACTIVE_STATUS_ACTIVE,
            'company_name' => 'Laraframe 3',
            'company_logo' => 'logo.png',

            'navigation_type' => 2,
            'top_nav' => 0,
            'side_nav' => 0,
            'side_nav_fixed' => 0,
            'logo_inversed_primary' => 0,
            'no_header_layout' => 0,
            'logo_inversed_secondary' => 0,
            'logo_inversed_sidenav' => 0,
            'favicon' => 'favicon.png',
            'show_fixed_roles' => 1,
            'item_per_page' => 10,
            'maintenance_mode' => 0,
            'admin_receive_email' => 'youremail@gmail.com',
            'display_google_captcha' => ACTIVE_STATUS_INACTIVE,
        ];

        $jsonFields = ['signupable_user_roles'];

        $adminSetting = [];
        foreach ($adminSettingArray as $key => $value) {
            $adminSetting[] = [
                'slug' => $key,
                'value' => in_array($key, $jsonFields) ? json_encode($value, true) : $value,
                'created_at' => $date_time,
                'updated_at' => $date_time
            ];
        }
        ApplicationSetting::insert($adminSetting);

        Cache::forever("application_settings", $adminSettingArray);
    }
}
