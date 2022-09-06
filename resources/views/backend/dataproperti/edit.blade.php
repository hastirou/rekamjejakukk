@extends('backend.index')
@section('content')

<br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1%0.1%">

		@foreach($dataproperti as $prop)
                     <h3 style="color:white;" align="center" class="unselect">Edit Properti {{$prop->KodeProperti}} ({{$prop->NamaProperti}})</h3>
              @endforeach

		</div>

		<form action="{{ route('properti.update')}}" method="POST" enctype="multipart/form-data">
			@csrf

		<div class="card-body" style="background-color:white;">
			<br/>
				<div class="form-group">
						@foreach($dataproperti as $prop)				
						<label for="KodeProperti" >Kode Properti :
						</label>
                         <input readonly type="text" class="form-control" name="KodeProperti" value="{{ $prop->KodeProperti }}">
                         @endforeach
                     </div>

                     <div class="form-group">
						<label for="KodeKlasifikasi" >Kode Klasifikasi :
						</label>						
                         <select class="form-control" name="KodeKlasifikasi">
                         	@foreach($dataproperti as $prop)
                         	<option value="{{$prop->KodeKlasifikasi}}">{{$prop->KodeKlasifikasi}} / {{$prop->NamaKlasifikasi}}
                            </option>
                         	@endforeach
                         	<option value="">Pilih Klasifikasi</option>
                            @foreach($klasifikasi as $kla)
                            <option value="{{$kla->KodeKlasifikasi}}">{{$kla->KodeKlasifikasi}} / {{$kla->NamaKlasifikasi}}
                            </option>
                            @endforeach
                         </select>
                     </div>

					<div class="form-group">	
						<label for="NamaProperti" >Nama Properti :
						</label>						
                         <input type="text" class="form-control" name="NamaProperti" value="{{$prop->NamaProperti}}">
                     </div>

                     <div class="form-group">                
						<label for="Lokasi" >Lokasi :
						</label>						
                         <input type="text" class="form-control" name="Lokasi" value="{{$prop->Lokasi}}">
                     </div>

                     <div class="form-group">               
						<label for="LuasTanah" >Luas Tanah :
						</label>						
                         <input type="text" class="form-control" name="LuasTanah" value="{{$prop->LuasTanah}}">
                     </div>

                     <div class="form-group">               
						<label for="LuasBangunan" >Luas Bangunan :
						</label>						
                         <input type="text" class="form-control" name="LuasBangunan" value="{{$prop->LuasBangunan}}">
                     </div>

                     <div class="form-group">              
						<label for="KamarTidur" >Jumlah Kamar Tidur :
						</label>						
                         <input type="text" class="form-control" name="KamarTidur" value="{{$prop->KamarTidur}}">
                     </div>

                     <div class="form-group">              
						<label for="KamarMandi" >Jumlah Kamar Mandi :
						</label>						
                         <input type="text" class="form-control" name="KamarMandi" value="{{$prop->KamarMandi}}">
                     </div>

                     <div class="form-group">
                        <label for="Garasi" >Garasi :
                        </label>                        
                         <select name="Garasi" id="Garasi" class="form-control">
                            @foreach($dataproperti as $prop)
                            <option value="{{$prop->Garasi}}">{{$prop->Garasi}}</option>
                            @endforeach
                            <option value="">Pilih</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                         </select>
                     </div>

                     @if($prop->Garasi == 'Ya')
                     <div class="form-group" id="JumlahGrs">
                        <label for="JumlahGarasi">Jumlah Garasi :
                        </label>                        
                         <input class="form-control" name="JumlahGarasi" id="JumlahGarasi" value="{{$prop->JumlahGarasi}}" onkeypress="return onlyNumberKey(event)">
                     </div>
                     @else
                     <div class="form-group" id="JumlahGrs" style="display:none;">
                        <label for="JumlahGarasi">Jumlah Garasi :
                        </label>                        
                         <input class="form-control" name="JumlahGarasi" id="JumlahGarasi" value="0" onkeypress="return onlyNumberKey(event)">
                     </div>
                     @endif
                     

                     <div class="form-group" style="text-align:center;">
  				<label for="file">Upload Foto : </label>
 				<input type="file" accept="image/*" onchange="preview_image(event)" name="file">

 				<div class="row mb-4">
                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="file">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                            <img style="object-fit:contain;"
                            src="{{ asset('/data_properti/'.$prop->File)}}" id="output_image" class="img-fluid" id="preview"  />
                     </div>
                     </label>
                     
                     <br/><br/>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/dataproperti" type="cancel" class="btn btn-danger">Batal</a>
            </div>
		</div>
		</form>
		<br/><br/><br/>
	</div>
</div>
</div></form></div></div></br>
@push('scripts')
<script type='text/javascript'>
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
    
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    $(document).ready(function(){
        $('select[name="Garasi"]').on('change', function(){

        var valgar = $('#Garasi').val();

        if(valgar == 'Ya') {
            $('#JumlahGrs').show();
            $('#JumlahGarasi').val('0');
        } else {
            $('#JumlahGrs').hide();
            $('#JumlahGarasi').val('0');
        }
        });
    });
    
</script>
@endpush
@endsection