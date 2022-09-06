<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use File;
use Datatables;

class RekamJejakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
public function index()
    {
        return view('frontend.rekamjejak.index'); 
    }

public function store(Request $request)
    {   
        $last_id = DB::select('SELECT * FROM rekamjejaks ORDER BY KodeData DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "DAT-001";
        } else {
            $string = $last_id[0]->KodeData;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "DAT-" . $new;
        }

        DB::table('rekamjejaks')->insert([
            'KodeData' => $newID,
            'Tanggal' => $request->Tanggal,
            'SuhuTubuh' => $request->SuhuTubuh,
            'Waktu' => $request->Waktu,
            'Lokasi' => $request->Lokasi,
            'NamaTempat' => $request->NamaTempat,
            'JenisTempat' => $request->JenisTempat,
            'Status' => 'OPN',
            'KodeUser' => Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $pesan = 'Data ' . $newID . ' berhasil ditambahkan';
        return redirect('/rekamjejak/semuadata')->with(['created' => $pesan]); 
    }

    public function semuadata()
    {
        $rekamjejak = DB::table('rekamjejaks')
                    ->where('rekamjejaks.Status', 'OPN')
                    ->where('KodeUser', Auth::id())
                    ->get();
        return view('frontend.rekamjejak.semuadata', compact('rekamjejak'));
    }

    public function hapus($id)
    {

        DB::table('rekamjejaks')->where('KodeData',$id)->update([
            'Status' => 'DEL',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus Data ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data ' . $id . ' berhasil dihapus';
        return redirect('/rekamjejak/semuadata')->with(['deleted' => $pesan]);
            }

    public function edit($id)
    {   
               
        $rekamjejak = DB::table('rekamjejaks')
                    ->where('rekamjejaks.Status', 'OPN')
                    ->where('KodeUser', Auth::id())
                    ->get();
        return view('frontend.rekamjejak.edit', compact('rekamjejak'));        
    }

    public function update(Request $request)
    {

        DB::table('rekamjejaks')->where('KodeData', $request->KodeData)->update([
            'Tanggal' => $request->Tanggal,
            'SuhuTubuh' => $request->SuhuTubuh,
            'Waktu' => $request->Waktu,
            'Lokasi' => $request->Lokasi,
            'NamaTempat' => $request->NamaTempat,
            'JenisTempat' => $request->JenisTempat,
            'Status' => 'OPN',
            'KodeUser' => Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update data ' . $request->KodeLelang,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        
        $pesan = 'Data ' . $request->KodeData . ' berhasil diubah';
        return redirect('/rekamjejak/semuadata')->with(['edited' => $pesan]);

    }
}
