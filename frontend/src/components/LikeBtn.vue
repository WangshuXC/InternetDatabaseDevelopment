<template>
    <div class="likebtn" @mouseover="startTimer" @mouseleave="resetTimer">{{ buttonText }}</div>
</template>

<script>
export default {
    data() {
        return {
            timerId: null,
            likeCount: 1,
        };
    },
    props: {
        id: {
            type: String,
            required: true
        }
    },
    computed: {
        buttonText() {
            return `赞${this.likeCount}个`;
        },
    },
    methods: {
        startTimer() {
            clearTimeout(this.timerId);
            if (this.likeCount === 1) {
                this.timerId = setTimeout(() => {
                    this.likeCount = 2;
                    this.startTimer();
                }, 1000);
            } else if (this.likeCount === 2) {
                this.timerId = setTimeout(() => {
                    this.likeCount = 3;
                }, 1000);
            }
        },
        resetTimer() {
            clearTimeout(this.timerId);

            this.likeCount = 1;
        },
    },
};
</script>

<style scoped>
.likebtn {
    display: inline-block;
    position: relative;
    z-index: 1;
    overflow: hidden;
    text-decoration: none;
    font-family: sans-serif;
    font-weight: 600;
    font-size: 2em;
    padding: 0.75em 1em;
    color: #000000;
    border: 0.15em solid rgb(255, 255, 255, 0.7);
    border-radius: 2em;
    transition: 3s;
    margin-bottom: 3vh;

    user-select: none;
    cursor: pointer;
}

.likebtn:before,
.likebtn:after {
    content: "";
    position: absolute;
    top: -1.5em;
    z-index: -1;
    width: 200%;
    aspect-ratio: 1;
    border: none;
    border-radius: 40%;
    background-color: rgba(0, 100, 253, 0.25);
    transition: 4s;
}

.likebtn:before {
    left: -80%;
    transform: translate3d(0, 5em, 0) rotate(-340deg);
}

.likebtn:after {
    right: -80%;
    transform: translate3d(0, 5em, 0) rotate(390deg);
}

.likebtn:hover,
.likebtn:focus {
    color: white;
}

.likebtn:hover:before,
.likebtn:hover:after,
.likebtn:focus:before,
.likebtn:focus:after {
    transform: none;
    background-color: rgba(0, 114, 253, 0.75);
}
</style>
  