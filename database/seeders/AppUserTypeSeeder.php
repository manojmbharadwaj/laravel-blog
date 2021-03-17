<?php

namespace Database\Seeders;

use App\Models\Usertype;
use Illuminate\Database\Seeder;

class AppUserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        $usertypes = [
            1 => 'SuperAdmin',
            2 => 'Admin',
            3 => 'User'    // End User
        ];

        // Truncate the table first to preserve the IDs
        // UserType::truncate();

        foreach ($usertypes as $id => $usertype) {
            $newUserType = new Usertype();
            $newUserType->id = $id;
            $newUserType->usertype = $usertype;
            $newUserType->save();
        }
    }
}
