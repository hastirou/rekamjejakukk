@extends('backend.index')
@section('content')

<br/><br/>

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1% 0.1%">

		@foreach($dataproperti as $prop)
                     <h3 style="color:white;" align="center" class="unselect">Atur Jadwal {{$prop->KodeProperti}} ({{$prop->NamaProperti}})</h3>
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
                            src="{{ asset('/data_properti/'.$prop->File)}}" class="img-fluid" id="preview" />
                     </div>
                     </label>                    
                     </div>
                  </div>

            <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center; width: 500px; margin-right:auto; margin-left:auto;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <th>Kode Lelang</th>
                </thead>
                <tbody>
                    <td><input type="text" readonly name="KodeLelang" class="form-control" value="{{$newID}}"></td>
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
                    <td><input type="text" readonly name="KodeProperti" class="form-control" value="{{$prop->KodeProperti}}"></td>
                    <td><input type="text" readonly name="NamaProperti" class="form-control" value="{{$prop->NamaProperti}}"></td>
                    <td><input type="text" readonly name="NamaKlasifikasi" class="form-control" value="{{$prop->NamaKlasifikasi}}"></td>
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
                    <td><input type="text" readonly name="LuasBangunan" class="form-control" value="{{$prop->LuasBangunan}}"></td>
                    <td><input type="text" readonly name="LuasTanah" class="form-control" value="{{$prop->LuasTanah}}"></td>
                    <td><input type="text" readonly name="Lokasi" class="form-control" value="{{$prop->Lokasi}}"></td>
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
                    <td><input type="text" readonly name="KamarTidur" class="form-control" value="{{$prop->KamarTidur}}"></td>
                    <td><input type="text" readonly name="KamarMandi" class="form-control" value="{{$prop->KamarMandi}}"></td>
                    <td><input type="text" readonly name="Garasi" class="form-control" value="{{$prop->Garasi}}"></td>
                    <td><input type="text" readonly name="JumlahGarasi" class="form-control" value="{{$prop->JumlahGarasi}}"></td>
                </tbody>   
                </table>
                    
                    <div class="form-group">
                        <label for="TanggalMulai" >Tanggal Mulai :
                        </label>                        
                         <div class="input-group date" id="inputDate1">
                             <input type="text" required class="form-control" name="TanggalMulai" id="inputDate1" style="text-align:center;">
                             <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                         </div>
                     </div>
                 

                    <br/>

                    
                    <div class="form-group">
                        <label for="TanggalMulai" >Jam Mulai :
                        </label>                        
                         <div class="input-group date" id="inputTime1">
                             <input type="text" required class="form-control" name="JamMulai" id="inputTime1" style="text-align:center;">
                             <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                         </div>
                     </div>
                 

                     <br/>

                     
                     <div class="form-group">
                        <label for="TanggalMulai" >Tanggal Selesai :
                        </label>                        
                         <div class="input-group date" id="inputDate2">
                             <input type="text" required class="form-control" name="TanggalSelesai" id="inputDate2" style="text-align:center;">
                             <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                         </div>
                     </div>
                 
                    <br/>

                    
                    <div class="form-group">
                        <label for="TanggalMulai">Jam Selesai :
                        </label>                        
                         <div class="input-group date" id="inputTime2">
                             <input type="text" required class="form-control" name="JamSelesai" id="inputTime2" style="text-align:center;">
                             <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                         </div>
                     </div>
                 

                    <br/><br/>

                    <table border class="table table bordered table-hover" id="table1" name="table1" style="text-align:center; width: 800px; margin-right:auto; margin-left:auto;">
                <thead style="background-color: #262626; color:white;" style="text-align:center;">
                    <tr>
                        <th>Open Bid</th>
                        <th>Buy It Now (BIN)</th>
                    </tr>
                </thead>
                <tbody>
                    <td><input type="text" name="OpenBid" class="form-control"></td>
                    <td><input type="text" name="BuyItNow" class="form-control"></td>
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
                    <td><input type="text" name="Kelipatan1" class="form-control"></td>
                    <td><input type="text" name="Kelipatan2" class="form-control"></td>
                    <td><input type="text" name="Kelipatan3" class="form-control"></td>
                    <td><input type="text" name="Kelipatan4" class="form-control"></td>
                </tbody>
                    </table>

                    <br/><br>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/dataproperti/konfirmasi" type="cancel" class="btn btn-danger">Batal</a>
		</form>
	</div>
</div>
</div>
</form></div></div><br/>
@push('scripts')
<script>

    $('#inputDate1').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD'
    });
    $('#inputTime1').datetimepicker({
        defaultDate: new Date(),
        format: 'HH:00:00'
    });
    $('#inputDate2').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD'
    });
    $('#inputTime2').datetimepicker({
        defaultDate: new Date(),
        format: 'HH:00:00'
    });

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