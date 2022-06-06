<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanAlumni extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_alumni';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
