<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\models\Fotomodel;

class Foto extends BaseController
{
    protected $pm;
    private  $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new FotoModel();
        $this->menu =[
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(). '/beranda',
                'icon'=>'fa-solid fa-house',
                'aktif'=>'',
            ],
            'Foto'=>[
                'title'=>'Foto',
                'link'=>base_url(). '/Foto',
                'icon'=>'fa-solid fa-camera',
                'aktif'=>'active',
            ],
            'video'=>[
                'title'=>'video',
                'link'=>base_url(). '/video',
                'icon'=>'fa-solid fa-video',
                'aktif'=>'',
            ],
            'alat'=>[
                'title'=>'Alat',
                'link'=>base_url(). '/alat',
                'icon'=>'fa-solid fa-tree',
                'aktif'=>'',
            ],
        ];
        $this->rules = [
            'IDfoto' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'IDfoto tidak boleh kosong',
                ]
            ],
            'Jenis_foto' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'Jenis foto tidak boleh kosong',
                ]
            ],
            'Harga' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'Harga tidak boleh kosong',
                ]
            ],
            'Fotografer' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'Fotografer tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => 'Password tidak boleh kosong',
                ]
            ],
        ];
    }

    public function index()
    {
      
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">foto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() .'">Beranda</a></li>
                            <li class="breadcrumb-item active">Foto</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "data Foto";

        $query = $this->pm->find();
        $data['data_Foto'] = $query;
        return view('Foto/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Foto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() .'">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() .'/Foto">Foto</a></li>
                            <li class="breadcrumb-item active">Tambah Foto</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'tambah Foto';
        $data['action'] = base_url() . '/Foto/simpan';
        return view('Foto/input',$data);
    }

    public function simpan()
    {
        
        if (strtolower($this->request->getMethod()) !== 'post') {
            
            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->rules)) 
        {

            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('foto')->with('success', 'Data berhasil disimpan');
        }catch (\CodeIgniter\Database\Exceptions\DatabaseExceptions $e) {
           
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan pramater tidak valid');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('Foto')->with('success', 'Data foto dengan kode '.$id.' berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseExceptions $e) {
            return redirect()->to('Foto')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Foto</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() .'">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() .'/Foto">Foto</a></li>
                            <li class="breadcrumb-item active">Edit Foto</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Foto';
        $data['action'] = base_url() . '/Foto/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('Foto/input',$data);
    }

    public function update(){
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['password']);

        if (!$this->validate($this->rules)) 
        {

            return redirect()->back()->withInput();
        }

        if(empty($dtEdit['password'])) {
            unset($dtEdit['password']);
        }

        try {
            $this->pm->update($param, $dtedit);
            return redirect()->to('Foto')->with('success', 'Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseExceptions $e) {
           session()->setFlashdata('error',$e->getMessage());
           return redirect()->back()->withInput();
        }
    }
}
