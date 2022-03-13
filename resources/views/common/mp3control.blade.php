<style>
    .player-control {
        background-color: #333;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 50px;
        z-index: 9999;
        align-items: center;
        display: flex;
        justify-content: center;
    }

    #audioPlayPause {
        width: 65px;
        height: 65px;
        background-color: rgb(88, 88, 88);
        border-radius: 50%;
        color: rgb(255, 255, 255);
        box-shadow: 2px 4px 4px #000000;
        align-items: center;
        display: flex;
        flex-direction: column;
        position: absolute;
        top: -50%;
        z-index: 9999;
    }

    .title-audio {
        font-size: 14px;
        color: #fff;
        font-weight: bold;
        width: 100%;
        margin-top: 5px;
        left: 35%;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .media-progress {
        font-size: 14px;
        color: rgb(255, 255, 255);
        font-weight: bold;
        width: 70%;
        margin-top: 5px;
        right: 20px;
        position: relative;
    }

    .progress-bar-wrapper {
        height: 5px;
        background-color: #fff;
        width: 100%;
    }
    .progress-bar{
        height: 5px;
        width: 40%;
        color: rgb(0, 247, 255);
    }
    .progress-time-current{
        float: left;
    }
    .progress-time-total{
        float: right;
    }
</style>
<div class="player-control">
    <span class="title-audio" id="audioTitle">Title</span>
    <span id="audioPlayPause" class="d-flex justify-content-center"><i class="fa fa-play"></i></span>
    <div class="media-progress">
        <div class="progress-bar-wrapper">
            <div class="progress-bar"></div>
        </div>
        <div class="progress-time-current">
            15:23
        </div>
        <div class="progress-time-total">
            34:40
        </div>
    </div>
</div>
