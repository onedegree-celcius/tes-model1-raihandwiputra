<?php

namespace App\Http\Controllers\ListPropinsi;

use App\Http\Controllers\Controller;
use App\Models\Public\ListPropinsi;
use Illuminate\Http\Request;

use Exception;

class ListPropinsiController extends Controller
{
    public function index()
    {
        try {
            $listPropinsi = ListPropinsi::all();

            return view('pages.list_propinsi.index', ['data' => $listPropinsi]);
        } catch (Exception $e) {
            $response['meta']['code']    = 400;
            $response['meta']['message'] = 'error_occured';
            $response['result']          = 'Error Occured';
            return response()->json($response, $response['meta']['code']);
        }
    }
}
