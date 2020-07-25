<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // $faker = \Faker\Factory::create();
        // dd($faker->name);
        $data = [
            'title' => 'Home | Pandai Ngoding'
        ];

        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [

                    'tipe' => 'Rumah',
                    'alamat' => 'Jl taman patra V',
                    'kota' => 'Jakarta Selatan'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. I gede anak agung ',
                    'kota' => 'Jakarta selatan'
                ]

            ]
        ];

        return view('pages/contact', $data);
    }


    //--------------------------------------------------------------------

}
