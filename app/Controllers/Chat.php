<?php

namespace App\Controllers;

use App\Models\KostModel;
use App\Models\PenggunaModel;

class Chat extends BaseController
{

    public function index()
    {
        return view('user/chat');
    }

    function insertChat()
    {

        $db = db_connect();
        $db->table('chat')->insert([
            'sender' => $this->request->getPost('sender'),
            'receiver' => $this->request->getPost('receiver'),
            'message' => $this->request->getPost('message'),
            'timestamp' => $this->request->getPost('timestamp'),
            'status' => $this->request->getPost('status'),
        ]);
    }
}
