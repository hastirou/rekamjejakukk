@extends('frontend.layouts.index')
@section('content')

<div id="fh5co-properties" class="fh5co-section-gray">
      <div class="container">
        <div class="row">

          <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h3>Semua Lelang</h3>
          </div>

          @foreach($lelang as $lel)
          @if($lel->Status == 'STA')
          <div class="col-md-4 animate-box">
            <div class="property">
              <a href="{{ url('/lelang/detail/'.$lel->KodeLelang)}}" class="fh5co-property" class="col-md-4">
                <img src="{{ asset('/data_properti/'.$lel->File)}}" style="width:100%; height:100%;">
                <span class="status">Dimulai</span>
                <ul class="list-details">
                  <li>{{$lel->LuasTanah}}</li>
                  <li>{{$lel->KamarTidur}} Kamar Tidur</li>
                  <li>{{$lel->KamarMandi}} Kamar Mandi</li>
                  <li>{{$lel->JumlahGarasi}} Garasi</li>
                </ul>
              </a>
              <div class="property-details">
                <h3>{{$lel->NamaProperti}}</h3>
                <span class="price">{{$lel->OpenBid}}</span>
                <p>Lelang akan berakhir pada {{$lel->TanggalSelesai}}</p>
                <span class="address"><i class="icon-map"></i>{{$lel->Lokasi}}</span>
              </div>
            </div>
          </div>

          @elseif($lel->Status == 'OPN')
          <div class="col-md-4 animate-box">
            <div class="property">
              <a href="{{ url('/lelang/belumdimulai/'.$lel->KodeLelang)}}" class="fh5co-property" class="col-md-4">
                <img src="{{ asset('/data_properti/'.$lel->File)}}" style="width:100%; height:100%;">
                <span class="status">Belum Dimulai</span>
                <ul class="list-details">
                  <li>{{$lel->LuasTanah}}</li>
                  <li>{{$lel->KamarTidur}} Kamar Tidur</li>
                  <li>{{$lel->KamarMandi}} Kamar Mandi</li>
                  <li>{{$lel->JumlahGarasi}} Garasi</li>
                </ul>
              </a>
              <div class="property-details">
                <h3>{{$lel->NamaProperti}}</h3>
                <span class="price">{{$lel->OpenBid}}</span>
                <p>Lelang akan dimulai pada {{$lel->TanggalMulai}}</p>
                <span class="address"><i class="icon-map"></i>{{$lel->Lokasi}}</span>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>

@endsection