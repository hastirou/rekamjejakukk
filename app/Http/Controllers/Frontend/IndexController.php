<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class IndexController extends Controller
{

public function index()
    {
        return view('frontend.index');
    }
    
public function tentangakun()
    {
        $user = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();
        return view('frontend.tentangakun', compact('user'));
    }

public function editprofil()
    {
        $user = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();
        return view('frontend.editprofil', compact('user'));
    }

public function update(Request $request)
    {

        DB::table('users')->where('id', $request->id)->update([
            'Username' => $request->Username,
            'fullname' => $request->fullname,
            'nik' => $request->nik,
            'Status' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Ubah Data User ' . $request->id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data User ' . $request->id . ' berhasil diubah';
        return redirect('/tentangakun')->with(['edited' => $pesan]);

    }
}
