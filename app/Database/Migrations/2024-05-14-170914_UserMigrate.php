<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false,
            ],
            'user_level' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'user', 'pic', 'ppc', 'worker'],
                'null'       => false
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => false
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
