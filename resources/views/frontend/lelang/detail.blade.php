@extends('frontend.layouts.index')
@section('content')

    @foreach($lelang as $lel)
    <div id="fh5co-search-map">
      <div class="search-property">
        <div class="s-holder">
          <h2>{{$lel->NamaProperti}}</h2>
          <div class="row">
            <div class="col-xxs-12 col-xs-12">
              <div class="input-field">
                <label for="from">Lokasi:</label>
                <textarea class="form-control" id="from-place" style="resize:none;" readonly>{{$lel->Lokasi}}</textarea>
              </div>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Luas Tanah:</label>
                <input type="text" class="form-control" id="from-place" value="{{$lel->LuasTanah}}" readonly />
              </section>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Luas Bangunan:</label>
                <input type="text" class="form-control" id="from-place" value="{{$lel->LuasBangunan}}" readonly />
              </section>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Kamar Tidur:</label>
                <input type="text" class="form-control" id="from-place" value="{{$lel->KamarTidur}}" readonly />
              </section>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Kamar Mandi:</label>
                <input type="text" class="form-control" id="from-place" value="{{$lel->KamarMandi}}" readonly />
              </section>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Jumlah Garasi:</label>
                <input type="text" class="form-control" id="from-place" value="{{$lel->JumlahGarasi}}" readonly />
              </section>
            </div>

            <!-- @if(Auth::user() && Auth::user()->id) -->
            <div>
              <p><a class="btn btn-primary btn-lg" href="{{ url('lelang/'.$lel->KodeLelang)}}">IKUTI LELANG</a></p>
            </div>
            <!--@else
            <div>
              <p><a class="btn btn-primary btn-lg" href="/login">IKUTI LELANG</a></p>
            </div>
            @endif-->
          </div>
        </div>
      </div>
      <div class="map">
        <img src="{{ asset('/data_properti/'.$lel->File)}}" style="width:100%; height:100%;">
      </div>
    </div>

    <div id="fh5co-features">
      <div class="container">
        <div class="row">

          <div class="col-md-4 animate-box">
            <div class="feature-left">
              <span class="icon">
                <i class="icon-clock"></i>
              </span>
              <div class="feature-copy">
                <h3>Tanggal Pelaksanaan</h3>
                <p>{{$lel->TanggalMulai}} Sampai dengan {{$lel->TanggalSelesai}}</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 animate-box" style="left:100px;">
            <div class="feature-left">
              <span class="icon">
                <i class="icon-wallet"></i>
              </span>
              <div class="feature-copy">
                <h3>Open Bid</h3>
                <p>Rp.{{number_format($lel->OpenBid)}} .-</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 animate-box" style="left:110px;">
            <div class="feature-left">
              <span class="icon">
                <i class="icon-wallet"></i>
              </span>
              <div class="feature-copy">
                <h3>Buy It Now (BIN)</h3>
                <p>Rp{{number_format($lel->BuyItNow)}} .-</p>
              </div>
            </div>
          </div>

        </div>
        </div>
      </div>

    @endforeach
    @push('script')
  <script>
  function number_format(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
        var n = !isFinite(+number) ? 0 : +number
        var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
        var sep = (typeof thousandsSep === 'undefined') ? '.' : thousandsSep
        var dec = (typeof decPoint === 'undefined') ? ',' : decPoint
        var s = ''

        var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
                .toFixed(prec)
        }

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
        }

        return s.join(dec)
    }
    </script>
    @endpush
@endsection