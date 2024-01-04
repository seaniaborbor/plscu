<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
    "sender",
    "receiver",
    "body",
    "subject"
];

public function userMessages($rfc){
    $query = $this->db->table('messages')
            ->select('messages.*, users.username, users.profile')
            ->where('messages.receiver', $rfc)
            ->join('users', 'users.rfc = messages.sender')
            ->groupBy('messages.sender')
            ->orderBy('messages.sendDate','desc')
            ->get()
            ->getResult();
    return $query;
}

public function messageThread($rfc, $sender_rfc){
    $query = $this->db->table('messages')
            ->select('messages.*, users.username, users.profile')
            ->where('messages.receiver', $rfc)
            ->orWhere('messages.sender', $rfc)
            ->where('messages.sender', $sender_rfc)
            ->orWhere('messages.sender', $rfc)
            ->join('users', 'users.rfc = messages.sender')
            ->get()
            ->getResult();
    return $query;
}
  
}