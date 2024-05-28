<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SpkLampiranModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'lampiran' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'spk_id' => [
                'type' => 'INT',
                'null'       => false
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
        $this->forge->addForeignKey('spk_id', 'spk', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('spk_lampiran');
    }

    public function down()
    {
        $this->forge->dropTable('spk_lampiran');
    }
}