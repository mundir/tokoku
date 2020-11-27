<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_group_m extends Model
{
    protected $table      = 'kategori_group';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Kategori_group';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nama_group', 'admin'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
