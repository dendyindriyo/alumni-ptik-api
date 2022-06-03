<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    use HasFactory;

    protected $table = 'peminatan';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
