<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enum\Super;
use App\Models\LiveTV;
use App\Models\User;
use App\Models\Banner;
use App\Models\MetaData;
use App\Models\Settings;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        // \App\Models\User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::factory()->create([
            'fname' => 'Super',
            'lname' => 'Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'status' => 'active',
            'role'  => 'admin',
        ]);
        // Will create a Role named for Super Admin
        Role::create([
            'name' => Super::Admin,
        ]);
        // Assign the Role to User
        $user->assignRole(Super::Admin);

        MetaData::create([
            'title' => 'News Website',
            'author' => 'Abdullah Almamun',
            'keywords' => '',
            'description' => 'This is description',
        ]);
        Settings::create([
            'name' => 'Name',
        ]);

        Banner::create([
            'name' => 'home_one',
        ]);
        Banner::create([
            'name' => 'home_two',
        ]);
        Banner::create([
            'name' => 'home_three',
        ]);
        Banner::create([
            'name' => 'home_four',
        ]);
        Banner::create([
            'name' => 'news_category',
        ]);
        Banner::create([
            'name' => 'news_details',
        ]);

        LiveTV::create([]);

    }
}
