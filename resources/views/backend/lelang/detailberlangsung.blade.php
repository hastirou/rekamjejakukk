@extends('backend.index')
@section('content')

<br/><br/>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1% 0.1%">

                @foreach($lelang as $lel)
                     <h3 style="color:white;" align="center" class="unselect">Detail Lelang (Sedang Berlangsung) {{$lel->KodeLelang}}</h3>
                @endforeach
        </div>

        <form action="{{ route('lelang.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

        <div class="card-body" style="background-color:white;">

            <div class="form-group" style="text-align:center;">
                <label for="file">Foto Properti : </label>
                <div class="row mb-4">
                <div class="col-md-3 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="file">
                    <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                            <img style="object-fit: contain;"
                            src="{{ asset('/data_properti/'.$lel->File)}}" class="img-fluid" id="preview" />
                     </div>
                     </label>                    
                     </div>
                  </div>

            <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center; width: 500px; margin-right:auto; margin-left:auto;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <th>Kode Lelang</th>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="KodeLelang" class="form-control" value="{{$lel->KodeLelang}}"></td>
                </tbody>
            </table>

            <br/>

            <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <tr style="text-align: center;" >
                    <th>Kode Properti</th>
                    <th>Nama Properti</th>
                    <th>Nama Klasifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="text" readonly name="KodeProperti" class="form-control" value="{{$lel->KodeProperti}}"></td>
                    <td><input type="text" readonly name="NamaProperti" class="form-control" value="{{$lel->NamaProperti}}"></td>
                    <td><input type="text" readonly name="NamaKlasifikasi" class="form-control" value="{{$lel->NamaKlasifikasi}}"></td>
                    </tr>
                </tbody>
                </table>

                <br/>

                <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <tr>
                    <th>Luas Tanah</th>
                    <th>Luas Bangunan</th>
                    <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="LuasBangunan" class="form-control" value="{{$lel->LuasBangunan}}"></td>
                    <td><input type="text" readonly name="LuasTanah" class="form-control" value="{{$lel->LuasTanah}}"></td>
                    <td><input type="text" readonly name="Lokasi" class="form-control" value="{{$lel->Lokasi}}"></td>
                </tbody>   
                </table>

                <br/>

                <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <tr>
                    <th>Jumlah Kamar Tidur</th>
                    <th>Jumlah Kamar Mandi</th>
                    <th>Garasi</th>
                    <th>Jumlah Garasi</th>
                    </tr>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="KamarTidur" class="form-control" value="{{$lel->KamarTidur}}"></td>
                    <td><input type="text" readonly name="KamarMandi" class="form-control" value="{{$lel->KamarMandi}}"></td>
                    <td><input type="text" readonly name="Garasi" class="form-control" value="{{$lel->Garasi}}"></td>
                    <td><input type="text" readonly name="JumlahGarasi" class="form-control" value="{{$lel->JumlahGarasi}}"></td>
                </tbody>   
                </table>

                <br/>

                    <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center; width: 800px; margin-right:auto; margin-left:auto;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <tr>
                        <th>Jadwal Mulai</th>
                        <th>Jadwal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="TanggalMulai" class="form-control" value="{{$lel->TanggalMulai}}"></td>
                    <td><input type="text" readonly name="TanggalSelesai" class="form-control" value="{{$lel->TanggalSelesai}}"></td>
                </tbody>
            </table>

                    <br/>

                    <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center; width: 800px; margin-right:auto; margin-left:auto;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <tr>
                        <th>Open Bid</th>
                        <th>Buy It Now (BIN)</th>
                    </tr>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="OpenBid" class="form-control" value="{{$lel->OpenBid}}"></td>
                    <td><input type="text" readonly name="BuyItNow" class="form-control" value="{{$lel->BuyItNow}}"></td>
                </tbody>
            </table>

            <br/>

            <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                <tr>
                    <th>Kelipatan 1</th>
                    <th>Kelipatan 2</th>
                    <th>Kelipatan 3</th>
                    <th>Kelipatan 4</th>
                </tr>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="Kelipatan1" class="form-control" value="{{$lel->Kelipatan1}}"></td>
                    <td><input type="text" readonly name="Kelipatan2" class="form-control" value="{{$lel->Kelipatan2}}"></td>
                    <td><input type="text" readonly name="Kelipatan3" class="form-control" value="{{$lel->Kelipatan3}}"></td>
                    <td><input type="text" readonly name="Kelipatan4" class="form-control" value="{{$lel->Kelipatan4}}"></td>
                </tbody>
                    </table>

                    <br/>
                     <div style="text-align:center;">
                <a href="/admin/lelang/berlangsung" type="cancel" class="btn btn-info">Kembali</a>
        </form>
    </div>
</div>
</div>
</form></div></div><br/>
@push('scripts')
<script>

function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
@endpush
@endsection