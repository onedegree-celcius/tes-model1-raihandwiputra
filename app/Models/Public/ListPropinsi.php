<?php

namespace App\Models\Public;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListPropinsi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table      = 'public.list_propinsi';
    protected $primaryKey = 'id_propinsi';
    protected $fillable   = [
        'nama_propinsi',
    ];

    public function pemakaiKontrasepsi()
    {
        return $this->hasMany(ListPemakaiKontrasepsi::class, 'id_propinsi', 'id_propinsi');
    }
}
