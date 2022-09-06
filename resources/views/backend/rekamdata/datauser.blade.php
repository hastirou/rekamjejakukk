@extends('backend.index')
@section('content')

<br/><br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #3f5369; height:60px;">
				<h3 style="color:white;">Keterangan</h3></div>

			<div class="card-title" style="background-color:white;">
				<div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;">
                   
					<p>Status 'OPN' = Data Aktif/Belum Terhapus</p>
					<p>Status 'DEL' = Data Tidak Aktif/Sudah Terhapus</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1% 0.1%;">
			@foreach($user as $usr)
			<h5 align="center" style="color:white;">Tabel Data Username {{$usr->Username}}</h5>
			@endforeach
		</div>


		<div class="card-title" style="background-color:white;">
		</div>
		<div class="card-body">
             @if(session()->get('deleted'))
             <div class="alert alert-danger alert-dismissible fade-show">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             {{ session()->get('deleted') }}
             </div>
             @elseif(session()->get('edited'))
             <div class="alert alert-info alert-dismissible fade-show">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             {{ session()->get('edited') }}
             </div>
             @endif 
			<table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th>Kode Data</th>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Suhu Tubuh</th>
						<th>Lokasi</th>
						<th>Nama Tempat</th>
						<th>Jenis Tempat</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	

						@foreach($rekamdata as $rd)
						<tr>
							<td>{{$rd->KodeData}}</td>
							<td>{{$rd->Tanggal}}</td>
							<td>{{$rd->Waktu}}</td>
							<td>{{$rd->SuhuTubuh}}</td>
							<td>{{$rd->Lokasi}}</td>
							<td>{{$rd->NamaTempat}}</td>
							<td>{{$rd->JenisTempat}}</td>
							<td>{{$rd->Status}}</td>
						<td>
							@if($rd->Status == 'OPN')
						<a href="{{ url('admin/rekamdata/datauser/hapus/'.$usr->id.'/'.$rd->KodeData)}}" class="btn btn-danger">Hapus</a>
							@else($rd->Status == 'DEL')
						<a href="{{ url('admin/rekamdata/datauser/batalhapus/'.$usr->id.'/'.$rd->KodeData)}}" class="btn btn-info">Aktifkan Data</a>
						</td>
							@endif
					</tr>
						@endforeach

				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>

<br/><br/><br/>

@push('scripts')
<script>
       $(document).ready(function() {

    $('#table1').DataTable({
        "order": [],
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true 
});


});
</script>
@endpush

@endsection