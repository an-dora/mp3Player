<style>
    * {
        margin: 0;
        padding: 0;
    }
/* player-controller  */
    .player-control {
        background-color: #333;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 50px;
        z-index: 9999;
        box-sizing: border-box;
    }

    .card-img {
        width: 200px;
        height: 200px;
        overflow: hidden;
    }

    #audioPlayPause {
        width: 65px;
        height: 65px;
        font-size: 30px;
        background-color: rgb(88, 88, 88);
        border-radius: 50%;
        color: rgb(255, 255, 255);
        box-shadow: 2px 4px 4px #000000;
        align-items: center;
        /* display: flex; */
        flex-direction: column;
        position: absolute;
        top: -50%;
        left: 50%;
        z-index: 9999;
    }

    #audioPlayPause:hover {
        width: 67px;
        height: 67px;
        font-size: 32px;
    }

    .title-audio {
        position: relative;
        display: inline-block;
        font-size: 14px;
        color: #fff;
        font-weight: bold;
        width: fit-content;
        right: -20%;
        /* border: red 1px solid; */
    }

    .media-progress {
        display: inline-block;
        /* border: red 1px solid; */
        font-size: 14px;
        color: rgb(255, 255, 255);
        font-weight: bold;
        width: 40%;
        margin-top: 10px;
        left: 5%;
        position: relative;
    }

    #progress-time-current {
        float: left;
    }

    #progress-time-total {
        float: right;
    }

    .range {
        /* margin-top: 5px; */
        -webkit-appearance: none;
        width: 100%;
        background: transparent;
        /* margin-bottom: 20px; */
    }
/* endplayer-controller */

    .range::-webkit-slider-runnable-track {
        width: 100%;
        height: 1.5px;
        background-color: #eeee;
    }

    .range::-webkit-slider-thumb {
        -webkit-appearance: none;
        background-color: rgb(88, 88, 88);
        width: 15px;
        height: 7px;
        border-radius: 100rem;
        margin: -2px;
        box-shadow: 0 0 0 1.5px white, 0 0 0 6px rgba(100, 100, 111, 0.05);
    }

</style>
<x-layout title="Thư viện nhạc">

    <div class="container">
        <div id="playlist" class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 mx-auto">
            @foreach ($data as $item)
                <div id="song" class="aTrigger m-3 card shadow rounded col col-lg-2 col-md-3  col-sm-5" data-active=""
                    data-audio="/storage/nhac/{{ $item->filenhac }}" data-name="{{ $item->tenbai }}">
                    {{-- onclick="play({{ $item->id }})" --}}
                    <div>
                        @if ($item->filehinh)
                            <img src="/storage/hinhanh/{{ $item->filehinh }}" class="card-img w-100">
                        @else
                            <img src="/default.png" class="card-img w-100">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-truncate" data-toggle="tooltip" title="{{ $item->tenbai }}">
                                {{ $item->tenbai }}</h5>
                        </div>
                        <div style="
                        width: fit-content;
                        padding: 0 10px;
                        font-weight: bolder
                        border: 1px solid #eee;
                        border-radius: 12px;
                        font-size: 14px;
                        background-color: rgb(134, 134, 134); 
                        color:rgb(255, 255, 255);
                        ">
                            {{ $item->categorys->tentheloai ?? 'Chưa cập nhật' }}
                        </div>
                        <div class="dropdown">
                            <button style="
                            color:black;
                            border: none;
                            background: none;
                            float: right;
                            padding: 5px" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="p-1 d-flex fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $item->id }}">
                                        Xem
                                        <i class="fas fa-eye float-end"></i></a></li>

                                <li><a class="dropdown-item" href="{{ route('sua', ['id' => $item->id]) }}">Sửa <i
                                            class="fas fa-pen float-end"></i></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('xoa', ['id' => $item->id]) }}">Xoá<i
                                            class="fas fa-backspace float-end"></i></a></li>
                            </ul>
                        </div>
                        <x-modal :data="$item" />
                        <audio id="audio">
                            <source src="/storage/nhac/{{ $item->filenhac }}" id="audioSource" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">{{ $data->links() }}</div>
    </br>
    </br>
    </div>
    <div class="player-control">
        <div class="media-progress">
            <input type="range" class="range" id="range" name="range" value="0" disabled>
            <div id="progress-time-current">
                00:00
            </div>
            <div id="progress-time-total">
                00:00
            </div>
        </div>
        <span id="audioPlayPause" onclick="audioPP_click()" class="d-flex justify-content-center"><i
                class="fa fa-play"></i></span>
        <div class="title-audio">
            <label for="">Playing now: </label> <span id="audioTitle"></span>
        </div>
    </div>

</x-layout>
<script>
    var count = 0;
    var audio = document.getElementById('audio');
    var audioPlayPause = document.getElementById('audioPlayPause');
    var rangeBar = document.getElementById('range');

    function audioPP_click() {
        if (count == 0) {
            count = 1;
            audio.play();
            audioPlayPause.innerHTML = '<i class="fas fa-pause"></i>';
        } else {
            count = 0;
            audio.pause();
            audioPlayPause.innerHTML = '<i class="fas fa-play"></i>';
        }
    }
    var audioList = document.querySelectorAll('.aTrigger');
    audioList.forEach(function(audioSingle, index) {
        audioSingle.addEventListener('click', function(index) {
            thisisAudioSingle = this;
            var dataAudio = this.getAttribute('data-audio');
            var audioName = this.getAttribute('data-name');
            var dataActive = this.getAttribute('data-active');
            var audioSource = document.getElementById('audioSource');
            audioSource.src = dataAudio;
            document.getElementById('audioTitle').innerHTML = audioName.split('/').pop();;
            if (dataActive == "") {
                count = 1;
                audio.load();
                audio.play();
                this.setAttribute("data-active", "active");
                audioPlayPause.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                count = 0;
                audio.pause();
                this.setAttribute("data-active", "pause");
                audioPlayPause.innerHTML = '<i class="fas fa-play"></i>';
            }
            //Thay đổi trục tiep theo khi click vào 
            rangeBar.addEventListener('change', function() {
                audio.currentTime = rangeBar.value;
            });

            var timeTotal = document.getElementById('progress-time-total');
            setTimeout(() => {
                rangeBar.max = audio.duration;
                var s = parseInt(audio.duration % 60);
                var m = parseInt((audio.duration / 60) % 60);
                timeTotal.innerHTML = `${m < 10 ? "0" + m : m}:${s < 10 ? "0" + s : s}`;

                audio.addEventListener("timeupdate", function() {
                    var timeUpdate = document.getElementById('progress-time-current');

                    var s = parseInt(audio.currentTime % 60);
                    var m = parseInt((audio.currentTime / 60) % 60);
                    timeUpdate.innerHTML = `${m < 10 ? "0" + m : m}:${s < 10 ? "0" + s : s}`;
                    // Thay đổi theo thời gian
                    rangeBar.value = audio.currentTime;
                    //log ra giá trị rang / time 
                    console.log(rangeBar.value + " / " + audio.currentTime);
                }, true)
            }, 1000);
        });
    });
</script>
