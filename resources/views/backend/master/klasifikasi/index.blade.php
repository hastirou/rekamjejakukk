@extends('backend.index')
@section('content')

<br/><br/>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #2f4f4f; height:60px;">
				<h3 style="color:white;">Klasifikasi</h3></div>

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
					<a href="{{ url('/admin/klasifikasi/create')}}" class="btn btn-success">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Tambah Data
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1% 0.1%;">
			<h5 align="center" style="color:white;">Tabel Data Klasifikasi</h5>
		</div>
		<div class="card-title" style="background-color:white;">
		</div>
		<div class="card-body">
			<table border="" class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th style="width:40%;">Kode Klasifikasi</th>
						<th style="width:40%;">Nama Klasifikasi</th>
						<th style="width:20%;">Aksi</th>
					</tr>
				</thead>
				<tbody>	
					@foreach ($masterklasifikasi as $mk)
					<tr>
						<td>{{ $mk->KodeKlasifikasi}}</td>
						<td>{{ $mk->NamaKlasifikasi}}</td>
						<td>
							<a href="{{ url('/admin/klasifikasi/edit/'.$mk->KodeKlasifikasi)}}" class="btn btn-warning">Edit</a>
							&nbsp;
							<a href="{{ url('/admin/klasifikasi/hapus/'.$mk->KodeKlasifikasi)}}" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<br/><br/>
@push('scripts')
<script>
	$(document).ready(function(){

		$('#table').Datatable({
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