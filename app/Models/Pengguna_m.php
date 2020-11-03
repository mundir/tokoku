<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna_m extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\pengguna';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'password', 'nomor_hp', 'email', 'nama_pengguna', 'user_group', 'avatar'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function cari($where)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pengguna');
        return $builder->getWhere($where);
    }
}
