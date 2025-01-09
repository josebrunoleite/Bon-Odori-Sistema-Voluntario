<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mapa de Pontos - Bon Odori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        #map {
            height: 100vh;
            width: 100%;
        }

        .info-box {
            position: absolute;
            top: 4rem;
            left: 20px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            max-width: -webkit-fill-available;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }

        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
    </style>
</head>

<body>
    <div id="loading" class="loading d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Carregando...</span>
        </div>
    </div>

    <div id="map"></div>

    <div class="info-box">
        <div class="table">
            <table id="markers-table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <!-- Linhas serão preenchidas dinamicamente -->
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo5Vu0Ggw0VA5CMB3sZRU7l0bGUhvgE8U"></script>
    <script>
        // Configurações globais
        const config = {
            defaultLocation: {
                lat: -23.55052,
                lng: -46.633308
            },
            mapZoom: 12
        };

        let map;
        const markers = new Map();

        // Função para mostrar/esconder loading
        const toggleLoading = (show) => {
            document.getElementById('loading').classList.toggle('d-none', !show);
        };

        // Tratamento de erros
        const handleError = (error) => {
            console.error('Erro:', error);
            alert(`Ocorreu um erro: ${error.message || 'Erro desconhecido'}`);
        };

        // Inicializa o mapa com tratamento de erros melhorado
        async function initMap() {
            try {
                const position = await getCurrentPosition();
                const center = position || config.defaultLocation;

                map = new google.maps.Map(document.getElementById("map"), {
                    center,
                    zoom: config.mapZoom,
                    styles: [ /* Adicione estilos personalizados do mapa aqui */ ]
                });

                if (position) {
                    addUserMarker(position);
                }

                await loadPoints();
            } catch (error) {
                handleError(error);
            }
        }

        function getCurrentPosition() {
            return new Promise((resolve, reject) => {
                if (!navigator.geolocation) {
                    resolve(null);
                    return;
                }

                navigator.geolocation.getCurrentPosition(
                    (position) => resolve({
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    }),
                    () => resolve(null)
                );
            });
        }

        // Adiciona marcador do usuário
        function addUserMarker(position) {
            new google.maps.Marker({
                position,
                map,
                title: "Sua localização",
                icon: {
                    url: 'https://maps.gstatic.com/mapfiles/ms2/micons/green-dot.png'
                }
            });
        }

        // Carrega pontos com feedback visual
        async function loadPoints() {
            toggleLoading(true);
            try {
                const response = await fetch("/api/points");
                if (!response.ok) throw new Error('Falha ao carregar pontos');

                const points = await response.json();
                points.forEach(point => addMarker(point));
            } catch (error) {
                handleError(error);
            } finally {
                toggleLoading(false);
            }
        }

        // Adiciona um marcador no mapa
        function addMarker(point) {
            const marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(point.latitude),
                    lng: parseFloat(point.longitude)
                },
                map,
                title: point.name
            });

            markers.set(point.id, marker);

            function formatJSON(json) {
                return Object.entries(json)
                    .map(([key, value]) => `<strong>${key}</strong>: ${value}`)
                    .join('<br>');
            }

            const infoWindow = new google.maps.InfoWindow({
                content: `
                    <div>
                        <h5>${point.name}</h5>
                        <p>Latitude: ${point.latitude}</p>
                        <p>Longitude: ${point.longitude}</p>
                         <p>Variáveis:<br>${formatJSON(point.variables)}</p>
                        <img width='100%' src="https://media.discordapp.net/attachments/1271216437750403141/1309316426091335731/23f6bdfa-99fd-4eed-9ee9-74d7cbc7e2ac.png?ex=67504cb1&is=674efb31&hm=5968037151d9da10fa24e0368fe995361df31379956fd5c73ef566aafd7c0b43&=&format=webp&quality=lossless&width=482&height=675" alt="Imagem de exemplo" width="100" height="100">

                    </div>
                `
            });

            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });
            const tableBody = document.getElementById('markers-table').querySelector('tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${point.id}</td>
            <td>${point.name}</td>
            <td>${point.latitude}</td>
            <td>${point.longitude}</td>
        `;
            tableBody.appendChild(row);
        }


        // Inicialização
        document.addEventListener('DOMContentLoaded', () => {
            initMap();
            document.getElementById('point-form').addEventListener('submit', addPoint);
        });
    </script>
</body>

</html>
