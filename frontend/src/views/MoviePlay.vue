<template>
    <div class="video-player">
        <video id="player" playsinline controls>
            <source src="../assets/videos/aaa.mp4" type="video/mp4">
        </video>
    </div>

    <div class="video-info">

    </div>
</template>

<script>
import Plyr from 'plyr';
import 'plyr/dist/plyr.css';

export default {
    data() {
        return {};
    },
    mounted() {
        this.initPlayer();
    },
    methods: {
        initPlayer() {
            this.player = new Plyr('#player', {
                controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'download', 'fullscreen'],
                speed: { selected: 1, options: [0.5, 0.75, 1, 1.25, 1.5, 2] },
            });
        },
    },
};
</script>

<style>
.video-player {
    margin-top: 3%;
    margin-left: 5%;
    max-width: 80%;
    max-height: 80vh;
    display: flex;
    justify-content: center;
}

.right-box {
    display: flex;
    flex-direction: column;
    width: 40%;
}

.download-box,
.episode-box {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    background-color: #f0f0f0;
    border-radius: 10px;

    padding: 10px;
    height: auto;

    margin-left: 10%;
    margin-right: 15%;

    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: transparent transparent;
}

.episode-box::-webkit-scrollbar {
    width: 6px;
    /* 设置滚动条宽度 */
    background-color: transparent;
    /* 设置滚动条背景颜色为透明 */
}

.episode-box::-webkit-scrollbar-thumb {
    background-color: transparent;
    /* 设置滚动条拇指颜色为透明 */
}

.episode-box::-webkit-scrollbar-track {
    background-color: transparent;
    /* 设置滚动条轨道颜色为透明 */
}

.download-box::-webkit-scrollbar {
    width: 6px;
    /* 设置滚动条宽度 */
    background-color: transparent;
    /* 设置滚动条背景颜色为透明 */
}

.download-box::-webkit-scrollbar-thumb {
    background-color: transparent;
    /* 设置滚动条拇指颜色为透明 */
}

.download-box::-webkit-scrollbar-track {
    background-color: transparent;
    /* 设置滚动条轨道颜色为透明 */
}

.download-box {
    margin-top: 10%;
}

.download-list,
.episode-list {
    display: flex;
    flex-grow: 1;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    position: relative;
}

.download-item,
.episode-item {
    background-color: rgb(25, 179, 249);
    color: white;
    border-radius: 8px;
    padding: 5px 5px;
    margin: 5px;

    height: 2vw;
    width: 2vw;

    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
