<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => 1,
            'nip' => null,
            'nama' => 'admin',
            'user_level' => 'admin',
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'email' => null,
            'no_telepon' => null,
            'created_at' => Time::now(),
            'updated_at' => Time::now()
        ];

        $this->db->table('user')->insert($data);
    }
}