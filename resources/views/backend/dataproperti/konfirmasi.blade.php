@extends('backend.index')
@section('content')

<br/><br/>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #2f4f4f; height:60px;">
				<h3 align="center" style="color:white;">Tabel Data Properti (Dikonfirmasi)</h3></div>

			<div class="card-title" style="background-color:white;">
				<div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;">

                    @if(session()->get('edited'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('edited') }}
                    </div>
                    @endif


			<div class="col-md-12" >
			<div class="card">
			<div class="card-body">
			<table border="" class="table table bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th>Kode Properti</th>
						<th>Kode Klasifikasi</th>
						<th>Nama Properti</th>
						<th>Status Lelang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	

					@foreach ($properti as $mk)
					<tr>
						<td>{{ $mk->KodeProperti}}</td>
						<td>{{ $mk->KodeKlasifikasi}} / {{ $mk->NamaKlasifikasi}}</td>
						<td>{{ $mk->NamaProperti}}</td>
						<td>
							@if($mk->StatusLelang == '0')
								Belum Ada
							@elseif($mk->StatusLelang == '1')
								Sudah Ada
							@endif
						</td>
						<td>
		<a href="{{ url('admin/dataproperti/detailkonfirmasi/'.$mk->KodeProperti)}}" class="btn btn-info">Detail</a>
							&nbsp;
							@if($mk->StatusLelang == '0')
		<a href="{{ url('/admin/dataproperti/aturjadwal/'.$mk->KodeProperti) }}" class="btn btn-warning">Atur Jadwal</a>
							&nbsp;
		<a href="{{ url('/admin/dataproperti/batalkonfirm/'.$mk->KodeProperti) }}" class="btn btn-danger">Batal</a>
							@endif
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