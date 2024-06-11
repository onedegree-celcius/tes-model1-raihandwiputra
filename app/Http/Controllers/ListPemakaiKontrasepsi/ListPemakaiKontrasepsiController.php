<?php

namespace App\Http\Controllers\ListPemakaiKontrasepsi;

use App\Exports\ListPemakaiKontrasepsiExport;
use App\Http\Controllers\Controller;
use App\Models\Public\ListKontrasepsi;
use App\Models\Public\ListPemakaiKontrasepsi;
use App\Models\Public\ListPropinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

use Exception;

class ListPemakaiKontrasepsiController extends Controller
{
    public function index()
    {
        try {
            $listPemakaiKontrasepsi = ListPemakaiKontrasepsi::with(['propinsi', 'kontrasepsi'])->get();

            return view('pages.list-pemakai-kontrasepsi.index', ['data' => $listPemakaiKontrasepsi]);
        } catch (Exception $e) {
            $response['meta']['code']    = 400;
            $response['meta']['message'] = 'error_occured';
            $response['result']          = 'Error Occured';
            return response()->json($response, $response['meta']['code']);
        }
    }

    public function create()
    {
        try {
            $listPropinsi    = ListPropinsi::select('id_propinsi AS value', 'nama_propinsi AS label')->get();
            $listKontrasepsi = ListKontrasepsi::select('id_kontrasepsi AS value', 'nama_kontrasepsi AS label')->get();

            $data = [
                'listPropinsi'    => $listPropinsi,
                'listKontrasepsi' => $listKontrasepsi,
            ];

            return view('pages.list-pemakai-kontrasepsi.create', $data);
        } catch (Exception $e) {
            $response['meta']['code']    = 400;
            $response['meta']['message'] = 'error_occured';
            $response['result']          = 'Error Occured';
            return response()->json($response, $response['meta']['code']);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'propinsi'       => 'required|exists:list_propinsi,id_propinsi',
                'kontrasepsi'    => 'required|exists:list_kontrasepsi,id_kontrasepsi',
                'jumlah_pemakai' => 'required|integer|min:0',
            ], [
                'propinsi.required'       => 'Propinsi is required.',
                'propinsi.exists'         => 'Propinsi is required.',
                'kontrasepsi.required'    => 'Kontrasepsi is required.',
                'kontrasepsi.exists'      => 'Kontrasepsi is required.',
                'jumlah_pemakai.required' => 'Jumlah pemakai is required.',
                'jumlah_pemakai.integer'  => 'Invalid jumlah pemakai format.',
                'jumlah_pemakai.min'      => 'Minimum jumlah pemakai is 1.',
            ]);

            if ($validator->fails()) {
                DB::rollBack();
                return redirect()->route('listpemakaikontrasepsi.create')->withErrors($validator)->withInput();
            } else {
                $check = ListPemakaiKontrasepsi::where('id_propinsi', $request->propinsi)
                ->where('id_kontrasepsi', $request->kontrasepsi)
                ->first();

                if (!$check) {
                    $store = ListPemakaiKontrasepsi::create([
                        'id_propinsi'    => $request->propinsi,
                        'id_kontrasepsi' => $request->kontrasepsi,
                        'jumlah_pemakai' => $request->jumlah_pemakai,
                    ]);
                } else {
                    return redirect()->route('listpemakaikontrasepsi.create')->withErrors(['already exists'])->withInput();
                }

                DB::commit();
                return redirect()->route('listpemakaikontrasepsi.index');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function export()
    {
        return Excel::download(new ListPemakaiKontrasepsiExport, 'list.xlsx');
    }
}
