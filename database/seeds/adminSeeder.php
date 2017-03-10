<?php

/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/13/17
 * Time: 11:01 AM
 */

use Illuminate\Database\Seeder;
use App\Rudraksha\Entities\Admin\Admin;

class adminSeeder extends Seeder
{
    /**
     * @var Admin
     */
    private $admin;

    /**
     * adminSeeder constructor.
     * @param Admin $admin
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function run()
    {
        $this->admin->create([
            "firstName" => "Admin",
            "lastName" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin123")
        ]);
    }
}