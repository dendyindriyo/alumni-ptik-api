<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepengurusanIkaPtik extends Model
{
    use HasFactory;

    protected $table = 'kepengurusan_ika_ptik';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
