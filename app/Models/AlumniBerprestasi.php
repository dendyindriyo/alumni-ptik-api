<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniBerprestasi extends Model
{
    use HasFactory;

    protected $table = 'alumni_berprestasi';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
