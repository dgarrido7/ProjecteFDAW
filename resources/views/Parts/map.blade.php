@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron p-0">
    
                    <div class="row align-items-center justify-content-center">
                    <div class="col-md-3 pt-3">
                           <div class="form-group ">
                              <select id="comarca" class="form-control">
                              <option disabled selected>Seleccionar Comunidad</option>
                              <option value='Todas'>Todas</option>
                              @foreach ($comunidades as $comunidad)
                                    <option value='{{ $comunidad->Id }}'>{{ $comunidad->Nombre }}</option>
                              @endforeach
                              </select>
                           </div>
                        </div>
                		<div class="col-md-3 pt-3">
                           <div class="form-group">
                              <select id="provincia" class="form-control">
                              <option disabled selected>Seleccionar Provincia</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 pt-3">
                            <div class="form-group">
                              <select id="municipio" class="form-control">
                              <option disabled selected>Seleccionar Municipio</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2">
            	           <button type="button" class="btn btn-primary btn-block" onclick=filtrar()>Filtrar</button>
            	        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div id="boxlist">
                                     <table id="tablelist" class=" d-none table table-sm table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Precio (€/L)</th>
                                                <th class="text-center">Centrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <p class="text-center"><strong id="LUP"></strong></p>
                                    </div>
                                    <div id="boxmap" class="card col-md-12">
                                        <div class="card-body" id="mapid"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                    <p class="text-center"><strong>Seleccione un tipo de gasolina:</strong></p>
                    </div>
                        <div class="col-md-12">
                            <div class="cc-selector">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-auto">
                                    <input id="PrecioGasolina95" type="radio" name="Fuel-card" value="PrecioGasolina95" checked />
                                    <label class="drinkcard-cc PrecioGasolina95"for="PrecioGasolina95"></label>
                                </div>
                                <div class="col-auto">
                                    <input id="PrecioGasolina98" type="radio" name="Fuel-card" value="PrecioGasolina98" />
                                    <label class="drinkcard-cc PrecioGasolina98" for="PrecioGasolina98"></label>
                                </div>
                                <div class="col-auto">
                                    <input id="PrecioGasoleoA" type="radio" name="Fuel-card" value="PrecioGasoleoA" />
                                    <label class="drinkcard-cc PrecioGasoleoA"for="PrecioGasoleoA"></label>
                                </div>
                                <div class="col-auto">
                                    <input id="PrecioGasoleoB" type="radio" name="Fuel-card" value="PrecioGasoleoB" />
                                    <label class="drinkcard-cc PrecioGasoleoB"for="PrecioGasoleoB"></label>
                                </div>
                                <div class="col-auto">
                                    <input id="PrecioBiodiesel" type="radio" name="Fuel-card" value="PrecioBiodiesel" />
                                    <label class="drinkcard-cc PrecioBiodiesel"for="PrecioBiodiesel"></label>
                                </div>
                                <div class="col-auto">
                                    <input id="PrecioBioetanol" type="radio" name="Fuel-card" value="PrecioBioetanol" />
                                    <label class="drinkcard-cc PrecioBioetanol"for="PrecioBioetanol"></label>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
	</div>
</div>

<footer id="footer" class="d-flex-column text-center">
  <hr class="mt-0">
  <div class="container text-center">
      <small>Copyright &copy; Dylan</small>
    </div>
</footer>
@endsection
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<style>
    #mapid { min-height: 500px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>
    <scrip src="{{ asset('js/clustermarkersVAR.js') }}"></script>
