<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SpkModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'no_registrasi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'keluar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'terima' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'pemesan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'deadline' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'pic' => [
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
        $this->forge->createTable('spk');
    }

    public function down()
    {
        $this->forge->dropTable('spk');
    }
}