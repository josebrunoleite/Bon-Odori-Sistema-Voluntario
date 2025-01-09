<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro de Cliente com Locais Existentes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        #map {
            height: 100%;
            width: 100%;
        }

        .container-fluid {
            height: 100vh;
        }

        .map-container {
            height: 100%;
        }

        .form-container {
            height: 100%;
            overflow-y: auto;
            padding: 15px;
            background: #f8f9fa;
            border-right: 1px solid #ddd;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex">
        <!-- Formulário -->
        <div class="col-4 form-container">
            <h3>Cadastro de Cliente</h3>
            <form id="client-form" method="POST" action="{{ route('client.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <hr>
                <h5>Locais Selecionados</h5>
                <ul id="locations-list" class="list-group mb-3">
                    <!-- Locais selecionados serão inseridos aqui -->
                </ul>
                <p class="text-muted">Clique no mapa ou em pontos existentes para selecionar locais.</p>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>

        <!-- Mapa -->
        <div class="col-8 map-container">
            <div id="map"></div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ 222 }}"></script>
    <script>
        // Map configuration and state
        const mapConfig = {
            defaultLocation: {
                lat: -23.55052,
                lng: -46.633308
            },
            zoom: 12,
            userMarkerIcon: 'https://maps.gstatic.com/mapfiles/ms2/micons/green-dot.png'
        };

        class MapManager {
            constructor() {
                // Map instance
                this.map = null;
                // Array of markers
                this.markers = [];
                // Locais 
                this.locationCount = 0;
                // Locais Escolhidos
                this.selectedLocations = new Map();
            }

            async initialize() {
                const mapOptions = {
                    center: mapConfig.defaultLocation,
                    zoom: mapConfig.zoom,
                    /* 
                    Referencias Para estilo do mapa
                    https://developers.google.com/maps/documentation/javascript/style-reference?hl=pt-br#style-features
                    
                    */
                    styles: [{
                            "featureType": "poi",
                            "stylers": [{
                                    "visibility": "off"
                                } // Desabilita todos os POIs (ex: hospitais, bares, etc.)
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "stylers": [{
                                    "visibility": "off"
                                } // Desabilita POIs comerciais (ex: lojas, restaurantes, bares)
                            ]
                        },
                        {
                            // Desabilita POIs médicos (ex: hospitais)
                            "featureType": "poi.medical",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        }
                    ]
                };

                this.map = new google.maps.Map(
                    document.getElementById("map"),
                    mapOptions
                );

                const userPosition = await this.getCurrentPosition();
                if (userPosition) {
                    this.map.setCenter(userPosition);
                    this.addUserMarker(userPosition);
                }

                await this.loadExistingPoints();
            }


            // Obtém a posição atual do usuário
            async getCurrentPosition() {
                if (!navigator.geolocation) return null;

                try {
                    const position = await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(resolve, reject);
                    });

                    return {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                } catch {
                    return null;
                }
            }

            // Adiciona um marcador na posição do usuário
            addUserMarker(position) {
                new google.maps.Marker({
                    position,
                    map: this.map,
                    title: "Sua localização",
                    icon: {
                        url: mapConfig.userMarkerIcon
                    }
                });
            }

            // Carrega os pontos existentes do banco de dados
            async loadExistingPoints() {
                try {
                    const response = await fetch("/api/points");
                    if (!response.ok) throw new Error("Falha ao carregar pontos");

                    const points = await response.json();
                    points.forEach(point => this.addExistingMarker(point));
                } catch (error) {
                    console.error("Erro ao carregar pontos:", error);
                }
            }

            addExistingMarker(point) {
                const position = {
                    lat: parseFloat(point.latitude),
                    lng: parseFloat(point.longitude)
                };

                // Cria o marcador no mapa
                const marker = new google.maps.Marker({
                    position,
                    map: this.map,
                    title: point.name
                });

                // Vincula a janela de informações do marcador
                const infoWindow = new google.maps.InfoWindow({
                    content: this.createInfoWindowContent(point)
                });

                //Adiciona eventos de clique ao marcador
                marker.addListener("dblclick", () => this.toggleLocationSelection(point));

                //Abrir a janela de informações
                marker.addListener('click', () => infoWindow.open(this.map, marker));
                this.markers.push(marker);
            }

            // Cria o conteúdo da janela de informações do marcador
            createInfoWindowContent(point) {
                return `
            <div>
                <img width='100%' src="https://media.discordapp.net/attachments/1271216437750403141/1309316426091335731/23f6bdfa-99fd-4eed-9ee9-74d7cbc7e2ac.png?ex=67504cb1&is=674efb31&hm=5968037151d9da10fa24e0368fe995361df31379956fd5c73ef566aafd7c0b43&=&format=webp&quality=lossless&width=482&height=675" alt="Imagem de exemplo" width="100" height="100">
                <h6>${point.name || 'Local'}</h6>
                <p>Latitude: ${point.latitude}<br>Longitude: ${point.longitude}</p>
            </div>
        `;
            }

            toggleLocationSelection(point) {
                const id = point.id || `new-${this.locationCount}`;

                if (this.selectedLocations.has(id)) {
                    this.selectedLocations.delete(id);
                    this.removeLocationFromList(id);
                } else {
                    this.selectedLocations.set(id, point);
                    this.addLocationToList(point, id);
                }
            }

            addLocationToList(point, id) {
                const locationItem = document.createElement("li");
                locationItem.className = "list-group-item d-flex justify-content-between align-items-center";
                locationItem.dataset.index = id;
                locationItem.innerHTML = `
            <span>${point.name || `Local: Lat ${point.latitude.toFixed(6)}, Lng ${point.longitude.toFixed(6)}`}</span>
<input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
            <button type="button" class="btn btn-danger btn-sm" onclick="mapManager.removeLocation('${id}')">Remover</button>
            <input type="hidden" name="locations[${id}][latitude]" value="${point.latitude}">
            <input type="hidden" name="locations[${id}][longitude]" value="${point.longitude}">
        `;
                document.getElementById("locations-list").appendChild(locationItem);
            }

            removeLocation(id) {
                this.selectedLocations.delete(id);
                this.removeLocationFromList(id);
            }

            removeLocationFromList(id) {
                const locationItem = document.querySelector(`li[data-index="${id}"]`);
                if (locationItem) locationItem.remove();
            }
        }


        // Initialize map
        const mapManager = new MapManager();
        document.addEventListener("DOMContentLoaded", () => mapManager.initialize());
    </script>
</body>

</html>
