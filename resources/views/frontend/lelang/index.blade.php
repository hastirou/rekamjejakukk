@extends('frontend.layouts.index')
@section('content')
    
<style type="text/css">
  .button1 {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  height:200px;
  width:200px;
}
  .button1:hover {
  background-color: #015930;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  height:200px;
  width:200px;
} 
  .button2 {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  width: 150px;
} 
  .button2:hover {
  background-color: #015930;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  width: 150px;
} 
  .button1 {border-radius: 100%;}
  .button2 {border-radius: 12px;}
</style>

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
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Tanggal Mulai:</label>
                <input type="text" class="form-control" value="{{$lel->TanggalMulai}}" name="TanggalMulai" id="TanggalMulai" readonly />
              </section>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Tanggal Penutupan:</label>
                <input type="text" class="form-control" value="{{$lel->TanggalSelesai}}" name="TanggalPenutupan" id="TanggalPenutupan" readonly />

              </section>
            </div>
            <div class="col-xxs-12 col-xs-12">
              <section>
                <label for="class">Berakhir Dalam:</label>
                <h1 id="counttime"></h1>
                
              </section>
            </div>
           
            <div>
              <p><a class="btn btn-primary btn-lg" href="#">BUY NOW Rp.{{number_format($lel->BuyItNow)}} .-</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="map">
        <img src="{{ asset('/data_properti/'.$lel->File)}}" style="width:100%; height:100%;">
      </div>
    </div>

    <div id="fh5co-about" class="fh5co-agent">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
            <h3>Kelipatan BID</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3 text-center animate-box" data-animate-effect="fadeIn">
            <div class="fh5co-staff">
              <button onclick="k1()" class="button1">Rp.{{number_format($lel->Kelipatan1)}} .-</button>
              <input type="hidden" name="Kpt1" id="Kpt1" value="{{$lel->Kelipatan1}}">
              <br/><br/>              
            </div>
          </div>

          <div class="col-sm-3 text-center animate-box" data-animate-effect="fadeIn">
            <div class="fh5co-staff">
              <button onclick="k2()" class="button1">Rp.{{number_format($lel->Kelipatan2)}} .-</button>
              <input type="hidden" name="Kpt2" id="Kpt2" value="{{$lel->Kelipatan2}}">
              <br/><br/>              
            </div>
          </div>

          <div class="col-sm-3 text-center animate-box" data-animate-effect="fadeIn">
            <div class="fh5co-staff">
              <button onclick="k3()" class="button1">Rp.{{number_format($lel->Kelipatan3)}} .-</button>
              <input type="hidden" name="Kpt3" id="Kpt3" value="{{$lel->Kelipatan3}}">
              <br/><br/>              
            </div>
          </div>

          <div class="col-sm-3 text-center animate-box" data-animate-effect="fadeIn">
            <div class="fh5co-staff">
              <button onclick="k4()" class="button1">Rp.{{number_format($lel->Kelipatan4)}} .-</button>
              <input type="hidden" name="Kpt4" id="Kpt4" value="{{$lel->Kelipatan4}}">
              <br/><br/>
              
            </div>
          </div>       

          <div class="col-sm-3 text-center"></div>
          <div class="col-sm-3 text-center">
            <h3>Penawaran Tertinggi</h3>
              <input type="hidden" class="form-control" id="bidakhir" name="bidakhir" readonly>
              <input type="text" class="form-control" id="viewbidakhir" name="viewbidakhir" readonly>
          </div>
          <div class="col-sm-3 text-center">
            <h3>Penawaran Anda</h3>
              <input type="hidden" class="form-control" id="yourbid" name="yourbid" readonly>
              <input type="text" class="form-control" id="viewyourbid" name="viewyourbid" readonly>
          </div>
          <div class="col-sm-3 text-center">
            <button class="button2">BID</button> 
              <button class="button2" onclick="reset()">RESET</button> 
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" class="form-control" value="{{$lel->KodeLelang}}" id="KodeLelang" name="KodeLelang" readonly>
    <input type="hidden" value="{{\Carbon\Carbon::parse($lel->TanggalSelesai)->format('M j, Y H:i:s')}}" id="countdown">
    <input type="hidden" value="{{\Carbon\Carbon::now()->format('M j, Y H:i:s')}}" name="now" id="now">
                
    @endforeach

    @push('scripts')
    <script>
        var count = $('#countdown').val();
        var countDownDate = new Date(count).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
 
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="counttime"
  document.getElementById("counttime").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("counttime").innerHTML = "";
  }
}, 1000);


$(document).ready(function () {

        var id = $('#KodeLelang').val();
        var urlget = '/bid/search/' + id;

        $.get(urlget, function (data, value) {
            console.log(value);
            $('#bidakhir').val('0');
            $('#viewbidakhir').val('Rp 0 .-');
            $('#yourbid').val('0');
            $('#viewyourbid').val('Rp 0 .-');
            if (value == 'success') {
               
                $.each(data, function (i, dt) {
                    $('#bidakhir').val(dt.Nominal);
                    $('#viewbidakhir').val('Rp '+number_format(dt.Nominal)+' .-');
                    $('#yourbid').val(dt.Nominal);
                    $('#viewyourbid').val('Rp '+number_format(dt.Nominal)+' .-');
                });
            }
            if ($.isEmptyObject(data)) {

            }
        });
});

    function k1() {
        var kelipatan = $('#Kpt1').val();
        var bid = $('#yourbid').val();

        var TotalAkhir = Number($('#yourbid').val())+Number($('#Kpt1').val());
        $('#yourbid').val(TotalAkhir);
        $('#viewyourbid').val('Rp '+number_format(TotalAkhir)+' .-');
    }

    function k2() {
        var kelipatan = $('#Kpt2').val();
        var bid = $('#yourbid').val();

        var TotalAkhir = Number($('#yourbid').val())+Number($('#Kpt2').val());
        $('#yourbid').val(TotalAkhir);
        $('#viewyourbid').val('Rp '+number_format(TotalAkhir)+' .-');
    }

    function k3() {
        var kelipatan = $('#Kpt3').val();
        var bid = $('#yourbid').val();

        var TotalAkhir = Number($('#yourbid').val())+Number($('#Kpt3').val());
        $('#yourbid').val(TotalAkhir);
        $('#viewyourbid').val('Rp '+number_format(TotalAkhir)+' .-');
    }

    function k4() {
        var kelipatan = $('#Kpt4').val();
        var bid = $('#yourbid').val();

        var TotalAkhir = Number($('#yourbid').val())+Number($('#Kpt4').val());
        $('#yourbid').val(TotalAkhir);
        $('#viewyourbid').val('Rp '+number_format(TotalAkhir)+' .-');
    }

    function reset() {
        var recent = $('#bidakhir').val();
        $('#yourbid').val(recent);
        $('#viewyourbid').val('Rp '+number_format(recent)+' .-');
    }

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