<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_m extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Transaksi';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id', 'id_pembeli', 'harga_barang',
        'diskon', 'biaya_pengiriman', 'total_harga',
        'keterangan', 'cara_bayar', 'cara_kirim', 'status_bayar', 'status_proses', 'expired_at'
    ];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
