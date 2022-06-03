<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunMasuk extends Model
{
    use HasFactory;

    protected $table = 'tahun_masuk';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
