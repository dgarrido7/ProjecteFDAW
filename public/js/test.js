

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