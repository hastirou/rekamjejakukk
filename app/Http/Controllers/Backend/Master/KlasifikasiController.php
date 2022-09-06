<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon;

class KlasifikasiController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {      
        $users = Auth::id();
        
        $masterklasifikasi = DB::table('masterklasifikasis')
                ->where('Status', 'OPN')
                ->get();

        return view('backend.master.klasifikasi.index', ['masterklasifikasi'=>$masterklasifikasi]);
        
    }

    

    public function create()
    {   
        $users = Auth::id();

        $last_id = DB::select('SELECT * FROM masterklasifikasis ORDER BY KodeKlasifikasi DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "KLA-001";
        } else {
            $string = $last_id[0]->KodeKlasifikasi;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "KLA-" . $new;
        }

        return view('backend.master.klasifikasi.create', ['newID' => $newID]);
        
    }

    

    public function store(Request $request)
    {
        $users = Auth::id();
        
        $this->validate($request, 
        [
            'KodeKlasifikasi' => 'required',
            'NamaKlasifikasi' => 'required|unique:masterklasifikasis,NamaKlasifikasi'
        ],[

            'NamaKlasifikasi.required' => 'Nama Klasifikasi Tidak Boleh Kosong!',
            'NamaKlasifikasi.unique' => 'Nama Klasifikasi Sudah Ada!'

        ]
    );

        DB::table('masterklasifikasis')->insert([
            'KodeKlasifikasi' => $request->KodeKlasifikasi,
            'NamaKlasifikasi' => $request->NamaKlasifikasi,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah klasifikasi ' . $request->KodeKlasifikasi,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Klasifikasi ' . $request->NamaKlasifikasi . ' berhasil ditambahkan';
        return redirect('/admin/klasifikasi')->with(['created' => $pesan]);
        
    }

    public function edit($id)
    {   
        $users = Auth::id();

        $klasifikasi = DB::table('masterklasifikasis')
                ->where('KodeKlasifikasi', $id)
                ->get();
        return view('backend.master.klasifikasi.edit', compact('klasifikasi'));
        
    }

    public function searchDataKLAByCustId($id)
     {
        $users = Auth::id();
        
       $kla = DB::table('masterklasifikasis')->where('KodeKlasifikasi', $id)->where('Status', 'OPN')->get();
       if ($kla != null) {
         return response()->json($kla);
       } else {
         return response()->json([]);
       }
       
     }

    public function update(Request $request)
    {

        $users = Auth::id();

        $this->validate($request, 
        [
            'KodeKlasifikasi' => 'required',
            'NamaKlasifikasi' => 'required'
        ],[

            'NamaKlasifikasi.required' => 'Nama Klasifikasi Tidak Boleh Kosong!',

        ]
    );

        DB::table('masterklasifikasis')->where('KodeKlasifikasi', $request->KodeKlasifikasi)->update([
            'NamaKlasifikasi' => $request->NamaKlasifikasi,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update klasifikasi ' . $request->KodeKlasifikasi,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Klasifikasi ' . $request->NamaKlasifikasi . ' berhasil diubah';
        return redirect('/admin/klasifikasi')->with(['edited' => $pesan]);

    }

            
            public function hapus($id)
            {

            $users = Auth::id();

            DB::table('masterklasifikasis')->where('KodeKlasifikasi',$id)->update([
            'Status' => 'DEL',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now() 

        ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus klasifikasi ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

                $pesan = 'Klasifikasi ' . $id . ' berhasil dihapus';
        return redirect('/admin/klasifikasi')->with(['deleted' => $pesan]);
            }    
}
