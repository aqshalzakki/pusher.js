<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
  protected $table      = 'pegawai';
  protected $primaryKey = 'pegawai_id';

  protected $allowedFields = [
    'pegawai_name', 'pegawai_age', 'pegawai_salary'
  ];
}
