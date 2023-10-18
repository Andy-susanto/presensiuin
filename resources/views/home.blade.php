@extends('layouts.base')
@section('title', 'Presensi Online UIN JAMBI')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        canvas {
            position: absolute;
            top: 15%;
            left: 35%;
        }

        #mapid {
            aspect-ratio: 1/1;
            width: 100%;
            border-radius: 10px;
            z-index: 0;
        }

        @media only screen and (max-width: 600px) {
            canvas {
                position: absolute;
                top: 0%;
                left: -28%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="flex flex-wrap items-center space-x-4 justify-center mx-auto md:p-4">
        <div
            class="min-w-lg max-w-lg -mt-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
            <div class="flex mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <button data-popover-target="popover-default">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    Catatan Presensi
                </button>
                <div data-popover id="popover-default" role="tooltip"
                    class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                    <div
                        class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Catatan Presensi</h3>
                    </div>
                    <div class="px-3 py-2">
                        <div>
                            <ul class="mt-1.5 ml-4 list-disc list-inside text-xs">
                                <li>Jam Kerja : </li>
                                <li>Senin - Kamis : Pagi (06:00 - 09:00), Sore (16:00 - 21:00)</li>
                                <li>Ju'mat : Pagi (06:00 - 09:00), Sore (16:30 - 21:00)</li>
                                <li>Harap tunjukan wajah secara menyeluruh ketika presensi</li>
                                <li>Password yang di maksud adalah password anda ketika login</li>
                            </ul>
                        </div>
                    </div>
                    <div data-popper-arrow></div>
                </div>
            </div>
            <div id="loading-video"
                class="hidden px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">
                Sedang Memuat Modul Video...</div>

            <video class="w-full" autoplay id="video" width="400" height="400">
            </video>
        </div>
    </div>
    <div class="md:flex flex-wrap items-center justify-center max-w-screen-sm mx-auto p-4">
        <!-- Base -->
        <button id="refresh" type="button"
            class="sm:block hidden mt-2 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            Refresh Module Video
        </button>
        <select id="pegawai_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value=""></option>
            @foreach ($pegawais as $pegawai)
                <option value="{{ $pegawai->id }}">{{ $pegawai->nama_lengkap }}</option>
            @endforeach
        </select>
        <input id="password" type="password" class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Password">
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="long" id="long">
        <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" type="button"
            class="sm:block hidden capture mt-2 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
            </svg>
            Lakukan Presensi
        </button>
        <div id="extralarge-modal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-7xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Data Presensi Anda
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="extralarge-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div>
                        <div class="flex flex-wrap items-center space-x-4 justify-center mx-auto md:p-4">
                            <div
                                class="max-w-lg min-w-lg p-6 bg-white drop-shadow-sm border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <canvas style="position:static;" id="imageCapture" class="max-w-full h-auto" width="640"
                                    height="480"></canvas>
                                <p class="font-bold mt-2 mb-2">Lokasi Anda</p>
                                <div class="max-w-full h-auto" id="mapid"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="extralarge-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tutup</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="fixed bottom-navigation md:hidden sm:hidden lg:hidden">
        <div
            class="fixed z-50 w-full h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
                <button data-tooltip-target="tooltip-home" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="sr-only">Home</span>
                </button>
                <div id="tooltip-home" role="tooltip"
                    class="fixed z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Home
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-wallet" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                    </svg>

                    <span class="sr-only">Pengaduan</span>
                </button>
                <div id="tooltip-wallet" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Pengaduan
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="flex items-center justify-center">
                    <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                        data-tooltip-target="tooltip-new" type="button"
                        class="capture inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                        </svg>
                        <span class="sr-only">Lakukan Presensi</span>
                    </button>
                </div>
                <div id="tooltip-new" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Lakukan Presensi
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-settings" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 12.25V1m0 11.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M4 19v-2.25m6-13.5V1m0 2.25a2.25 2.25 0 0 0 0 4.5m0-4.5a2.25 2.25 0 0 1 0 4.5M10 19V7.75m6 4.5V1m0 11.25a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5ZM16 19v-2" />
                    </svg>
                    <span class="sr-only">Settings</span>
                </button>
                <div id="tooltip-settings" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Settings
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <a href="{{ route('filament.admin.auth.login') }}" data-tooltip-target="tooltip-profile" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>

                    <span class="sr-only">Login</span>
                </a>
                <div id="tooltip-profile" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Login
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/face-api.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/canvas-toBlob.js') }}"></script>
    <script src="{{ asset('assets/js/FileSaver.js') }}"></script>
    <script>
        $('#pegawai_id').select2({
            placeholder: "Pilih Nama Pegawai",
            allowClear: true
        });
    </script>
    <script>
        const video = document.getElementById("video");
        $('#loading-video').removeClass('hidden');
        $('#pegawai_id').attr('disabled', 'disabled');
        $('.capture').attr('disabled', 'disabled');
        Promise.all([
            /*faceapi.nets.ssdMobilenetv1.loadFromUri("/models"),
            faceapi.nets.faceRecognitionNet.loadFromUri("/models"),
            faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
            console.log('sedang Loading')*/
        ]).then(startWebcam).then(hideLoading);
        $('#refresh').on('click', function() {
            location.reload();
        })

        function hideLoading() {
            $('#loading-video').addClass('hidden');
            $('#pegawai_id').removeAttr('disabled');
            $('.capture').removeAttr('disabled');
        }

        function startWebcam() {
            navigator.mediaDevices
                .getUserMedia({
                    video: {
                        width: 400,
                        height: 400
                    },
                    audio: false,
                })
                .then((stream) => {
                    video.srcObject = stream;
                })
                .catch((error) => {
                    console.error(error);
                });
        }

        function getLabeledFaceDescriptions() {
            const labels = {!! json_encode($label) !!}
            return Promise.all(
                labels.map(async (data) => {
                    const descriptions = [];
                    const img = await faceapi.fetchImage(`./storage/${data.foto}`);
                    const detections = await faceapi
                        .detectSingleFace(img)
                        .withFaceLandmarks()
                        .withFaceDescriptor();
                    descriptions.push(detections.descriptor);
                    return new faceapi.LabeledFaceDescriptors(data.nama_lengkap, descriptions);
                })
            );
        }

        async function faceRecognition() {
            const labeledFaceDescriptors = await getLabeledFaceDescriptions();
            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors);
            video.addEventListener("play", () => {
                const canvas = faceapi.createCanvasFromMedia(video);
                document.body.append(canvas);

                const displaySize = {
                    width: 600,
                    height: 400
                };
                faceapi.matchDimensions(canvas, displaySize);
                setInterval(async () => {
                    const detections = await faceapi
                        .detectAllFaces(video)
                        .withFaceLandmarks()
                        .withFaceDescriptors();

                    const resizedDetections = faceapi.resizeResults(detections, displaySize);

                    canvas.getContext("2d").clearRect(0, 0, canvas.width, canvas.height);

                    const results = resizedDetections.map((d) => {
                        return faceMatcher.findBestMatch(d.descriptor);
                    });
                    results.forEach((result, i) => {
                        console.log(result['_label'])
                        const box = resizedDetections[i].detection.box;
                        const drawBox = new faceapi.draw.DrawBox(box, {
                            label: result,
                        });
                        drawBox.draw(canvas);
                    });
                }, 100);
            });
        }

        // javascript function to get longitude and latitude
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showMap, showError);
            } else {

                alert('Your device is not support!');
            }
        }

        // fill the latitude and longitude form with this function
        function showPosition(data) {

            document.getElementById('lat').value = data.coords.latitude
            document.getElementById('long').value = data.coords.longitude
        }


        // javascript function to show error
        function showError(error) {

            let error_message = ''

            switch (error.code) {
                case error.PERMISSION_DENIED:
                    error_message = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    error_message = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    error_message = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    error_message = "An unknown error occurred."
                    break;
            }

            alert(error_message)
        }

        function inputClear() {
            $('input').val('');
        }


        var mymap = ''

        function showMap(data) {

            //remove map and render the new map
            if (mymap) {
                mymap.off();
                mymap.remove();
                mymap = undefined
            }

            //make map area
            mymap = L.map("mapid").setView(
                [data.coords.latitude, data.coords.longitude],
                13
            );

            //setting maps using api mapbox not google maps, register and get tokens
            L.tileLayer(
                "https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: "mapbox/streets-v11",
                    tileSize: 512,
                    zoomOffset: -1,
                }
            ).addTo(mymap);


            //add marker position with variabel latitude and longitude
            L.marker([
                    data.coords.latitude, data.coords.longitude
                ])
                .addTo(mymap)
                .bindPopup("Location");
            showPosition(data);
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.capture').on('click', function() {
            var videoElement = document.getElementById('video');
            var canvas = document.getElementById('imageCapture');
            var context = canvas.getContext('2d');
            context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
            var imageData = canvas.toDataURL('image/png');
            // canvas.toBlob(function(blob) {
            //     // Save the file...
            //     saveAs(blob, 'my-image.png')
            // }, "image/png", 0.95);
            var pegawai = $("#pegawai_id").val();
            var password = $("#password").val();
            getLocation();
            if (pegawai != null || pegawai != '' || password != '' || password != null) {
                var lat = $('#lat').val();
                var long = $('#long').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "{{ route('presensi') }}",
                    data: {
                        pegawai_id: pegawai,
                        foto_presensi: imageData,
                        lat: lat,
                        long: long,
                        password:password
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Berhasil !',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            })
                        } else if (data.status == 'error') {
                            Swal.fire({
                                title: 'Gagal !',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                })
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Anda Belum memilih pegawai atau mengisikan password',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
            inputClear()
        });
    </script>
@endsection
