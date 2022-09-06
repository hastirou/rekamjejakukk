@extends('backend.index')
@section('content')

<br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1%0.1%">
			<h5 align="center" style="color:white;">Tambah Data Properti</h5>
		</div>
		<form action="{{ route('properti.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
		<div class="card-body" style="background-color:white;">
			<br/>

				<div class="form-group">
						<label for="KodeProperti" >Kode Properti :
						</label>						
                         <input readonly value="{{$newID}}" class="form-control" name="KodeProperti">
                     </div>

                     <div class="form-group">
						<label for="KodeKlasifikasi" >Kode Klasifikasi :
						</label>						
                         <select name="KodeKlasifikasi" class="form-control @error('KodeKlasifikasi') is-invalid @enderror">
                         <option value="">Pilih Klasifikasi</option>
                         	@foreach($klasifikasi as $kla)
                         <option value="{{$kla->KodeKlasifikasi}}">{{$kla->KodeKlasifikasi}} / {{$kla->NamaKlasifikasi}}</option>
                         	@endforeach
                         </select>
                         @error('KodeKlasifikasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

					<div class="form-group">
						<label for="NamaProperti" >Nama Properti :
						</label>						
                         <input class="form-control @error('NamaProperti') is-invalid @enderror" name="NamaProperti" value="{{ old('NamaProperti') }}">
                         @error('NamaProperti')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="Lokasi" >Lokasi :
						</label>						
                         <input class="form-control @error('Lokasi') is-invalid @enderror" name="Lokasi" value="{{ old('Lokasi') }}">
                         @error('Lokasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="LuasTanah" >Luas Tanah :
						</label>						
                         <input class="form-control @error('LuasTanah') is-invalid @enderror" name="LuasTanah" value="{{ old('LuasTanah') }}">
                         @error('LuasTanah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="LuasBangunan" >Luas Bangunan :
						</label>						
                         <input class="form-control @error('LuasBangunan') is-invalid @enderror" name="LuasBangunan" value="{{ old('LuasBangunan') }}">
                         @error('LuasBangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="KamarTidur" >Jumlah Kamar Tidur :
						</label>						
                         <input class="form-control @error('KamarTidur') is-invalid @enderror" name="KamarTidur" value="{{ old('KamarTidur') }}">
                         @error('KamarTidur')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="KamarMandi" >Jumlah Kamar Mandi :
						</label>						
                         <input class="form-control @error('KamarMandi') is-invalid @enderror" name="KamarMandi" value="{{ old('KamarMandi') }}">
                         @error('KamarMandi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="Garasi" >Garasi :
						</label>						
                         <select name="Garasi" id="Garasi" class="form-control @error('Garasi') is-invalid @enderror">
                         	<option value="">Pilih</option>
                         	<option value="Ya">Ya</option>
                         	<option value="Tidak">Tidak</option>
                         </select>
                            @error('Garasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group" id="JumlahGrs">
						<label for="JumlahGarasi">Jumlah Garasi :
						</label>						
                         <input class="form-control" name="JumlahGarasi" id="JumlahGarasi" value="" onkeypress="return onlyNumberKey(event)">
                     </div>

                     <div class="form-group" style="text-align:center;">
  						<label for="file">Upload Foto : </label>
 						<input class="form-group" type="file" accept="image/*" onchange="preview_image(event)" name="file" value="{{ old('file') }}">
                        
 						<div class="row mb-4">
                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="file">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                            <img style="object-fit:contain;"
                            id="output_image" class="img-fluid" id="preview" />
                     </div>
                     
                     <br/><br/>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/dataproperti" type="cancel" class="btn btn-danger">Batal</a>
            </div></label></div></div></div></div></form></div></div>
            <br/><br/>
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
        $('#JumlahGrs').hide();
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