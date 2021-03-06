<?php

namespace App\Models;

use CodeIgniter\Model;

class Keranjang_m extends Model
{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Keranjang';
    // protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'id_customer', 'id_barang', 'qty'];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
