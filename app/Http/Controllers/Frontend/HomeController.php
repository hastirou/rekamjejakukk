<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->select('lelangs.KodeLelang', 'lelangs.Status', 'datapropertis.File', 'datapropertis.KamarTidur', 'datapropertis.KamarMandi', 'datapropertis.JumlahGarasi', 'datapropertis.NamaProperti', 'lelangs.OpenBid', 'datapropertis.Lokasi', 'datapropertis.LuasTanah', 'lelangs.TanggalSelesai', 'lelangs.TanggalMulai')
                ->get();
        return view('frontend.index', ['lelang'=>$lelang]);
    }

    public function semualelang()
    {
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->select('lelangs.KodeLelang', 'lelangs.Status', 'datapropertis.File', 'datapropertis.KamarTidur', 'datapropertis.KamarMandi', 'datapropertis.JumlahGarasi', 'datapropertis.NamaProperti', 'lelangs.OpenBid', 'datapropertis.Lokasi', 'datapropertis.LuasTanah', 'lelangs.TanggalSelesai', 'lelangs.TanggalMulai')
                ->get();
        return view('frontend.semualelang', ['lelang'=>$lelang]);
    }
}
