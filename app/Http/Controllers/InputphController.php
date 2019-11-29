<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InputphController extends Controller
{
    public function index()
    {
    	$data = DB::table('RECORD_HISTORY')->paginate(10);

    	return view('data',['data' => $data]);
    }

    public function input()
    {
    	return view('input');

    }

    public function store(Request $request)
    {	

    	$date = date('Y-m-d H:i:s');
    	$ph = (float) $request->ph;

    	// $ID_Record = 2;
    	if ($ph >= 1 && $ph <= 3 ) {
    		$ID_Larutan = 1;
    		$Nama_Larutan = "air asam kuat";

    	}

    	if ($ph >= 4 && $ph <= 6 ) {
    		$ID_Larutan = 2;
    		$Nama_Larutan = "air asam lemah";

    	}

    	if ($ph == 7) {
    		$ID_Larutan = 3;
    		$Nama_Larutan = "air netral";

    	}

    	if ($ph >= 8 && $ph <= 10 ) {
    		$ID_Larutan = 4;
    		$Nama_Larutan = "air basa lemah";

    	}

    	if ($ph >= 11 && $ph <= 14 ) {
    		$ID_Larutan = 5;
    		$Nama_Larutan = "air basa kuat";

    	}

    	DB::table('RECORD_HISTORY')->insert([
    		'ID_Larutan' => $ID_Larutan,
    		'Nama_Larutan' => $Nama_Larutan,
    		'PH' => $request->ph,
    		'Tanggal' => $date
    	]);
    	return redirect('/data');
    	
    	
    }
}