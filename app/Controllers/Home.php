<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu =[
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(). '/beranda',
                'icon'=>'fa-solid fa-house',
                'aktif'=>'active',
            ],
            'Foto'=>[
                'title'=>'Foto',
                'link'=>base_url(). '/Foto',
                'icon'=>'fa-solid fa-camera',
                'aktif'=>'',
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

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Welcome To Potograpy";
        $data['selamat_datang'] = "Selamat datang di aplikasi POTOGRAPY";
        return view('template/content', $data);
    }
}
