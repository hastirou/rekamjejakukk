@extends('backend.index')
@section('content')

<br/><br/><br/>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">
			@foreach($user as $usr)
			<h5 align="center" style="color:white;">Edit Data User {{$usr->Username}}</h5>
			@endforeach
		</div>
		<form action="{{ route('userbackend.updatebackend')}}" method="POST">
		@csrf
		<div class="card-body" style="background-color:white;">
			<br/>
			@foreach($user as $usr)
		<div class="form-group">
			<label for="KodeKlasifikasi">User Id :
			</label>
			<input readonly type="text" class="form-control" name="id" value="{{$usr->id}}">
		</div>
		<div class="form-group">
			<label for="NamaKlasifikasi">Username :
			</label>
			<input type="text" class="form-control" name="Username" value="{{$usr->Username}}">
		</div>
		<div class="form-group">
			<label for="NamaKlasifikasi">Nama Panjang :
			</label>
			<input type="text" class="form-control" name="fullname" value="{{$usr->fullname}}">
		</div>
		<div class="form-group">
			<label for="NamaKlasifikasi">NIK :
			</label>
			<input type="text" class="form-control" name="nik" value="{{$usr->nik}}">
		</div>
		<div class="form-group">
			<label for="NamaKlasifikasi">Role Id :
			</label>
			<input type="text" class="form-control" name="roleid" value="{{$usr->roleid}}">
		</div>
			@endforeach

			<div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/userbackend" type="cancel" class="btn btn-danger">Batal</a>
            </div>

		</div>
		</form>
		</div>
	</div>

<br/><br/><br/>
@endsection