<?php

namespace App\Admin\Controllers\Pendukung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wilayah\Kabupaten;
use Illuminate\Support\Facades\DB;

class ApiWilayahController extends Controller
{

    public function kabupaten_select(Request $request)
    {
        $provinceId  = $request->get('q');
        return Kabupaten::where('provinsi_id', $provinceId)->get(['id', DB::raw('name as text')]);
    }
}