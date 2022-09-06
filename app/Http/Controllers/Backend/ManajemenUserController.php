<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ManajemenUserController extends Controller
{

public function index()
    {
        $user = DB::table('users')
                    ->where('users.roleid', '1')
                    ->where('users.Status', 'OPN')
                    ->get();
        return view('backend.manajemenuser.index', compact('user'));
    }

public function backendindex()
    {
        $user = DB::table('users')
                    ->where('users.roleid', '2')
                    ->where('users.Status', 'OPN')
                    ->get();
        return view('backend.manajemenuser.backendindex', compact('user'));
    }

public function edit($id)
    {   
               
        $user = DB::table('users')
                    ->where('users.id', $id)
                    ->get();
        return view('backend.manajemenuser.edit', compact('user'));        
    }


public function update(Request $request)
    {

        DB::table('users')->where('id', $request->id)->update([
            'Username' => $request->Username,
            'fullname' => $request->fullname,
            'nik' => $request->nik,
            'roleid' => $request->roleid,
            'Status' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Ubah data ' . $request->id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data User Id ' . $request->id . ' berhasil diubah';
        return redirect('/admin/manajemenuser')->with(['edited' => $pesan]);

    }

    public function hapus($id)
    {

        DB::table('users')->where('id',$id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus User ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'User Id ' . $id . ' berhasil dihapus';
        return redirect('/admin/manajemenuser')->with(['deleted' => $pesan]);
            }

public function editbackend($id)
    {   
               
        $user = DB::table('users')
                    ->where('users.id', $id)
                    ->get();
        return view('backend.manajemenuser.editbackend', compact('user'));        
    }

    public function updatebackend(Request $request)
    {

        DB::table('users')->where('id', $request->id)->update([
            'Username' => $request->Username,
            'fullname' => $request->fullname,
            'nik' => $request->nik,
            'roleid' => $request->roleid,
            'Status' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()

        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Ubah data ' . $request->id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Data User Id ' . $request->id . ' berhasil diubah';
        return redirect('/admin/userbackend')->with(['edited' => $pesan]);

    }

    public function hapusbackend($id)
    {

        DB::table('users')->where('id',$id)->update([
            'Status' => 'DEL',
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus User ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'User Id ' . $id . ' berhasil dihapus';
        return redirect('/admin/userbackend')->with(['deleted' => $pesan]);
            }
}
