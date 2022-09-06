<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class TentangAkunController extends Controller
{

public function tentangakun()
    {
        $user = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();
        return view('backend.tentangakun', compact('user'));
    }

public function editprofil()
    {
        $user = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();
        return view('backend.editprofil', compact('user'));
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
        return redirect('/admin/tentangakun')->with(['edited' => $pesan]);

    }
}