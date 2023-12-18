<template>
    <div class="videoPlayer">
        <video id="player" playsinline controls>
            <source src="../assets/videos/aaa.mp4" type="video/mp4">
        </video>
    </div>

    <div class="videoInfo">

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
.videoPlayer {
    margin-top: 3%;
    margin-left: 5%;
    max-width: 80%;
    max-height: 80vh;
    display: flex;
    justify-content: center;
}
</style>
