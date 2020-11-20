<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_m extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Barang';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'id_kategori', 'nama_barang', 'id_admin', 'id_suplier', 'harga_beli', 'harga', 'promoted', 'stok', 'terjual', 'gambar', 'deskripsi', 'aktif'];

    protected $useTimestamps = true;

    protected $validationRules    = [
        'nama_barang' => 'required',
        'harga_beli' => 'required|numeric',
        'harga' => 'required|numeric',
        'stok' => 'numeric',
        'terjual' => 'numeric',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
