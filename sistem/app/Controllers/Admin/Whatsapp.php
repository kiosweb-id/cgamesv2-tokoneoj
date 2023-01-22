<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Whatsapp extends BaseController
{
    public function index()
    {
        $data = [
                    'title' => 'Whatsapp Template',
                    'whatsapp' => $this->MWa->findAll()
                ];
        $data = array_merge($this->base_data, $data);
        return view('Admin/Whatsapp/index', $data);
    }
}
