<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_m extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\Kategori';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_kategori', 'group_kategori'];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
