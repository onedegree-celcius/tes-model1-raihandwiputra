<?php

namespace App\Models\Public;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPemakaiKontrasepsi extends Model
{
    use HasFactory;

    protected $table      = 'public.list_pemakai_kontrasepsi';
    protected $primaryKey = 'id_list';
    protected $fillable   = [
        'id_propinsi',
        'id_kontrasepsi',
        'jumlah_pemakai',
    ];

    public function propinsi()
    {
        return $this->belongsTo(ListPropinsi::class, 'id_propinsi', 'id_propinsi');
    }

    public function kontrasepsi()
    {
        return $this->belongsTo(ListKontrasepsi::class, 'id_kontrasepsi', 'id_kontrasepsi');
    }
}
