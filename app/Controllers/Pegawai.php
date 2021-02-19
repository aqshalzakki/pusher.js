<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\API\ResponseTrait;
use \Pusher\Pusher;

class Pegawai extends BaseController
{
  use ResponseTrait;
  
  public PegawaiModel $pegawai;

  public function __construct() {
    $this->pegawai = new PegawaiModel;
  }
	public function index()
	{
    $data = [
      'title' => 'Pegawai',
      'pegawai' => $this->pegawai->findAll()
    ];
		return view('dashboard/index', $data);
  }
  
	public function create()
	{
    $pusher = new Pusher(
      env('pusher.auth_key'),
      env('pusher.secret'),
      env('pusher.app_id'),
      [
        'cluster' => 'ap1',
        'useTLS' => true
      ]
    );
    $data = $this->request->getPost();

    $this->pegawai->save($data);
    
    $pusher->trigger('pegawai-channel', 'new-pegawai', $data); 
	}
}
