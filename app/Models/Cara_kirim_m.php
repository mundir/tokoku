<?php

namespace App\Models;

use CodeIgniter\Model;

class Cara_kirim_m extends Model
{
    protected $table      = 'cara_kirim';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Cara_kirim';

    protected $allowedFields = ['nama_kirim', 'keterangan', 'status'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
