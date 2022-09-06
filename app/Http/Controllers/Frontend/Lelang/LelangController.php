<?php

namespace App\Http\Controllers\Frontend\Lelang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class LelangController extends Controller
{
    
    public function index($id)
    {   

        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.KodeLelang', $id)
                ->get();
        
        return view('frontend.lelang.index', ['lelang'=>$lelang]);
    }

    public function detail($id)
    {   
    
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.KodeLelang', $id)
                ->get();

        return view('frontend.lelang.detail', [
            'lelang' => $lelang,
        ]);
        
    }

    public function belumdimulai($id)
    {   
    
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.KodeLelang', $id)
                ->get();

        return view('frontend.lelang.belumdimulai', [
            'lelang' => $lelang,
        ]);
        
    }

    public function searchDataKATByCustId($id)
     {  
              
        $id = DB::table('lelangs')
                ->where('KodeLelang', $id)
                ->get();

        if($id != null){
            return response()->json($id);
        } else {
            return response()->json([]);
        }
        
    }

    public function searchbid($id)
    {
        $id = DB::table('bids')
                ->where('KodeLelang', $id)
                ->where('Status', 'OPN')
                ->get();

        if($id != null){
            return response()->json($id);
        } else {
            return response()->json([]);
        }
    }
}