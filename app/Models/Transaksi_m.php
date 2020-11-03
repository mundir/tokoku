<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_m extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\transaksi';
    protected $useSoftDeletes = false;
    // 'id_pembeli','total_harga','cara_bayar','cara_kirim','status_kirim','created_at','update_at'
    protected $allowedFields = ['id_pembeli', 'total_harga', 'keterangan', 'cara_bayar', 'cara_kirim', 'status_kirim'];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
