<?php

namespace App\Http\Controllers\Backend\DataProperti;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class PropertiController extends Controller
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
        
        $properti = DB::table('datapropertis')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('datapropertis.Status', 'OPN')
                ->get();

        return view('backend.dataproperti.index', ['properti'=>$properti]);

    }

    public function create(Request $request)
    {   
        

        $klasifikasi = DB::table('masterklasifikasis')
                ->where('Status', 'OPN')
                ->get();
        $last_id = DB::select('SELECT * FROM datapropertis ORDER BY KodeProperti DESC LIMIT 1');

        //Auto generate ID
        if ($last_id == null) {
            $newID = "PROP-001";
        } else {
            $string = $last_id[0]->KodeProperti;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "PROP-" . $new;
        }

        return view('backend.dataproperti.create', [
            'newID' => $newID,
            'klasifikasi' => $klasifikasi
        ]);
        
    }
    
    public function store(Request $request)
    {   
        
        $this->validate($request,[

            'KodeKlasifikasi' => 'required',
            'KodeProperti' => 'required',
            'NamaProperti' => 'required',
            'Lokasi' => 'required',
            'LuasTanah' => 'required',
            'LuasBangunan' => 'required',
            'KamarTidur' => 'required',
            'KamarMandi' => 'required',
            'Garasi' => 'required',
            'JumlahGarasi' => 'required',
            'file' => 'required'

        ],[

            'KodeKlasifikasi.required' => 'Kode Klasifikasi Wajib Dipilih!',
            'KodeProperti.required' => 'Kode Properti Tidak Boleh Kosong!',
            'NamaProperti.required' => 'Nama Properti Tidak Boleh Kosong!',
            'Lokasi.required' => 'Lokasi Tidak Boleh Kosong!',
            'LuasTanah.required' => 'Luas Tanah Tidak Boleh Kosong!',
            'LuasBangunan.required' => 'Luas Bangunan Tidak Boleh Kosong!',
            'KamarTidur.required' => ' Kamar Tidur Tidak Boleh Kosong!',
            'KamarMandi.required' => ' Kamar Mandi Tidak Boleh Kosong!',
            'Garasi.required' => 'Keterangan Garasi Wajib Dipilih',
            'JumlahGarasi.required' => 'Jumlah Garasi Tidak Boleh Kosong!',
            'file.required' => 'Harap Isi Gambar Properti!'

        ]
    );

        $file = $request->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
        $tujuan_upload = 'data_properti';
        $file->move($tujuan_upload,$nama_file);

        DB::table('datapropertis')->insert([
            'KodeKlasifikasi' => $request->KodeKlasifikasi,
            'KodeProperti' => $request->KodeProperti,
            'NamaProperti' => $request->NamaProperti,
            'Lokasi' => $request->Lokasi,
            'LuasTanah' => $request->LuasTanah,
            'LuasBangunan' => $request->LuasBangunan,
            'KamarTidur' => $request->KamarTidur,
            'KamarMandi' => $request->KamarMandi,
            'Garasi' => $request->Garasi,
            'JumlahGarasi' => $request->JumlahGarasi,
            'File' => $nama_file,
            'Status' => 'OPN',
            'StatusLelang' => '0',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah properti ' . $request->KodeProperti,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        $pesan = 'Properti ' . $request->NamaProperti . ' berhasil ditambahkan';
        return redirect('/admin/dataproperti')->with(['created' => $pesan]);
        
    }

    public function edit($id)
    {   
        
        
        $dataproperti = DB::table('datapropertis')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('datapropertis.KodeProperti', $id)
                ->get();
        $klasifikasi = DB::table('masterklasifikasis')
                ->where('Status', 'OPN')
                ->get();
        return view('backend.dataproperti.edit', [
            'dataproperti' => $dataproperti,
            'klasifikasi' => $klasifikasi
        ]);
        
    }

    public function detail($id)
    {   
    
        $dataproperti = DB::table('datapropertis')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('datapropertis.KodeProperti', $id)
                ->get();

        return view('backend.dataproperti.detail', [
            'dataproperti' => $dataproperti,
        ]);
        
    }

    public function detailkonfirmasi($id)
    {   
        

        $dataproperti = DB::table('datapropertis')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('datapropertis.KodeProperti', $id)
                ->get();
        return view('backend.dataproperti.detailkonfirmasi', [
            'dataproperti' => $dataproperti,
        ]);
        
    }

    public function searchDataKATByCustId($id)
     {  
              

        $id = DB::table('datapropertis')
                ->where('KodeProperti', $id)
                ->get();

        if($id != null){
            return response()->json($id);
        } else {
            return response()->json([]);
        }
        
     }

    public function update(Request $request)
    {

        if($request->file != null)
        {
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = 'data_properti';
            $file->move($tujuan_upload,$nama_file);

            $ItemLama = DB::table('datapropertis')->where('KodeProperti',$request->KodeProperti)->get();
            $GambarLama = $ItemLama[0]->File;
            rename('data_properti/'.$GambarLama,'data_properti/recycle/'.$GambarLama);
            
            DB::table('datapropertis')->where('KodeProperti', $request->KodeProperti)->update([
            'KodeKlasifikasi' => $request->KodeKlasifikasi,
            'NamaProperti' => $request->NamaProperti,
            'Lokasi' => $request->Lokasi,
            'LuasTanah' => $request->LuasTanah,
            'LuasBangunan' => $request->LuasBangunan,
            'KamarTidur' => $request->KamarTidur,
            'KamarMandi' => $request->KamarMandi,
            'Garasi' => $request->Garasi,
            'JumlahGarasi' => $request->JumlahGarasi,
            'File' => $nama_file,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        } else {
            DB::table('datapropertis')->where('KodeProperti', $request->KodeProperti)->update([
            'KodeKlasifikasi' => $request->KodeKlasifikasi,
            'NamaProperti' => $request->NamaProperti,
            'Lokasi' => $request->Lokasi,
            'LuasTanah' => $request->LuasTanah,
            'LuasBangunan' => $request->LuasBangunan,
            'KamarTidur' => $request->KamarTidur,
            'KamarMandi' => $request->KamarMandi,
            'Garasi' => $request->Garasi,
            'JumlahGarasi' => $request->JumlahGarasi,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        }  

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update properti ' . $request->KodeProperti,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Properti ' . $request->NamaProperti . ' berhasil diubah';
        return redirect('/admin/dataproperti')->with(['edited' => $pesan]);
            
    }

    public function konfirmasi()
    {   
        

        $properti = DB::table('datapropertis')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('datapropertis.Status', 'CFM')
                ->get();

        return view('backend.dataproperti.konfirmasi', ['properti'=>$properti]);
        
    }

    #Proses Konfirmasi
    public function konfirm($id)
    {

        DB::table('datapropertis')->where('KodeProperti', $id)->update([
            'Status' => 'CFM',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Konfirmasi properti ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
            $pesan = 'Properti ' . $id . ' Berhasil Dikonfirmasi';
        return redirect('/admin/dataproperti/konfirmasi')->with(['edited' => $pesan]);
    }

        public function batalkonfirm($id)
    {

        DB::table('datapropertis')->where('KodeProperti', $id)->update([
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Batal konfirmasi properti ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Properti ' . $id . ' Telah Dibatalkan';
        return redirect('/admin/dataproperti')->with(['edited' => $pesan]);
    }

    public function hapus($id)
    {

        $ItemLama = DB::table('datapropertis')->where('KodeProperti',$id)->get();
        $GambarLama = $ItemLama[0]->File;
        rename('data_properti/'.$GambarLama,'data_properti/recycle/'.$GambarLama);

        DB::table('datapropertis')->where('KodeProperti',$id)->update([
            'Status' => 'DEL',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now() 

                ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus Properti ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Properti ' . $id . ' berhasil dihapus';
        return redirect('/admin/dataproperti')->with(['deleted' => $pesan]);
            }
}