<script>

    $( "#provincia" ).prop( "disabled", true );
    $( "#municipio" ).prop( "disabled", true );

    $( "#comarca" ).change(function() {
        var provinciasjs = @json($provincias);
        var comarcaAct=$("#comarca").val();
        var isDisabled = $('municipio').prop('disabled');
        $("#provincia").children().slice(1).remove();
        $("#municipio").children().slice(1).remove();
        var o = new Option("Todas","Todas");
        $(o).html("Todas");
        $("#provincia").append(o);
        for(var d=0;d<provinciasjs.length;d++){
            if(provinciasjs[d].id_comarca==comarcaAct){
                var o = new Option(provinciasjs[d].nombre,provinciasjs[d].id);
                $(o).html(provinciasjs[d].nombre);
                $("#provincia").append(o);
            }
        }
        $("#provincia").prop("disabled", false );
        if(!isDisabled){
            $('#provincia').trigger('change');
        }
    });


    $( "#provincia" ).change(function() {
        var municipiosjs = @json($municipios);
        var provinciaAct=$("#provincia").val();
        $("#municipio").children().slice(1).remove();
        var u = new Option("Todas","Todas");
        $(u).html("Todas");
        $("#municipio").append(u);
        for(var y=0;y<municipiosjs.length;y++){
            if(municipiosjs[y].id_provincia==provinciaAct){
                var u = new Option(municipiosjs[y].nombre,municipiosjs[y].id);
                $(u).html(municipiosjs[y].nombre);
                $("#municipio").append(u);
            }
        }
        $("#municipio").prop("disabled", false );
    });

    var AGLA = new L.icon({iconUrl: '{{ asset("icons/AGLA.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var ALCAMPO = new L.icon({iconUrl: '{{ asset("icons/ALCAMPO.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var AVANZAOIL = new L.icon({iconUrl: '{{ asset("icons/AVANZAOIL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var AVIA = new L.icon({iconUrl: '{{ asset("icons/AVIA.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var BALLENOIL = new L.icon({iconUrl: '{{ asset("icons/BALLENOIL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var BONAREA = new L.icon({iconUrl: '{{ asset("icons/BONAREA.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var BP = new L.icon({iconUrl: '{{ asset("icons/BP.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var CAMPSA = new L.icon({iconUrl: '{{ asset("icons/CAMPSA.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var CARREFOUR = new L.icon({iconUrl: '{{ asset("icons/CARREFOUR.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var CEPSA = new L.icon({iconUrl: '{{ asset("icons/CEPSA.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var DISA = new L.icon({iconUrl: '{{ asset("icons/DISA.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var EROSKI = new L.icon({iconUrl: '{{ asset("icons/EROSKI.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var ESCLATOIL = new L.icon({iconUrl: '{{ asset("icons/ESCLATOIL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var GALP = new L.icon({iconUrl: '{{ asset("icons/GALP.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var GASEXPRESS = new L.icon({iconUrl: '{{ asset("icons/GASEXPRESS.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var IBERDOEX = new L.icon({iconUrl: '{{ asset("icons/IBERDOEX.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var MEROIL = new L.icon({iconUrl: '{{ asset("icons/MEROIL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var NATURGY = new L.icon({iconUrl: '{{ asset("icons/NATURGY.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var OTROS = new L.icon({iconUrl: '{{ asset("icons/OTROS.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var PETREM = new L.icon({iconUrl: '{{ asset("icons/PETREM.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var PETRONOR = new L.icon({iconUrl: '{{ asset("icons/PETRONOR.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var PETROPRIX = new L.icon({iconUrl: '{{ asset("icons/PETROPRIX.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var PLENOIL = new L.icon({iconUrl: '{{ asset("icons/PLENOIL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var Q8 = new L.icon({iconUrl: '{{ asset("icons/Q8.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var REPSOL = new L.icon({iconUrl: '{{ asset("icons/REPSOL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var SHELL = new L.icon({iconUrl: '{{ asset("icons/SHELL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var TAMOIL = new L.icon({iconUrl: '{{ asset("icons/TAMOIL.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});
    var VALCARCE = new L.icon({iconUrl: '{{ asset("icons/VALCARCE.png") }}',iconSize:[50, 50],iconAnchor: [25, 51],popupAnchor: [0, -49],});



    var map = L.map('mapid').setView([40.4165001 , -3.7025599], 6);
    var baseUrl = "{{ url('/') }}";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 6,
        maxZoom:15,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var arrayClusters = new Array (52);

    for(var i=0;i<arrayClusters.length;i++){
        arrayClusters[i] = new L.MarkerClusterGroup({disableClusteringAtZoom: 15});
     }
   

    axios.get('{{ route('api.gasolineras.index') }}')
    .then(function (response) {
        for (var i = 0; i < response.data.features.length; i++) {
            var procesado = parseInt(response.data.features[i].properties.IDProvincia)-1;
            var iconomarca = crearmarker(response.data.features[i].properties.Rotulo);
            
            //console.log(procesado[0])
            this.arrayClusters[procesado].addLayer(new L.marker([parseFloat(response.data.features[i].properties.Latitud), parseFloat(response.data.features[i].properties.Longitud)], {icon:iconomarca }).bindPopup("<h2 class='text-center'>Información</h2><table id='tablePreview' class='table table-sm table-bordered table-striped table-hover'> <tbody> <tr> <td><strong>Nombre</strong></td> <td>"+response.data.features[i].properties.Rotulo+"</td> </tr><tr> <td><strong>CP</strong></td> <td>"+response.data.features[i].properties.CP+"</td> </tr> <tr> <td><strong>Direccion</strong></td> <td>"+response.data.features[i].properties.Direccion+"</td> </tr> <tr> <td><strong>Horario</strong></td> <td>"+response.data.features[i].properties.Horario+"</td> </tr> <tr> <td><strong>Gasolina 95</strong></td> <td>"+response.data.features[i].properties.PrecioGasolina95+"</td> </tr> <tr> <td><strong>Gasolina 98</strong></td> <td>"+response.data.features[i].properties.PrecioGasolina98+"</td> </tr> <tr> <td><strong>Gasoleo A</strong></td> <td>"+response.data.features[i].properties.PrecioGasoleoA+"</td> </tr><tr> <td><strong>Gasoleo B</strong></td> <td>"+response.data.features[i].properties.PrecioGasoleoB+"</td> </tr> <tr> <td><strong>Biodiesel</strong></td> <td>"+response.data.features[i].properties.PrecioBiodiesel+"</td> </tr> <tr> <td><strong>Bioetanol</strong></td> <td>"+response.data.features[i].properties.PrecioBioetanol+"</td> </tr> </tbody> </table>"));
        };
    })
    .catch(function (error) {
        console.log(error);
    });


    function filtrar(){

        var comarca = document.getElementById('comarca').value;
        var provincia = document.getElementById('provincia').value;
        var municipio = document.getElementById('municipio').value;
        var gasolina = document.querySelector('input[name="Fuel-card"]:checked').value;


        

        $("#boxlist").addClass( "col-md-3" );
        $("#boxmap").removeClass( "col-md-12" ).addClass( "col-md-9" );
        $("#tablelist").removeClass( "d-none" )
        $('#tablelist > tbody').children().remove();

        axios.get("/api/filtro?comarca="+comarca+"&provincia="+provincia+"&municipio="+municipio+"&gasolina="+gasolina)
        .then(function (response) {
            for (var i = 0; i < response.data.features.length; i++) {

                if(i<10){
                    if(i==0){
                        CentrarCluster(response.data.features[i].properties.Latitud,response.data.features[i].properties.Longitud);
                        $('#LUP').text("Datos Actualizados: "+(response.data.features[i].properties.created_at).substring(0,10))
                    }
                    var iconolista='icons/'+response.data.features[i].properties.Rotulo+'.png';
                    var iconoerror='icons/OTROS.png';
                    for(var k=0;response.data.features[i].properties.length;k++){
                        console.log(response.data.features[i].properties[k]);
                    }
                    $('#tablelist > tbody:last-child').append('<tr><td>'+response.data.features[i].properties.Rotulo+'</td> <td>'+response.data.features[i].properties[gasolina]+'</td> <td class="text-center"> <a href="#" onclick="CentrarGasolinera('+response.data.features[i].properties.Latitud+','+response.data.features[i].properties.Longitud+');return false;">Mostrar</a> </td> </tr>');
                }
                var procesado = parseInt(response.data.features[i].properties.IDProvincia)-1;
                var iconomarca = crearmarker(response.data.features[i].properties.Rotulo);

                this.arrayClusters[procesado].addLayer(new L.marker([parseFloat(response.data.features[i].properties.Latitud), parseFloat(response.data.features[i].properties.Longitud)], {icon:iconomarca }).bindPopup("<h2 class='text-center'>Información</h2><table id='tablePreview' class='table table-sm table-bordered table-striped table-hover'> <tbody> <tr> <td><strong>Nombre</strong></td> <td>"+response.data.features[i].properties.Rotulo+"</td> </tr><tr> <td><strong>CP</strong></td> <td>"+response.data.features[i].properties.CP+"</td> </tr> <tr> <td><strong>Direccion</strong></td> <td>"+response.data.features[i].properties.Direccion+"</td> </tr> <tr> <td><strong>Horario</strong></td> <td>"+response.data.features[i].properties.Horario+"</td> </tr> <tr> <td><strong>"+gasolina+"</strong></td> <td>"+response.data.features[i].properties[gasolina]+"</td> </tr> </tbody> </table>"));
            };
        })
        .catch(function (error) {
            console.log(error);
        });



        limpiarlayers();
    }

    function CentrarGasolinera(x,y){
         map.flyTo([x, y], 15)
    }

    function CentrarCluster(x,y){
        if((document.getElementById('comarca').value)=="Todas" && (document.getElementById('provincia').value)=="Todas" && (document.getElementById('municipio').value)=="Todas"){
         map.flyTo([x, y], 6)
        }
        else if((document.getElementById('provincia').value)=="Todas" && (document.getElementById('municipio').value)=="Todas"){
         map.flyTo([x, y], 6)
        }
        else if((document.getElementById('municipio').value)=="Todas"){
            map.flyTo([x, y], 8)
        }
        else{
            map.flyTo([x, y], 11)
        }
    }

    function limpiarlayers(){
        for(var i=0;i<arrayClusters.length;i++){
        arrayClusters[i].clearLayers();
        }
    }

    function crearmarker(rotulo){


        switch (rotulo) {
                case "REPSOL":
                    var icon = REPSOL;
                    break;
                case "CEPSA":
                    var icon = CEPSA;
                    break;
                case "GALP":
                    var icon = GALP;
                    break;
                case "SHELL":
                    var icon = SHELL;
                    break;
                case "BP":
                    var icon = BP;
                    break;
                case "PETRONOR":
                    var icon = PETRONOR;
                    break;
                case "AVIA":
                    var icon = AVIA;
                    break;
                case "CARREFOUR":
                    var icon = CARREFOUR;
                    break;
                case "BALLENOIL":
                    var icon = BALLENOIL;
                    break;
                case "CAMPSA":
                    var icon = CAMPSA;
                    break;
                case "Q8":
                    var icon = Q8;
                    break;
                case "PETROPRIX":
                    var icon = PETROPRIX;
                    break;
                case "BONAREA":
                    var icon = BONAREA;
                    break;
                case "VALCARCE":
                    var icon = VALCARCE;
                    break;
                case "ESCLATOIL":
                    var icon = ESCLATOIL;
                    break;
                case "AGLA":
                    var icon = AGLA;
                    break;
                case "ALCAMPO":
                    var icon = ALCAMPO;
                    break;
                case "EROSKI":
                    var icon = EROSKI;
                    break;
                case "MEROIL":
                    var icon = MEROIL;
                    break;
                case "GASEXPRESS":
                    var icon = GASEXPRESS;
                    break;
                case "PLENOIL":
                    var icon = PLENOIL;
                    break;
                case "DISA":
                    var icon = DISA;
                    break;
                case "TAMOIL":
                    var icon = TAMOIL;
                    break;
                case "IBERDOEX":
                    var icon = IBERDOEX;
                    break;
                case "NATURGY":
                    var icon = NATURGY;
                    break;
                case "PETREM":
                    var icon = PETREM;
                    break;
                case "AVANZA OIL":
                    var icon = AVANZAOIL;
                    break;
                case "AVANZA":
                        var icon = AVANZAOIL;
                    break;
                default:
                    var icon = OTROS;
                    break;
            }

            return icon;

    }
   
   for(var i=0;i<arrayClusters.length;i++){
    arrayClusters[i].addTo(map);
   }

</script>
@endpush