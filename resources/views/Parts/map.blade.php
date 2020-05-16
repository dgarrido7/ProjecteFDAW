@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron p-0">
                <form>
                    <div class="row align-items-center justify-content-center">
                    <div class="col-md-2 pt-3">
                           <div class="form-group ">
                              <select id="inputState " class="form-control">
                                <option selected>Brand</option>
                                <option>BMW</option>
                                <option>Audi</option>
                                <option>Maruti</option>
                                <option>Tesla</option>
                              </select>
                           </div>
                        </div>
                		<div class="col-md-2 pt-3">
                           <div class="form-group">
                              <select id="inputState" class="form-control">
                                <option selected>Model</option>
                                <option>BMW</option>
                                <option>Audi</option>
                                <option>Maruti</option>
                                <option>Tesla</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2 pt-3">
                            <div class="form-group">
                              <select id="inputState" class="form-control">
                                <option selected>Budget</option>
                                <option>BMW</option>
                                <option>Audi</option>
                                <option>Maruti</option>
                                <option>Tesla</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2 pt-3">
                            <div class="form-group">
                              <select id="inputState" class="form-control">
                                <option selected>Type</option>
                                <option>BMW</option>
                                <option>Audi</option>
                                <option>Maruti</option>
                                <option>Tesla</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-2">
            	           <button type="button" class="btn btn-primary btn-block">Search</button>
            	        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" id="mapid"></div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12">
                            <div class="cc-selector">
                                <input id="PrecioGasolina95" type="radio" name="Fuel-card" value="PrecioGasolina95" />
                                <label class="drinkcard-cc PrecioGasolina95"for="PrecioGasolina95"></label>
                                <input id="PrecioGasolina98" type="radio" name="Fuel-card" value="PrecioGasolina98" />
                                <label class="drinkcard-cc PrecioGasolina98" for="PrecioGasolina98"></label>
                                <input id="PrecioGasoleoA" type="radio" name="Fuel-card" value="PrecioGasoleoA" />
                                <label class="drinkcard-cc PrecioGasoleoA"for="PrecioGasoleoA"></label>
                                <input id="PrecioGasoleoB" type="radio" name="Fuel-card" value="PrecioGasoleoB" />
                                <label class="drinkcard-cc PrecioGasoleoB"for="PrecioGasoleoB"></label>
                                <input id="PrecioBiodiesel" type="radio" name="Fuel-card" value="PrecioBiodiesel" />
                                <label class="drinkcard-cc PrecioBiodiesel"for="PrecioBiodiesel"></label>
                                <input id="PrecioBioetanol" type="radio" name="Fuel-card" value="PrecioBioetanol" />
                                <label class="drinkcard-cc PrecioBioetanol"for="PrecioBioetanol"></label>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>

<div class="container">
       
