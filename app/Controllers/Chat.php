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
        foreach ($users as $key => $value) {
           $nama_kost = $Kost->find($value['id_kost']);
           $users[$key]['nama_kost'] = $nama_kost['nama'];
        }
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
        // var_dump($req);
        // die();
        $data = $db->table('chat')
            ->where('id_kost', $req['id_kost'])
            ->where('sender', $req['sender'])
            ->where('receiver', $req['receiver'])
            ->orWhere('id_kost', $req['id_kost'])
            ->where('sender', $req['receiver'])
            ->where('receiver', $req['sender'])
            ->orderBy('timestamp', 'asc')
            ->get()
            ->getResultArray();
        return view('chatbox', ['data' => $data, 'req' => $req]);
    }

    function getchatuser()
    {
        $req = $this->request->getGet();
        $db = db_connect();
        // var_dump($req);
        // die();
        $data = $db->table('chat')
            ->where('id_kost', $req['id_kost'])
            ->where('sender', $req['sender'])
            ->where('receiver', $req['receiver'])
            ->orWhere('id_kost', $req['id_kost'])
            ->where('sender', $req['receiver'])
            ->where('receiver', $req['sender'])
            ->orderBy('timestamp', 'asc')
            ->get()
            ->getResultArray();
        return view('chatboxuser', ['data' => $data, 'req' => $req]);
    }
}
