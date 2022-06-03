<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaanAlumni extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pekerjaan_alumni';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
