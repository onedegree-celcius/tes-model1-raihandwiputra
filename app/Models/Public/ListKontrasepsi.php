<?php

namespace App\Models\Public;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListKontrasepsi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table      = 'public.list_kontrasepsi';
    protected $primaryKey = 'id_kontrasepsi';
    protected $fillable   = [
        'nama_kontrasepsi',
    ];

    public function pemakaiKontrasepsi()
    {
        return $this->hasMany(ListPemakaiKontrasepsi::class, 'id_kontrasepsi', 'id_kontrasepsi');
    }
}
