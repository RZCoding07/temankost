<?php

namespace App\Controllers;

use App\Models\KostModel;
use App\Models\PenggunaModel;

class Chat extends BaseController
{

    public function index()
    {
        $Kost = new KostModel();
        $Pemilik = new PenggunaModel();
        $db = db_connect();
        $userID = session()->get('id');
        $chatlist =  $db->table('chat')->where('receiver', $userID)->distinct('sender')->get()->getResultArray();
        $data = [
            'title' => 'Chat Room',
            'data' => $this->request->getGet(),
            'chatlist' => $chatlist,
        ];
        return view('chat', $data);
    }

    function insertChat()
    {
        $db = db_connect();
        $chatData = json_decode(array_values(array_flip($this->request->getRawInput()))[0]);
        $db->table('chat')->insert((array) $chatData);
        $chatString = json_encode($chatData);
        echo json_encode($chatString);
        exit();
    }
}
