<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
          [
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$akHCvTRpvma2eB8VOqUEoOtpWEelS2/e2TZK3LJyfLxuvw8MrQxVq',
            'role_id' => 1,
            'remember_token' => '',
          ],
          [
            'id' => 2,
            'name' => 'Reception',
            'email' => 'reception@reception.com',
            'password' => '$2y$10$akHCvTRpvma2eB8VOqUEoOtpWEelS2/e2TZK3LJyfLxuvw8MrQxVq',
            'role_id' => 2,
            'remember_token' => '',
          ],
          [
            'id' => 3,
            'name' => 'HouseKeeper',
            'email' => 'housekeeper@housekeeper.com',
            'password' => '$2y$10$akHCvTRpvma2eB8VOqUEoOtpWEelS2/e2TZK3LJyfLxuvw8MrQxVq',
            'role_id' => 3, 
            'remember_token' => '',
          ],
        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
