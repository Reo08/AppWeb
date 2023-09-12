<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfsModulos extends Model
{
    use HasFactory;
    protected $table = "pdfs_modulos";
    protected $primaryKey = "id_pdf";
    protected $guarded = [];
}
