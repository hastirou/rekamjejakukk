@extends('backend.index')
@section('content')

<br/><br/><br/><br/><br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1%0.1%">
			<h5 align="center" style="color:white;">Tambah Data Klasifikasi</h5>
		</div>
		<form action="{{ route('masterklasifikasi.store')}}" method="POST">
			@csrf
		<div class="card-body" style="background-color:white;">
			<br/>
				<div class="form-group">
						<label for="KodeKlasifikasi" >Kode Klasifikasi :
						</label>						
                         <input readonly value="{{$newID}}" class="form-control" name="KodeKlasifikasi">
                     </div>
						<div class="form-group">
						<label for="NamaKlasifikasi" >Nama Klasifikasi :
						</label>						
                         <input class="form-control @error('NamaKlasifikasi') is-invalid @enderror" name="NamaKlasifikasi" value="{{ old('NamaKlasifikasi') }}">
                         @error('NamaKlasifikasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>
                     <br/>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/klasifikasi" type="cancel" class="btn btn-danger">Batal</a>
            </div>
		</div>
		</form>
	</div>
</div>

@endsection