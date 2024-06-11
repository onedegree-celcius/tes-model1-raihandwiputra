<?php

namespace App\Http\Controllers\ListKontrasepsi;

use App\Http\Controllers\Controller;
use App\Models\Public\ListKontrasepsi;
use Illuminate\Http\Request;

use Exception;

class ListKontrasepsiController extends Controller
{
    public function index()
    {
        try {
            $listKontrasepsi = ListKontrasepsi::all();

            return view('pages.list_kontrasepsi.index', ['data' => $listKontrasepsi]);
        } catch (Exception $e) {
            $response['meta']['code']    = 400;
            $response['meta']['message'] = 'error_occured';
            $response['result']          = 'Error Occured';
            return response()->json($response, $response['meta']['code']);
        }
    }
}
