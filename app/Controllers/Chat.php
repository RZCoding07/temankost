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
        $users = $db->table('chat')->select('id_kost,sender, receiver,nama,email')->distinct()->where('receiver', $userID)->join('pengguna', 'chat.sender = pengguna.id')->get()->getResultArray();
        $data = [
            'title' => 'Chat Room',
            'data' => $this->request->getGet(),
            'users' => $users,
        ];
        return view('chat', $data);
    }

    function insertChat()
    {
        $db = db_connect();
        $data = $this->request->getGet();
        $chatString = $db->table('chat')->insert($data);
        echo json_encode($chatString);
        exit();
    }

    function getChat()
    {
        $req = $this->request->getGet();
        $db = db_connect();
        $data = $db->table('chat')->where('id_kost', $req['id_kost'])->orderBy('timestamp', 'asc')->get()->getResultArray();
        return view('chatbox', ['data' => $data, 'req' => $req]);
    }
}
