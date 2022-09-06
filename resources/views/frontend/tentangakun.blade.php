@extends('frontend.layouts.index')
@section('content')

<br/><br/><br/><br/><br/>
<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card-header" style="background-color: #262626; padding: 1% 0.1% 0.1% 0.1%">
			@foreach($user as $usr)
			<h5 align="center" style="color:white;">Data User {{$usr->Username}}</h5>
			@endforeach
		</div>
		<div class="card-body" style="background-color:white; border: 3px solid #262626;">
			@if(session()->get('edited'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('edited') }}
                    </div>
                    @endif
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
			<input readonly type="text" class="form-control" name="Username" value="{{$usr->Username}}">
		</div>
		<div class="form-group">
			<label for="NamaKlasifikasi">Nama Panjang :
			</label>
			<input readonly type="text" class="form-control" name="fullname" value="{{$usr->fullname}}">
		</div>
		<div class="form-group">
			<label for="NamaKlasifikasi">NIK :
			</label>
			<input readonly type="text" class="form-control" name="nik" value="{{$usr->nik}}">
		</div>
			@endforeach

			<div style="text-align:center;">
                <a href="/" type="cancel" class="btn btn-danger">Kembali</a>
                <a href="/tentangakun/editprofil" class="btn btn-info">Edit Profil</a>
                <a href="/tentangakun/ubahpassword" type="cancel" class="btn btn-info">Ubah Password</a>
            </div>
		</div>
		</form>
		</div>
	</div>

<br/><br/><br/><br/><br/>

@endsection