</div>
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
    var AGLA = new L.icon({iconUrl: '{{ asset("icons/AGLA.png") }}',iconSize:[50, 50],});
    var ALCAMPO = new L.icon({iconUrl: '{{ asset("icons/ALCAMPO.png") }}',iconSize:[50, 50],});
    var AVANZAOIL = new L.icon({iconUrl: '{{ asset("icons/AVANZAOIL.png") }}',iconSize:[50, 50],});
    var AVIA = new L.icon({iconUrl: '{{ asset("icons/AVIA.png") }}',iconSize:[50, 50],});
    var BALLENOIL = new L.icon({iconUrl: '{{ asset("icons/BALLENOIL.png") }}',iconSize:[50, 50],});
    var BONAREA = new L.icon({iconUrl: '{{ asset("icons/BONAREA.png") }}',iconSize:[50, 50],});
    var BP = new L.icon({iconUrl: '{{ asset("icons/BP.png") }}',iconSize:[50, 50],});
    var CAMPSA = new L.icon({iconUrl: '{{ asset("icons/CAMPSA.png") }}',iconSize:[50, 50],});
    var CARREFOUR = new L.icon({iconUrl: '{{ asset("icons/CARREFOUR.png") }}',iconSize:[50, 50],});
    var CEPSA = new L.icon({iconUrl: '{{ asset("icons/CEPSA.png") }}',iconSize:[50, 50],});
    var DISA = new L.icon({iconUrl: '{{ asset("icons/DISA.png") }}',iconSize:[50, 50],});
    var EROSKI = new L.icon({iconUrl: '{{ asset("icons/EROSKI.png") }}',iconSize:[50, 50],});
    var ESCLATOIL = new L.icon({iconUrl: '{{ asset("icons/ESCLATOIL.png") }}',iconSize:[50, 50],});
    var GALP = new L.icon({iconUrl: '{{ asset("icons/GALP.png") }}',iconSize:[50, 50],});
    var GASEXPRESS = new L.icon({iconUrl: '{{ asset("icons/GASEXPRESS.png") }}',iconSize:[50, 50],});
    var IBERDOEX = new L.icon({iconUrl: '{{ asset("icons/IBERDOEX.png") }}',iconSize:[50, 50],});
    var MEROIL = new L.icon({iconUrl: '{{ asset("icons/MEROIL.png") }}',iconSize:[50, 50],});
    var NATURGY = new L.icon({iconUrl: '{{ asset("icons/NATURGY.png") }}',iconSize:[50, 50],});
    var OTROS = new L.icon({iconUrl: '{{ asset("icons/OTROS.png") }}',iconSize:[50, 50],});
    var PETREM = new L.icon({iconUrl: '{{ asset("icons/PETREM.png") }}',iconSize:[50, 50],});
    var PETRONOR = new L.icon({iconUrl: '{{ asset("icons/PETRONOR.png") }}',iconSize:[50, 50],});
    var PETROPRIX = new L.icon({iconUrl: '{{ asset("icons/PETROPRIX.png") }}',iconSize:[50, 50],});
    var PLENOIL = new L.icon({iconUrl: '{{ asset("icons/PLENOIL.png") }}',iconSize:[50, 50],});
    var Q8 = new L.icon({iconUrl: '{{ asset("icons/Q8.png") }}',iconSize:[50, 50],});
    var REPSOL = new L.icon({iconUrl: '{{ asset("icons/REPSOL.png") }}',iconSize:[50, 50],});
    var SHELL = new L.icon({iconUrl: '{{ asset("icons/SHELL.png") }}',iconSize:[50, 50],});
    var TAMOIL = new L.icon({iconUrl: '{{ asset("icons/TAMOIL.png") }}',iconSize:[50, 50],});
    var VALCARCE = new L.icon({iconUrl: '{{ asset("icons/VALCARCE.png") }}',iconSize:[50, 50],});



    var map = L.map('mapid').setView([40.4165001 , -3.7025599], 6);
    var baseUrl = "{{ url('/') }}";

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 6,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var ÁLAVA = new L.MarkerClusterGroup();
    var ALBACETE = new L.MarkerClusterGroup();
    var ALICANTE = new L.MarkerClusterGroup();
    var ALMERÍA = new L.MarkerClusterGroup();
    var ASTURIAS = new L.MarkerClusterGroup();
    var ÁVILA = new L.MarkerClusterGroup();
    var BADAJOZ = new L.MarkerClusterGroup();
    var BALEARS = new L.MarkerClusterGroup();
    var BARCELONA = new L.MarkerClusterGroup();
    var BURGOS = new L.MarkerClusterGroup();
    var CÁCERES = new L.MarkerClusterGroup();
    var CÁDIZ = new L.MarkerClusterGroup();
    var CANTABRIA = new L.MarkerClusterGroup();
    var CASTELLÓN = new L.MarkerClusterGroup();
    var CEUTA = new L.MarkerClusterGroup();
    var CIUDAD = new L.MarkerClusterGroup();
    var CÓRDOBA = new L.MarkerClusterGroup();
    var CORUÑA  = new L.MarkerClusterGroup();
    var CUENCA = new L.MarkerClusterGroup();
    var GIRONA = new L.MarkerClusterGroup();
    var GRANADA = new L.MarkerClusterGroup();
    var GUADALAJARA = new L.MarkerClusterGroup();
    var GUIPÚZCOA = new L.MarkerClusterGroup();
    var HUELVA = new L.MarkerClusterGroup();
    var HUESCA = new L.MarkerClusterGroup();
    var JAÉN = new L.MarkerClusterGroup();
    var LEÓN = new L.MarkerClusterGroup();
    var LLEIDA = new L.MarkerClusterGroup();
    var LUGO = new L.MarkerClusterGroup();
    var MADRID = new L.MarkerClusterGroup();
    var MÁLAGA = new L.MarkerClusterGroup();
    var MELILLA = new L.MarkerClusterGroup();
    var MURCIA = new L.MarkerClusterGroup();
    var NAVARRA = new L.MarkerClusterGroup();
    var OURENSE = new L.MarkerClusterGroup();
    var PALENCIA = new L.MarkerClusterGroup();
    var PALMAS = new L.MarkerClusterGroup();
    var PONTEVEDRA = new L.MarkerClusterGroup();
    var RIOJA = new L.MarkerClusterGroup();
    var SALAMANCA = new L.MarkerClusterGroup();
    var SANTA = new L.MarkerClusterGroup();
    var SEGOVIA = new L.MarkerClusterGroup();
    var SEVILLA = new L.MarkerClusterGroup();
    var SORIA = new L.MarkerClusterGroup();
    var TARRAGONA = new L.MarkerClusterGroup();
    var TERUEL = new L.MarkerClusterGroup();
    var TOLEDO = new L.MarkerClusterGroup();
    var VALENCIA = new L.MarkerClusterGroup();
    var VALLADOLID = new L.MarkerClusterGroup();
    var VIZCAYA = new L.MarkerClusterGroup();
    var ZAMORA = new L.MarkerClusterGroup();
    var ZARAGOZA = new L.MarkerClusterGroup();
    



    axios.get('{{ route('api.gasolineras.index') }}')
    .then(function (response) {
        //console.log(response.data.features[0].properties);

        
    

        for (var i = 0; i < response.data.features.length; i++) {
            var procesado = response.data.features[i].properties.Provincia;
            var iconomarca = REPSOL;
            switch (response.data.features[i].properties.Rotulo) {
                case "REPSOL":
                    var iconomarca = REPSOL;
                    break;
                case "CEPSA":
                    var iconomarca = CEPSA;
                    break;
                case "GALP":
                    var iconomarca = GALP;
                    break;
                case "SHELL":
                    var iconomarca = SHELL;
                    break;
                case "BP":
                    var iconomarca = BP;
                    break;
                case "PETRONOR":
                    var iconomarca = PETRONOR;
                    break;
                case "AVIA":
                    var iconomarca = AVIA;
                    break;
                case "CARREFOUR":
                    var iconomarca = CARREFOUR;
                    break;
                case "BALLENOIL":
                    var iconomarca = BALLENOIL;
                    break;
                case "CAMPSA":
                    var iconomarca = CAMPSA;
                    break;
                case "Q8":
                    var iconomarca = Q8;
                    break;
                case "PETROPRIX":
                    var iconomarca = PETROPRIX;
                    break;
                case "BONAREA":
                    var iconomarca = BONAREA;
                    break;
                case "VALCARCE":
                    var iconomarca = VALCARCE;
                    break;
                case "ESCLATOIL":
                    var iconomarca = ESCLATOIL;
                    break;
                case "AGLA":
                    var iconomarca = AGLA;
                    break;
                case "ALCAMPO":
                    var iconomarca = ALCAMPO;
                    break;
                case "EROSKI":
                    var iconomarca = EROSKI;
                    break;
                case "MEROIL":
                    var iconomarca = MEROIL;
                    break;
                case "GASEXPRESS":
                    var iconomarca = GASEXPRESS;
                    break;
                case "PLENOIL":
                    var iconomarca = PLENOIL;
                    break;
                case "DISA":
                    var iconomarca = DISA;
                    break;
                case "TAMOIL":
                    var iconomarca = TAMOIL;
                    break;
                case "IBERDOEX":
                    var iconomarca = IBERDOEX;
                    break;
                case "NATURGY":
                    var iconomarca = NATURGY;
                    break;
                case "PETREM":
                    var iconomarca = PETREM;
                    break;
                case "AVANZA OIL":
                    var iconomarca = AVANZAOIL;
                    break;
                case "AVANZA":
                    if((response.data.features[i].properties.Municipio)=="Vilamalla"){
                        var iconomarca = AVANZAOIL;
                    }
                    else{
                        var iconomarca = OTROS;
                    }
                    
                    break;
                default:
                    var iconomarca = OTROS;
                    break;
            }

            procesado = procesado.split(" ", 1);
            //console.log(procesado[0])
            this[procesado[0]].addLayer(new L.marker([parseFloat(response.data.features[i].properties.Latitud), parseFloat(response.data.features[i].properties.Longitud)], {icon:iconomarca }).bindPopup("hola"));
        };

       // this.cluster2.addLayer(ubi);

        // var ubi  =L.geoJSON(response.data, {
        //     pointToLayer: function(geoJsonPoint, latlng) {
        //         return L.marker(latlng);
        //     }
        // })
        // .bindPopup(function (layer) {
        //     return layer.feature.properties.map_popup_content;
        // });

        // this.cluster1.addLayer(ubi);
    })
    .catch(function (error) {
        console.log(error);
    });

   
    ÁLAVA.addTo(map);
    ALBACETE.addTo(map);
    ALICANTE.addTo(map);
    ALMERÍA.addTo(map);
    ASTURIAS.addTo(map);
    ÁVILA.addTo(map);
    BADAJOZ.addTo(map);
    BALEARS.addTo(map);
    BARCELONA.addTo(map);
    BURGOS.addTo(map);
    CÁCERES.addTo(map);
    CÁDIZ.addTo(map);
    CANTABRIA.addTo(map);
    CASTELLÓN.addTo(map);
    CEUTA.addTo(map);
    CIUDAD.addTo(map);
    CÓRDOBA.addTo(map);
    CORUÑA .addTo(map);
    CUENCA.addTo(map);
    GIRONA.addTo(map);
    GRANADA.addTo(map);
    GUADALAJARA.addTo(map);
    GUIPÚZCOA.addTo(map);
    HUELVA.addTo(map);
    HUESCA.addTo(map);
    JAÉN.addTo(map);
    LEÓN.addTo(map);
    LLEIDA.addTo(map);
    LUGO.addTo(map);
    MADRID.addTo(map);
    MÁLAGA.addTo(map);
    MELILLA.addTo(map);
    MURCIA.addTo(map);
    NAVARRA.addTo(map);
    OURENSE.addTo(map);
    PALENCIA.addTo(map);
    PALMAS.addTo(map);
    PONTEVEDRA.addTo(map);
    RIOJA.addTo(map);
    SALAMANCA.addTo(map);
    SANTA.addTo(map);
    SEGOVIA.addTo(map);
    SEVILLA.addTo(map);
    SORIA.addTo(map);
    TARRAGONA.addTo(map);
    TERUEL.addTo(map);
    TOLEDO.addTo(map);
    VALENCIA.addTo(map);
    VALLADOLID.addTo(map);
    VIZCAYA.addTo(map);
    ZAMORA.addTo(map);
    ZARAGOZA.addTo(map);
</script>
@endpush