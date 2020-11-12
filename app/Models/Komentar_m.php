<?php

namespace App\Models;

use CodeIgniter\Model;

class Komentar_m extends Model
{
    protected $table      = 'komentar';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\komentar';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_barang', 'id_customer', 'komentar'];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
