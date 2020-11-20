<?php

namespace App\Models;

use CodeIgniter\Model;

class Komentar_m extends Model
{
    protected $table      = 'komentar';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Komentar';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'id_barang', 'id_customer', 'komentar', 'expired_at'];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
