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
        // $chatData = [
        //     'sender' => $this->request->getPost('sender'),
        //     'receiver' => $this->request->getPost('receiver'),
        //     'message' => $this->request->getPost('message'),
        //     'timestamp' => $this->request->getPost('timestamp'),
        //     'status' => $this->request->getPost('status'),
        // ];
        $chatData = json_decode(array_values(array_flip($this->request->getRawInput()))[0]);
        $db->table('chat')->insert((array) $chatData);
        $chatString = json_encode($chatData);
        echo json_encode($chatString);
        exit();
        // $db->table('chat')->insert(['chat_data' => $chatString]);
    }
}
