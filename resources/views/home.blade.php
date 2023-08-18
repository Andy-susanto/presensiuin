@extends('layouts.base')
@section('title', 'Presensi Online UIN JAMBI')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/clock.css') }}">
    <style>
        canvas {
            position: absolute;
            top: 17%;
            left: 17%;
        }
    </style>
@endsection
@section('content')
    <main class="container items-center space-x-4 justify-center mx-auto p-4 flex flex-col lg:flex-row gap-8 lg:gap-10">
        <div class="hidden">
            <article
                class="relative w-48 h-48 lg:w-56 lg:h-56 xl:w-60 xl:h-60 inline-grid place-content-center text-center border-8 border-[#191919] rounded-full before:rounded-full after:rounded-full after:absolute before:absolute before:-inset-2 pie no-round"
                style="--p: 20; --c: rgba(253, 41, 112, 1)">
                <span
                    class="absolute inset-0 w-full h-full before:absolute before:inset-0 before:w-7 before:h-7 before:left-[4.5rem] lg:before:left-24 before:-top-4 before:bg-hours before:rounded-full transition-all duration-500 dot"
                    id="dot-hour"></span>
                <h3 class="font-bold text-base lg:text-lg xl:text-xl flex flex-col gap-1 lg:gap-3">
                    <span class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl" id="hour"></span>
                    <span>JAM</span>
                </h3>
            </article>
            <article
                class="relative w-48 h-48 lg:w-56 lg:h-56 xl:w-60 xl:h-60 inline-grid place-content-center text-center border-8 border-[#191919] rounded-full before:rounded-full after:rounded-full after:absolute before:absolute before:-inset-2 pie no-round"
                style="--p: 20; --c: rgba(252, 230, 0, 1)">
                <span
                    class="absolute inset-0 w-full h-full before:absolute before:inset-0 before:w-7 before:h-7 before:left-[4.5rem] lg:before:left-24 before:-top-4 before:bg-minutes before:rounded-full transition-all duration-500 dot"
                    id="dot-minute"></span>
                <h3 class="font-bold text-base lg:text-lg xl:text-xl flex flex-col gap-1 lg:gap-3">
                    <span class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl" id="minutes"></span>
                    <span>MENIT</span>
                </h3>
            </article>
            <article
                class="relative w-48 h-48 lg:w-56 lg:h-56 xl:w-60 xl:h-60 inline-grid place-content-center text-center border-8 border-[#191919] rounded-full before:rounded-full after:rounded-full after:absolute before:absolute before:-inset-2 pie no-round"
                style="--p: 20; --c: rgba(6, 252, 63, 1)">
                <span
                    class="absolute inset-0 w-full h-full before:absolute before:inset-0 before:w-7 before:h-7 before:left-[4.5rem] lg:before:left-24 before:-top-4 before:bg-seconds before:rounded-full transition-all duration-500 dot"
                    id="dot-second"></span>
                <h3 class="font-bold text-base lg:text-lg xl:text-xl flex flex-col gap-1 lg:gap-3">
                    <span class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl" id="seconds"></span>
                    <span>DETIK</span>
                </h3>
            </article>
        </div>
        {{-- <article class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl lg:relative absolute right-5" id="ampm">
            PM
        </article> --}}
    </main>
    {{-- <div class="flex flex-wrap items-center space-x-4 justify-center mx-auto md:p-4">
        <div
            class="hidden max-w-lg min-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <h3 class="font-bold underline underline-offset-2">TOP 10 Presensi Hari Ini</h3>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Pegawai
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Presensi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jam Presensi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Andy Susanto
                            </th>
                            <td class="px-6 py-4">
                                Jam 1
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-green-300 text-white p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    08:00</span>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Paijo
                            </th>
                            <td class="px-6 py-4">
                                Jam 1
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-red-300 text-white p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>

                                    10:00</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div
            class="hidden min-w-lg max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">

            <div id="loading-video"
                class="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">
                Sedang Memuat Modul Video...</div>

            <video class="w-full" autoplay id="video">
            </video>
        </div>
        <div
            class="max-w-lg min-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <canvas style="position:static;" id="imageCapture" class="max-w-full h-auto" width="640"
                height="480"></canvas>
        </div>
    </div>
    <div class="md:flex flex-wrap items-center justify-center max-w-screen-sm mx-auto p-4 hidden">
        <div
            class="hidden max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div role="status" class="space-y-8 md:space-y-0 md:space-x-8 md:flex md:items-center">
                <div class="flex items-center justify-center w-full h-48 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                    <svg class="w-10 h-10 text-gray-200 dark:text-gray-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                    </svg>
                </div>
                <div class="w-full">
                    <div class="h-2.5 mb-4 font-xs font-bold text-gray-600">Nama Lengkap</div>
                    <div class="h-2.5 mb-4 font-xs font-bold text-gray-600">87123xxxxx</div>
                    <div class="h-2.5 mb-4 font-xs font-bold text-gray-600">Tenaga Kontrak</div>
                    <div class="h-2.5 mb-4 font-xs font-bold text-gray-600">Fakultas Sains dan Teknologi</div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <select id="nama_pegawai"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Nama Pegawai</option>
            @foreach ($pegawais as $pegawai)
                <option value="">{{ $pegawai->nama_lengkap }}</option>
            @endforeach
        </select>
        <button id="capture" type="button"
            class="mt-2 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 inline-block">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
            </svg>
            Lakukan Presensi
        </button>
    </div> --}}
    <div class="bottom-navigation md:hidden sm:hidden lg:hidden">
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
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Home
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-tooltip-target="tooltip-wallet" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z" />
                        <path
                            d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z" />
                    </svg>
                    <span class="sr-only">Wallet</span>
                </button>
                <div id="tooltip-wallet" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Wallet
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="flex items-center justify-center">
                    <button data-tooltip-target="tooltip-new" type="button"
                        class="inline-flex items-center justify-center w-10 h-10 font-medium bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
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
                    Create new item
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
                <button data-tooltip-target="tooltip-profile" type="button"
                    class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    <span class="sr-only">Profile</span>
                </button>
                <div id="tooltip-profile" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Profile
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/face-api.js') }}"></script>
    <script src="{{ asset('assets/js/clock.js') }}"></script>
    <script>
        $('#nama_pegawai').select2();
    </script>
    <script>
        const video = document.getElementById("video");
        Promise.all([
            faceapi.nets.ssdMobilenetv1.loadFromUri("/models"),
            faceapi.nets.faceRecognitionNet.loadFromUri("/models"),
            faceapi.nets.faceLandmark68Net.loadFromUri("/models"),
            console.log('sedang Loading')
        ]).then(startWebcam).then(faceRecognition).then(hideLoading);

        function hideLoading() {
            $('#loading-video').addClass('hidden');
        }

        function startWebcam() {
            navigator.mediaDevices
                .getUserMedia({
                    video: true,
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
            const labels = ["Andy Susanto, S.Kom", "Iqmal"];
            return Promise.all(
                labels.map(async (label) => {
                    const descriptions = [];
                    for (let i = 1; i <= 1; i++) {
                        const img = await faceapi.fetchImage(`./labels/${label}/${i}.jpg`);
                        const detections = await faceapi
                            .detectSingleFace(img)
                            .withFaceLandmarks()
                            .withFaceDescriptor();
                        descriptions.push(detections.descriptor);
                    }
                    return new faceapi.LabeledFaceDescriptors(label, descriptions);
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

        $('#capture').on('click', function() {
            var videoElement = document.getElementById('video');
            var canvas = document.getElementById('imageCapture');
            var context = canvas.getContext('2d');
            // Draw the current video frame onto the canvas
            context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
            // Get the base64-encoded image data from the canvas
            var imageData = canvas.toDataURL('image/png');
        });
    </script>
@endsection
