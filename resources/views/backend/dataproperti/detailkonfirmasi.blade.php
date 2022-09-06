@extends('backend.index')
@section('content')

<br/><br/><br/>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-header" style="background-color: #2f4f4f; padding: 0.1% 0.1% 0.1%0.1%">
            @foreach($dataproperti as $prop)
                <h3 style="color:white;" align="center" class="unselect">Detail Properti {{$prop->KodeProperti}} ({{$prop->NamaProperti}})</h3>
                @endforeach
        </div>
        <div class="card-body" style="background-color:white;">
            <br/>

                <div class="form-group">
                        <label for="KodeProperti" >Kode Properti :
                        </label>
                        @foreach($dataproperti as $prop)                
                         <input readonly type="text" class="form-control" name="KodeProperti" value="{{ $prop->KodeProperti }}">
                         @endforeach
                     </div>

                     <div class="form-group">
                        <label for="KodeKlasifikasi" >Kode Klasifikasi :
                        </label>                        
                            @foreach($dataproperti as $prop)
                         <input type="text" readonly class="form-control" name="KodeKlasifikasi" value="{{ $prop->KodeKlasifikasi }} / {{ $prop->NamaKlasifikasi }}">
                            @endforeach
                         </select>
                     </div>

                        <div class="form-group">    
                        <label for="NamaProperti" >Nama Properti :
                        </label>                        
                         <input type="text" readonly class="form-control" name="NamaProperti" value="{{$prop->NamaProperti}}">
                     </div>

                     <div class="form-group">                
                        <label for="Lokasi" >Lokasi :
                        </label>                        
                         <input type="text" readonly class="form-control" name="Lokasi" value="{{$prop->Lokasi}}">
                     </div>

                     <div class="form-group">               
                        <label for="LuasTanah" >Luas Tanah :
                        </label>                        
                         <input type="text" readonly class="form-control" name="LuasTanah" value="{{$prop->LuasTanah}}">
                     </div>

                     <div class="form-group">               
                        <label for="LuasBangunan" >Luas Bangunan :
                        </label>                        
                         <input type="text" readonly class="form-control" name="LuasBangunan" value="{{$prop->LuasBangunan}}">
                     </div>

                     <div class="form-group">              
                        <label for="KamarTidur" >Jumlah Kamar Tidur :
                        </label>                        
                         <input type="text" readonly class="form-control" name="KamarTidur" value="{{$prop->KamarTidur}}">
                     </div>

                     <div class="form-group">              
                        <label for="KamarMandi" >Jumlah Kamar Mandi :
                        </label>                        
                         <input type="text" readonly class="form-control" name="KamarMandi" value="{{$prop->KamarMandi}}">
                     </div>

                     <div class="form-group">            
                        <label for="Garasi">Garasi :
                        </label>                        
                     <input readonly type="text" class="form-control" name="KodeKlasifikasi" value="{{$prop->Garasi}}">
                     </div>

                     <div class="form-group">             
                        <label for="JumlahGarasi" >Jumlah Garasi :
                        </label>                        
                         <input type="text" readonly class="form-control" name="JumlahGarasi" value="{{$prop->JumlahGarasi}}">
                     </div>

                     <div class="form-group" style="text-align:center;">
                        <label for="file">Gambar Item : </label>
                        <br/>
                            <div class="row mb-4">
                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="file">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                            <img style="object-fit:contain;"
                            src="{{ asset('/data_properti/'.$prop->File)}}" class="img-fluid" id="preview" />
                     </div>
                     </label>
                     
                     <br/><br/>
                     <div style="text-align:center;">
                     <a href="/admin/dataproperti/konfirmasi" type="cancel" class="btn btn-info">Kembali</a>
            </div>
        </div>
        </form>
        <br/><br/><br/>
    </div>
</div></div></div></div><br/>
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection

