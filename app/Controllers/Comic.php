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

        // jika komi tidak ada label
        if (empty($data['comic'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(' Title comic ' .  $slug . ' not found...');
        }
        return view('comic/detail', $data);
    }

    // create
    public function create()
    {
        session();
        $data = [
            'title' => 'Form Add Data',
            'validation' => \Config\Services::validation()
        ];
        return view('comic/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            // 'judul' => 'required|is_unique[comic.title]'
            'title' => [
                'rules' => 'required|is_unique[comic.title]',
                'errors' => [
                    'required' => '{field} Komik Harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return  redirect()->to('/comic/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'Data success added!');
        return redirect()->to('/comic');
    }

    public function delete($id)
    {
        $this->comicModel->delete($id);
        session()->setFlashdata('message', 'Data deleted!');
        return redirect()->to('/comic');
    }

    public function edit($slug)
    {
        session();
        $data = [
            'title' => 'Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'comic' => $this->comicModel->getComic($slug)
        ];
        return view('comic/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $comicLast = $this->comicModel->getComic($this->request->getVar('slug'));
        if ($comicLast['title'] == $this->request->getVar('title')) {
            $rule_title = 'required';
        } else {
            $rule_title = 'required|is_unique[comic.title]';
        }
        // validasi update
        if (!$this->validate([
            // 'judul' => 'required|is_unique[comic.title]'
            'title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} Komik Harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return  redirect()->to('/comic/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->comicModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $this->request->getVar('cover'),
        ]);

        session()->setFlashdata('message', 'Data updated!');
        return redirect()->to('/comic');
    }
    //--------------------------------------------------------------------

}
