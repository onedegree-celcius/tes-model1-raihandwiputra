<?php

namespace App\Exports;

use App\Models\Public\ListKontrasepsi;
use App\Models\Public\ListPropinsi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ListPemakaiKontrasepsiExport implements FromView
{
    public function view(): View
    {
        $listPropinsi = ListPropinsi::get()->map(function ($item) {
            $result = [
                'nama_propinsi'    => $item->nama_propinsi,
                'alat_kontrasepsi' => ListKontrasepsi::orderBy('id_kontrasepsi', 'ASC')
                ->get()->map(function ($item2) use ($item) {
                    return [
                        'nama_kontrasepsi' => $item2->nama_kontrasepsi,
                        'total'            => $item2->pemakaiKontrasepsi()->where('id_propinsi', $item->id_propinsi)->sum('jumlah_pemakai'),
                    ];
                }),
                'total' => $item->pemakaiKontrasepsi()->sum('jumlah_pemakai'),
            ];

            return $result;
        });

        $listKontrasepsi = ListKontrasepsi::orderBy('id_kontrasepsi', 'ASC')
        ->get()->map(function ($item) {
            return [
                'nama_kontrasepsi' => $item->nama_kontrasepsi,
                'total'            => $item->pemakaiKontrasepsi()->sum('jumlah_pemakai'),
            ];
        });

        return view('exports.listpemakaikontrasepsi', [
            'listPropinsi'    => $listPropinsi,
            'listKontrasepsi' => $listKontrasepsi,
        ]);
    }
}
