<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SpkProdiModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true
            ],
            'prodi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true
            ],
            'pekerjaan_id' => [
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
        $this->forge->addForeignKey('pekerjaan_id', 'spk_pekerjaan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('spk_prodi');
    }

    public function down()
    {
        $this->forge->dropTable('spk_prodi');
    }
}