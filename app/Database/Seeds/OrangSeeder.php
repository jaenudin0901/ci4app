<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama' => 'Jaenudin',
        //         'alamat'    => 'Kp. Duku Rt 09/05',
        //         'created_at' => Time::now(),
        //         'update_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Myesa',
        //         'alamat'    => 'Kp. Duku Rt 09/05',
        //         'created_at' => Time::now(),
        //         'update_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Dwi nuryati',
        //         'alamat'    => 'Kp. Duku Rt 09/05',
        //         'created_at' => Time::now(),
        //         'update_at' => Time::now()
        //     ]
        // ];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            # code...
            $data =  [
                'nama' => $faker->name,
                'alamat'    => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'update_at' => Time::now()
            ];
            $this->db->table('orang')->insert($data);
        }
        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO orang (nama, alamat,created_at,update_at) VALUES(:nama:, :alamat:,:created_at:,:update_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('orang')->insertBatch($data);
    }
}
