<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            [
                'slug' => 'top-nav',
                'items' => '[{"name":"Home","class":"","icon":"fa fa-home","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"home","new_tab":"0","mega_menu":"0","order":"1"},{"name":"Dashboard","class":"","icon":"fa fa-dashboard","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"dashboard","new_tab":"0","mega_menu":"0","order":"2"},{"name":"Application Control","custom_link":"javascript:;","class":"","icon":"fa fa-gear","beginning_text":"","ending_text":"","parent_id":"0","route":"","new_tab":"0","mega_menu":"0","order":"3"},{"name":"Application Settings","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"3","route":"application-settings.index","new_tab":"0","mega_menu":"0","order":"4"},{"name":"Role Management","custom_link":"javascript:;","class":"","icon":"","beginning_text":"","ending_text":"","parent_id":"3","route":"","new_tab":"0","mega_menu":"0","order":"5"},{"name":"List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"5","route":"roles.index","new_tab":"0","mega_menu":"0","order":"6"},{"name":"Create New","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"5","route":"roles.create","new_tab":"0","mega_menu":"0","order":"7"},{"name":"Language Management","custom_link":"javascript:;","class":"","icon":"","beginning_text":"","ending_text":"","parent_id":"3","route":"","new_tab":"0","mega_menu":"0","order":"8"},{"name":"Settings","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"8","route":"languages.settings","new_tab":"0","mega_menu":"0","order":"9"},{"name":"List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"8","route":"languages.index","new_tab":"0","mega_menu":"0","order":"10"},{"name":"Create New","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"8","route":"languages.create","new_tab":"0","mega_menu":"0","order":"11"},{"name":"Menu Manager","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"3","route":"menu-manager.index","new_tab":"0","mega_menu":"0","order":"12"},{"name":"Log Viewer","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"3","route":"logs.index","new_tab":"0","mega_menu":"0","order":"13"},{"name":"System Notice Management","custom_link":"javascript:;","class":"","icon":"","beginning_text":"","ending_text":"","parent_id":"3","route":"","new_tab":"0","mega_menu":"0","order":"14"},{"name":"List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"14","route":"system-notices.index","new_tab":"0","mega_menu":"0","order":"15"},{"name":"Create New","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"14","route":"system-notices.create","new_tab":"0","mega_menu":"0","order":"16"},{"name":"User Management","custom_link":"javascript:;","class":"","icon":"fa fa-users","beginning_text":"","ending_text":"","parent_id":"0","route":"","new_tab":"0","mega_menu":"0","order":"17"},{"name":"List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"17","route":"users.index","new_tab":"0","mega_menu":"0","order":"18"},{"name":"Create New","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"17","route":"users.create","new_tab":"0","mega_menu":"0","order":"19"}]',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'slug' => 'side-nav',
                'items' => '[{"name":"Setup","custom_link":"#","class":"","icon":"fa fa-cogs","beginning_text":"","ending_text":"","parent_id":"0","route":"","new_tab":"0","mega_menu":"0","order":"1"},{"name":"Area List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"1","route":"areas.index","new_tab":"0","mega_menu":"0","order":"2"},{"name":"Hotel List","class":"","icon":"fa fa-hotel","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"hotels.index","new_tab":"0","mega_menu":"0","order":"3"},{"name":"Create Hotel","class":"","icon":"fa fa-hotel","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"hotels.create","new_tab":"0","mega_menu":"0","order":"4"},{"name":"Room List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"rooms.index","new_tab":"0","mega_menu":"0","order":"5"},{"name":"Create Room","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"rooms.create","new_tab":"0","mega_menu":"0","order":"6"},{"name":"Bus List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"buss.index","parent_id":"0","new_tab":"0","mega_menu":"0","order":"7"},{"name":"Create Bus","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"buss.create","parent_id":"0","new_tab":"0","mega_menu":"0","order":"8"},{"name":"Rent Car List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"rentCars.index","parent_id":"0","new_tab":"0","mega_menu":"0","order":"9"},{"name":"Create Rent Car","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"rentCars.create","parent_id":"0","new_tab":"0","mega_menu":"0","order":"10"},{"name":"Tour Package List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"tourPackages.index","parent_id":"0","new_tab":"0","mega_menu":"0","order":"11"},{"name":"Create Tour Package","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"tourPackages.create","parent_id":"0","new_tab":"0","mega_menu":"0","order":"12"},{"name":"Venue List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"venues.index","parent_id":"0","new_tab":"0","mega_menu":"0","order":"13"},{"name":"Create Venue","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"venues.create","parent_id":"0","new_tab":"0","mega_menu":"0","order":"14"},{"name":"Visa List","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"visas.index","parent_id":"0","new_tab":"0","mega_menu":"0","order":"15"},{"name":"Create Visa","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"visas.create","parent_id":"0","new_tab":"0","mega_menu":"0","order":"16"}]',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],
            [
                'slug' => 'profile-nav',
                'items' => '[{"name":"My Profile","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"profile.index","new_tab":"0","mega_menu":"0","order":"1"},{"name":"Edit Profile","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"profile.edit","new_tab":"0","mega_menu":"0","order":"2"},{"name":"Change password","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"profile.change-password","new_tab":"0","mega_menu":"0","order":"3"},{"name":"Change Avatar","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"profile.avatar.edit","new_tab":"0","mega_menu":"0","order":"4"},{"name":"My Notifications","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","parent_id":"0","route":"notices.index","new_tab":"0","mega_menu":"0","order":"5"},{"name":"Verify Email","class":"","icon":"","beginning_text":"","ending_text":"","custom_link":"","route":"verification.form","parent_id":"0","new_tab":"0","mega_menu":"0","order":"6"}]',
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ],

        ];
        $cachedNavigation = [];
        foreach($input as $value){
            Cache::forever("navigation:".$value['slug'], json_decode($value['items'], true));
        }
        DB::table('navigations')->insert($input);
    }
}
