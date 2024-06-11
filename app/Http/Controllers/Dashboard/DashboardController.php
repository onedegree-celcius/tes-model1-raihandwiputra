<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Exception;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return view('pages.dashboard.index');
        } catch (Exception $e) {
            $response['meta']['code']    = 400;
            $response['meta']['message'] = 'error_occured';
            $response['result']          = 'Error Occured';
            return response()->json($response, $response['meta']['code']);
        }
    }
}
