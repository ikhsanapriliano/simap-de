<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SpkPekerjaanModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'progress' => [
                'type' => 'INT',
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'mulai' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'selesai' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'spk_id' => [
                'type' => 'INT',
                'null'       => false
            ],
            'tracker' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->createTable('spk_pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('spk_pekerjaan');
    }
}