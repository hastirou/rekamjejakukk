<?php

namespace App\Http\Controllers\Backend\Lelang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class LelangController extends Controller
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
    
    public function dalamantrian()
    {   
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.Status', 'OPN')
                ->get();
        
        return view('backend.lelang.dalamantrian', ['lelang'=>$lelang]);
        
    }

    public function aturjadwal($id)
    {   
        
        $dataproperti = DB::table('datapropertis')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('KodeProperti', $id)
                ->get();
        $klasifikasi = DB::table('masterklasifikasis')
                ->where('Status', 'OPN')
                ->get();
        $last_id = DB::select('SELECT * FROM lelangs ORDER BY KodeLelang DESC LIMIT 1');
        //Auto generate ID
        if ($last_id == null) {
            $newID = "LEL-001";
        } else {
            $string = $last_id[0]->KodeLelang;
            $id = substr($string, -3, 3);
            $new = $id + 1;
            $new = str_pad($new, 3, '0', STR_PAD_LEFT);
            $newID = "LEL-" . $new;
        }
        return view('backend.lelang.aturjadwal', [
            'newID' => $newID,
            'dataproperti' => $dataproperti,
            'klasifikasi' => $klasifikasi
        ]);        
    }

    public function store(Request $request)
    {   

        DB::table('lelangs')->insert([
            'KodeLelang' => $request->KodeLelang,
            'KodeProperti' => $request->KodeProperti,
            'TanggalMulai' => $request->TanggalMulai.' '.$request->JamMulai,
            'TanggalSelesai' => $request->TanggalSelesai.' '.$request->JamSelesai,
            'OpenBid' => $request->OpenBid,
            'BuyItNow' => $request->BuyItNow,
            'Kelipatan1' => $request->Kelipatan1,
            'Kelipatan2' => $request->Kelipatan2,
            'Kelipatan3' => $request->Kelipatan3,
            'Kelipatan4' => $request->Kelipatan4,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('datapropertis')->where('KodeProperti', $request->KodeProperti)->update([
            'StatusLelang' => '1',
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Tambah lelang ' . $request->KodeLelang,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);


        $pesan = 'Jadwal Lelang ' . $request->NamaProperti . ' berhasil ditambahkan';
        return redirect('/admin/lelang/dalamantrian')->with(['created' => $pesan]);
        
    }

        public function detail($id)
    {   
    
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.KodeLelang', $id)
                ->get();

        return view('backend.lelang.detail', [
            'lelang' => $lelang,
        ]);
        
    }

    public function edit($id)
    {   
               
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.KodeLelang', $id)
                ->get();

        return view('backend.lelang.edit', [
            'lelang' => $lelang,
        ]);
        
    }

    public function update(Request $request)
    {

        DB::table('lelangs')->where('KodeLelang', $request->KodeLelang)->update([
            'TanggalMulai' => $request->TanggalMulai.' '.$request->JamMulai,
            'TanggalSelesai' => $request->TanggalSelesai.' '.$request->JamSelesai,
            'OpenBid' => $request->OpenBid,
            'BuyItNow' => $request->BuyItNow,
            'Kelipatan1' => $request->Kelipatan1,
            'Kelipatan2' => $request->Kelipatan2,
            'Kelipatan3' => $request->Kelipatan3,
            'Kelipatan4' => $request->Kelipatan4,
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Update lelang ' . $request->KodeLelang,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Jadwal Lelang ' . $request->KodeLelang . ' berhasil diubah';
        return redirect('/admin/lelang/dalamantrian')->with(['edited' => $pesan]);

    }

    public function hapus($id)
    {

        DB::table('lelangs')->where('KodeLelang',$id)->update([
            'Status' => 'DEL',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now() 
        ]);
        
        DB::table('datapropertis')->join('lelangs', 'lelangs.KodeProperti', '=', 'datapropertis.KodeProperti')->where('lelangs.KodeLelang', $id)->update([
            'StatusLelang' => '0',
        ]);

            DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Hapus Lelang ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $pesan = 'Jadwal Lelang ' . $id . ' berhasil dihapus';
        return redirect('/admin/lelang/dalamantrian')->with(['deleted' => $pesan]);
   
    }

    public function berlangsung()
    {
        
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.Status', 'STA')
                ->get();

        return view('backend.lelang.berlangsung', [
            'lelang' => $lelang,
        ]);
        
    }

    public function prosesmulai($id)
    {

        DB::table('lelangs')->where('KodeLelang', $id)->update([
            'Status' => 'STA',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Mulai Lelang ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            $pesan = 'Lelang ' . $id . ' Berhasil Dimulai';
        return redirect('/admin/lelang/berlangsung')->with(['edited' => $pesan]);
    }

    public function batalmulai($id)
    {

        DB::table('lelangs')->where('KodeLelang', $id)->update([
            'Status' => 'OPN',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Mulai Lelang ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            $pesan = 'Jadwal Lelang ' . $id . ' Berhasil Dibatalkan';
        return redirect('/admin/lelang/dalamantrian')->with(['created' => $pesan]);
    }

    public function berakhir()
    {
        
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.Status', 'FNS')
                ->get();

        return view('backend.lelang.berakhir', [
            'lelang' => $lelang,
        ]);
        
    }

    public function selesai($id)
    {

        DB::table('lelangs')->where('KodeLelang', $id)->update([
            'Status' => 'FNS',
            'KodeUser' => \Auth::id(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('eventlogs')->insert([
            'KodeUser' => \Auth::id(),
            'Tanggal' => \Carbon\Carbon::now(),
            'Jam' => \Carbon\Carbon::now()->format('H:i:s'),
            'Keterangan' => 'Mengakhiri Lelang ' . $id,
            'Tipe' => 'OPN',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
            $pesan = 'Lelang ' . $id . ' Berhasil Diakhiri';
        return redirect('/admin/lelang/berakhir')->with(['created' => $pesan]);
    }

    public function detailberlangsung($id)
    {   
    
        $lelang = DB::table('lelangs')
                ->join('datapropertis', 'datapropertis.KodeProperti', '=', 'lelangs.KodeProperti')
                ->join('masterklasifikasis', 'masterklasifikasis.KodeKlasifikasi', '=', 'datapropertis.KodeKlasifikasi')
                ->where('lelangs.KodeLelang', $id)
                ->get();

        return view('backend.lelang.detailberlangsung', [
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

}