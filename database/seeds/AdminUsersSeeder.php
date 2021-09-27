<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUsersSeeder extends Seeder
{
    public $admins = [
        [
            'email' => 'serhii.kuznietsov2@gmail.com',
            'name' => 'Sergei Kuznetsov'
        ],
        [
            'email' => 'martin.henk@gmail.com',
            'name' => 'Martin Henk'
        ],
        [
            'email' => 'artem.lucky@gmail.com',
            'name' => 'Artem'
        ],
        [
            'email' => 'edgar.aronov@gmail.com',
            'name' => 'Edgar Aronov'
        ],
    ];

    public $password = '123456';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->admins as $admin) {
            $user = User::updateOrCreate(
                [
                'email' => $admin['email']],
                [
                'name' => $admin['name'],
                'password' => Hash::make($this->password)
            ]);

            $user->assignRole('super-admin');
        }

    }
}
