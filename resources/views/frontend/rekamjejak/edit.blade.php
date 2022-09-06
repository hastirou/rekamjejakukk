@extends('frontend.layouts.index')
@section('content')

<style type="text/css">
	{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
.ahref
{
color:#FFFFFF; background-color:#97A9BD; border:1px solid #97A9BD; padding:9px 19px 12px; text-transform:uppercase; font-weight:400; cursor:pointer;
}

.ahref:hover
{
color:#000000; background-color:#FFFFFF; border:1px solid #000000;
}
</style>

<div class="wrapper row2">
  <section id="ctdetails" class="hoc container clear"> 
<form action="{{route('rekamjejak.update')}}" method="post">
	@csrf
  	@foreach($rekamjejak as $rj)
  	<input type="hidden" value="{{$rj->KodeData}}" name="KodeData" id="KodeData" required>
    <div class="sectiontitle">
      <h6 class="heading font-x2">Edit Data</h6>
      <p class="nospace font-xs">Halaman rekam data user {{Auth::user()->fullname}}.</p>
    </div>
    <figure class="one_half first">
        <fieldset>

        	<div class="shopper-info">
        <h6 class="heading">Tanggal :</h6>
          <div class="input-group date" id="inputDate1">
			<input value="{{$rj->Tanggal}}" type="text" required name="Tanggal" id="inputDate1">
			<span class="input-group-addon">
			<span class="glyphicon glyphicon-calendar"></span>
		</span>
		</div>

		<br/><br/><br/>

			<div class="shopper-info">
        <h6 class="heading">Waktu :</h6>
          <div class="input-group date" id="inputTime1">
			<input value="{{$rj->Waktu}}" type="text" required name="Waktu" id="inputTime1">
			<span class="input-group-addon">
			<span class="glyphicon glyphicon-calendar"></span>
		</span>
        </div>

        <br/><br/><br/>

      	<h6 class="heading">Suhu Tubuh :</h6>
      	<div class="input-group date">
          <input type="text" value="{{$rj->SuhuTubuh}}" name="SuhuTubuh" id="SuhuTubuh" required>
          <span class="input-group-addon">
					<span>C</span>
					</span>
				</div>

        </fieldset>
    </figure>

    <article class="one_half">
        <fieldset>

        <h6 class="heading">Nama Tempat :</h6>
          <input type="text" value="{{$rj->NamaTempat}}" id="NamaTempat" name="NamaTempat" style="margin-bottom: 11px;" required>

      	<h6 class="heading">Jenis Tempat :</h6>
      	<span class="input-group-addon">
					<span>Contoh = Sekolah, Kantor, Mall, Event, Tempat Olahraga, Pariwisata, Cafe, DLL</span>
				</span>
          <input type="text" value="{{$rj->JenisTempat}}" id="JenisTempat" name="JenisTempat" style="margin-bottom: 11px;" required>
        <h6 class="heading">Lokasi :</h6>
          <input type="text" value="{{$rj->Lokasi}}" id="Lokasi" name="Lokasi" style="margin-bottom: 11px;" required>

          <div id="outer">
  			<div class="inner"><a href="/rekamjejak/semuadata" type="cancel" class="ahref">Batal</a></div>
  			<div class="inner"><button type="submit">Ubah</button></div>
					</div>
        </fieldset>
    </article>
  </section>
</div>
@endforeach
      </form>

@push('scripts')
<script>
	$(document).ready(function() {
		$('#table').DataTable({
		    "order": [],
		        "bPaginate": true,
		        "bLengthChange": true,
		        "bFilter": true,
		        "bInfo": true,
		        "bAutoWidth": true 
		});
	});

	$('#inputDate1').datetimepicker({
    	defaultDate: new Date(),
    	format: 'YYYY-M-DD'
	});

	$('#inputTime1').datetimepicker({
	    defaultDate: new Date(),
	    format: 'HH:mm:00'
	});

	$(document).ready(function(){

		$("#")

	});
	
</script>
@endpush

@endsection