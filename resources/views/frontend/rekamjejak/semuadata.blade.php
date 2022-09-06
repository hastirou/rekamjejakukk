@extends('frontend.layouts.index')
@section('content')

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div class="row justify-content-center">
	<div class="col-md-10">
		<div class="card">
			<div class="card-header" style="background-color: #3f5369; height:60px;">
				<h3 align="center" style="color:white;">Tabel Rekam Jejak User {{Auth::user()->Username}}</h3></div>

			<div class="card-title" style="background-color:white;">
				<div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;">

                    @if(session()->get('created'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('created') }}
                    </div>

                    @elseif(session()->get('edited'))
                    <div class="alert alert-info alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('edited') }}
                    </div>

                    @elseif(session()->get('deleted'))
                    <div class="alert alert-danger alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('deleted') }}
                    </div>
                    @endif

			<div class="col-md-12" >
			<div class="card">
			<div class="card-body">
			<table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th>No</th>
						<th>Kode Data</th>
						<th>Tanggal</th>
						<th>Waktu</th>
						<th>Suhu Tubuh</th>
						<th>Lokasi</th>
						<th>Nama Tempat</th>
						<th>Jenis Tempat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	
						@foreach($rekamjejak as $rj)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$rj->KodeData}}</td>
							<td>{{$rj->Tanggal}}</td>
							<td>{{$rj->Waktu}}</td>
							<td>{{$rj->SuhuTubuh}}</td>
							<td>{{$rj->Lokasi}}</td>
							<td>{{$rj->NamaTempat}}</td>
							<td>{{$rj->JenisTempat}}</td>
							<td>
							<a href="{{ url('rekamjejak/semuadata/edit/'.$rj->KodeData)}}" class="btn btn-info">Edit</a>
							&nbsp;
							<a href="{{ url('rekamjejak/semuadata/hapus/'.$rj->KodeData)}}" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
					</div>
				</div>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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