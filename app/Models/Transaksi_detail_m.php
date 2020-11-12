<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_detail_m extends Model
{
    protected $table      = 'transaksi_detail';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Transaksi_detail';
    // 'id_transaksi','id_barang','harga','qty'
    protected $allowedFields = ['id_transaksi', 'id_barang', 'harga', 'qty'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
