<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    public function alumnis()
    {
        return $this->hasMany(Alumni::class, 'id_provinsi');
    }
}
