<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Video extends BaseController
{
    public function index()
    {
        $menu =[
            'beranda'=>[
                'title'=>'Beranda',
                'link'=>base_url(). '/beranda',
                'icon'=>'fa-solid fa-house',
                'aktif'=>'',
            ],
            'foto'=>[
                'title'=>'foto',
                'link'=>base_url(). '/foto',
                'icon'=>'fa-solid fa-camera',
                'aktif'=>'',
            ],
            'video'=>[
                'title'=>'video',
                'link'=>base_url(). '/video',
                'icon'=>'fa-solid fa-video',
                'aktif'=>'active',
            ],
            'alat'=>[
                'title'=>'Alat',
                'link'=>base_url(). '/alat',
                'icon'=>'fa-solid fa-tree',
                'aktif'=>'',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Video</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() .'">Beranda</a></li>
                            <li class="breadcrumb-item active">Video</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        return view('Video/content', $data);
    }
}
