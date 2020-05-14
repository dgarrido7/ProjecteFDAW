@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
                <div class="card">
                    <div class="card-body" id="mapid"></div>
                </div>
			</div>
		</div>
	</div>
</div>

<div class="container">

<div class="row">
				<div class="col-md-8">
                    <form>
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
                        </div>
                    </form>
				</div>
				<div class="col-md-4">
					<h2>
						Heading
					</h2>
					<p>
						Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
					</p>
					<p>
						<a class="btn" href="#">View details »</a>
					</p>
				</div>
			</div>

</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
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
        console.log(response.data.features[0].properties);

        
    

        for (var i = 0; i < response.data.features.length; i++) {
            var procesado = response.data.features[i].properties.Provincia;
            procesado = procesado.split(" ", 1);
            console.log(procesado[0])
            this[procesado[0]].addLayer(new L.marker([parseFloat(response.data.features[i].properties.Latitud), parseFloat(response.data.features[i].properties.Longitud)]).bindPopup("hola"));
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