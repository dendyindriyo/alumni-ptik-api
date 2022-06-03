<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    // /**
    //  * The primary key associated with the table.
    //  *
    //  * @var string
    //  */
    protected $primaryKey = 'nim';

    // /**
    //  * Indicates if the model's ID is auto-incrementing.
    //  *
    //  * @var bool
    //  */
    public $incrementing = false;

    // protected $keyType = 'integer';

    protected $guarded = [];

    public function riwayatPekerjaanAlumnis()
    {
        return $this->hasMany(RiwayatPekerjaanAlumni::class, 'nim');
    }
}
