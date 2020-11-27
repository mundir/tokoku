<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna_m extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Pengguna';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nama_pengguna', 'nama_pendek', 'password', 'nomor_hp', 'email', 'alamat', 'kabkota', 'kodepos', 'user_group', 'avatar', 'aktif'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
