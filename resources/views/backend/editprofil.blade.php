@extends('backend.index')
@section('content')

<br/><br/><br/><br/>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-header" style="background-color: #3f5369; padding: 1% 0.1% 0.1% 0.1%">
            @foreach($user as $usr)
            <h5 align="center" style="color:white;">Data User {{$usr->Username}}</h5>
            @endforeach
        </div>
        <form action="{{ route('tentangakun.update')}}" method="POST">
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
            @endforeach

            <div style="text-align:center;">
                <a href="/admin/tentangakun" type="cancel" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-success">Ubah</a>
            </div>
        </div>
        </form>
        </div>
    </div>

<br/><br/><br/><br/><br/>

@endsection