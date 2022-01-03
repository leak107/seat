<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(database_path('seeders/data/users.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $item) {
            $role = Role::query()->where('name', $item['role'])->first();

            User::query()->create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => 'password',
            ])->roles()->attach($role->id);
        }
    }
}
