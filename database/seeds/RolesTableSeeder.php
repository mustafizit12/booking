<?php

use App\Models\Core\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $date = Carbon::now();

        $inputs = [
            [
                'name' => 'Admin',
                'permissions' => '[]',
                'created_at' => $date,
                'updated_at' => $date

            ],
            [
                'name' => 'Vendor',
                'permissions' => '[]',
                'created_at' => $date,
                'updated_at' => $date

            ],
            [
                'name' => 'Agent',
                'permissions' => '[]',
                'created_at' => $date,
                'updated_at' => $date
            ],
        ];


        Role::insert($inputs);

        foreach ($inputs as $key => $input) {

            cache()->forever("roles" . ($key + 1), json_decode($input['permissions'], true));
        }
    }
}
