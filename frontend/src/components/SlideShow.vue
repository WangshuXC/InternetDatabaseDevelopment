<template>
    <section class="banner">
        <div class="slider">
            <div v-for="(slide, index) in slides" :key="index" :class="['slide', { 'active': index === slideNumber }]">
                <img :src="slide.image" />
                <div class="left-info">
                    <div class="penetrte-blur">
                        <h1>{{ slide.leftTitle }}</h1>
                    </div>
                    <div class="content">
                        <h3>{{ slide.title }}</h3>
                        <p>{{ slide.description }}</p>
                        <a href="#" class="btn">More Details</a>
                    </div>
                </div>
                <div class="right-info">
                    <h1>{{ slide.rightTitle }}</h1>
                    <h3>Forest</h3>
                </div>
            </div>
        </div>
        <div class="navigation">
            <span class="prev-btn" @click="prevSlide"><i class="bx bx-chevron-left"></i></span>
            <span class="next-btn" @click="nextSlide"><i class="bx bx-chevron-right"></i></span>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            slides: [
                {
                    image: "https://p5.img.cctvpic.com/fmspic/2023/12/13/ff3be23f0891410f9cc4303fbf39f2dc-1.jpg",
                    leftTitle: "日本核",
                    title: "01.China Forest Tour",
                    description: "中国是多山的国家，地形总趋势由西北向东南倾斜...",
                    rightTitle: "污染"
                },
                {
                    image: "../assets/imgs/africa.jpg",
                    leftTitle: "Afr",
                    title: "02.Africa Forest Tour",
                    description: "中国是多山的国家，地形总趋势由西北向东南倾斜...",
                    rightTitle: "ica"
                }
            ],
            slideNumber: 0
        };
    },
    methods: {
        nextSlide() {
            this.slideNumber++;
            if (this.slideNumber > this.slides.length - 1) {
                this.slideNumber = 0;
            }
        },
        prevSlide() {
            this.slideNumber--;
            if (this.slideNumber < 0) {
                this.slideNumber = this.slides.length - 1;
            }
        }
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

.banner {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    border-radius: 10px;
}

.slider .slide {
    position: absolute;
    width: 100%;
    height: 100%;
}

.slide img {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    pointer-events: none;
    opacity: 0;
    transition: .3s ease;
}

.slide.active img {
    opacity: 1;
}

.slide .left-info {
    position: absolute;
    top: 0;
    left: 0;
    width: 30%;
    height: 100%;
    transform: translateX(-100%);
    transition: 0;
}

.slide.active .left-info {
    transform: translateX(0);
    z-index: 1;
    transition: 1s ease;
}

.left-info .penetrte-blur {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, .1);
    display: flex;
    justify-content: flex-end;
    align-items: center;
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    -webkit-mask: linear-gradient(#000 0 0),
        linear-gradient(#000 0 0);
    -webkit-mask-clip: text, padding-box;
    -webkit-mask-composite: xor;
    padding-right: 15px;
}

.penetrte-blur h1 {
    font-size: 100px;
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
}

.left-info .content {
    position: absolute;
    bottom: 8%;
    left: 10%;
    color: #fff;
}

.content h3 {
    font-size: 20px;
}

.content p {
    font-size: 16px;
    margin: 10px 10px 15px 0px;
}

.content .btn {
    display: inline-block;
    padding: 13px 28px;
    background: #fff;
    border: 2px solid #fff;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    font-weight: 600;
    color: #444;
    font-size: 16px;
    transition: all .3s linear;
}

.content .btn:hover {
    background: transparent;
    color: #fff;
}

.slide .right-info {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    /* background: red; */
    display: flex;
    align-items: center;
    transform: translateX(100%);
    transition: 0s;
}

.slide.active .right-info {
    transform: translateX(0);
    transition: 0.5s ease;
}


.right-info h1 {
    font-size: 200px;
    color: #fff;
    text-shadow:
        0 1px 0 #ccc,
        0 2px 0 #c9c9c9,
        0 3px 0 #bbb,
        0 4px 0 #b9b9b9,
        0 5px 0 #aaa,
        0 6px 1px rgba(0, 0, 0, .1),
        0 0px 5px rgba(0, 0, 0, .1),
        0 1px 3px rgba(0, 0, 0, .3),
        0 3px 5px rgba(0, 0, 0, .2),
        0 5px 10px rgba(0, 0, 0, .25),
        0 10px 10px rgba(0, 0, 0, .2),
        0 20px 20px rgba(0, 0, 0, .15);
}

.right-info h3 {
    position: absolute;
    font-size: 80px;
    color: #fff;
    text-shadow: 0 0 10px rgba(0, 0, 0, .5);
    transform: translateY(150%);
    margin-left: 13px;
}

.navigation {
    position: absolute;
    bottom: 8%;
    right: 5%;
    z-index: 100;
}

.navigation span {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    background: #fff;
    border: 2px solid #fff;
    border-radius: 6px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    cursor: pointer;
    margin-left: 25px;
    transition: .3s;
}

.navigation span:nth-child(1) {
    background: transparent;
}

.navigation span:nth-child(1):hover {
    background: #fff;
}

.navigation span i {
    font-size: 45px;
    color: #444;
    transition: .4s;
}

.navigation span:nth-child(1) i {
    color: #fff;
}

.navigation span:nth-child(1):hover i {
    color: #444;
}
</style>