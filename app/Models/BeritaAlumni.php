<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAlumni extends Model
{
    use HasFactory;

    protected $table = 'berita_alumni';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
