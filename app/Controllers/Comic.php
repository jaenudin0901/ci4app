<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
    protected $comicModel;
    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }
    public function index()
    {
        // $comics = $this->comicModel->findAll();

        $data = [
            'title' => 'List Comics',
            'comics' => $this->comicModel->getComic()
        ];
        //  cara koenk tanpa model\
        // $db = \Config\Database::connect();
        // $comic = $db->query("SELECT * FROM comic");
        // foreach ($comic->getResultArray() as $row) {
        //     d($row);
        // }

        // $comicModel = new \App\Models\ComicModel();
        // $comicModel = new ComicModel();

        return view('comic/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Comic',
            'comic' => $this->comicModel->getComic($slug)
        ];

        return view('comic/detail', $data);
    }

    //--------------------------------------------------------------------

}
