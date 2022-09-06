@extends('backend.index')
@section('content')

<br/><br/>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #2f4f4f; height:60px;">
				<h3 align="center" style="color:white;">Tabel Data Lelang (Sedang Berlangsung)</h3></div>

			<div class="card-title" style="background-color:white;">
				<div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;">

                    @if(session()->get('created'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('created') }}
                    </div>

                    @elseif(session()->get('edited'))
                    <div class="alert alert-success alert-dismissible fade-show">
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
			<table border="" class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th>Kode Lelang</th>
						<th>Nama Properti</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Penutupan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	
					@foreach ($lelang as $lel)
					<tr>
						<td>{{ $lel->KodeLelang}}</td>
						<td>{{ $lel->NamaProperti}}</td>
						<td>{{ $lel->TanggalMulai}}</td>
						<td>{{ $lel->TanggalSelesai}}</td>
						<td>
			<a href="{{ url('admin/lelang/selesai/'.$lel->KodeLelang)}}" class="btn btn-success">Selesai</a>
							&nbsp;
			<a href="{{ url('admin/lelang/berlangsung/detail/'.$lel->KodeLelang)}}" class="btn btn-info">Detail</a>
							&nbsp;
			<a href="{{ url('admin/lelang/batalmulai/'.$lel->KodeLelang)}}" class="btn btn-danger">Batal</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

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