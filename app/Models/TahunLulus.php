<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunLulus extends Model
{
    use HasFactory;

    protected $table = 'tahun_lulus';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
