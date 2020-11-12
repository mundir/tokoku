<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_m extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Barang';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_kategori', 'nama_barang', 'harga', 'stok', 'gambar', 'deskripsi'];

    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
