<?php

namespace App\Models;

use CodeIgniter\Model;

class Cara_bayar_m extends Model
{
    protected $table      = 'cara_bayar';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Cara_bayar';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_cara', 'keterangan', 'status'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
