<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class RekamDataController extends Controller
{

public function index()
    {
        $user = DB::table('users')
                    ->where('users.roleid', '1')
                    ->where('users.Status', 'OPN')
                    ->get();
        return view('backend.rekamdata.index', ['user'=>$user]);
    }

public function datauser($id)
    {
        $user = DB::table('users')
                    ->where('users.id', $id)
                    ->where('users.Status', 'OPN')
                    ->get();

        $rekamdata = DB::table('rekamjejaks')
                        ->join('users', 'users.id', '=', 'rekamjejaks.KodeUser')
                        ->where('rekamjejaks.KodeUser', $id)
                        ->get();
        return view('backend.rekamdata.datauser', ['user'=>$user, 'rekamdata'=>$rekamdata]);
    }

public function hapus($authid, $id)
    {

        DB::table('rekamjejaks')->where('KodeData',$id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus Data User ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data ' . $id . ' berhasil dihapus';
        return redirect('/admin/rekamdata/datauser/'.$authid)->with(['deleted' => $pesan]);
            }

public function batalhapus($authid, $id)
    {

        DB::table('rekamjejaks')->where('KodeData',$id)->update([
            'Status' => 'OPN',
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus Data User ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data ' . $id . ' Telah Diaktifkan';
        return redirect('/admin/rekamdata/datauser/'.$authid)->with(['edited' => $pesan]);
            }
}
