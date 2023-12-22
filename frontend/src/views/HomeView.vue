<script>

export default {
    data() {
        return {
            imagePaths: [
                "src/assets/imgs/1.png",
                "src/assets/imgs/2.png",
                "src/assets/imgs/3.png",
                "src/assets/imgs/4.png",
                "src/assets/imgs/5.png",
                "src/assets/imgs/6.png",
                "src/assets/imgs/7.png",
                "src/assets/imgs/8.png",
                "src/assets/imgs/9.png",
                "src/assets/imgs/10.png",
                "src/assets/imgs/11.png",
                "src/assets/imgs/12.png",
                "src/assets/imgs/13.png",
                "src/assets/imgs/14.png",
                "src/assets/imgs/15.png",
                "src/assets/imgs/16.png"
            ]
        };
    },
    mounted() {
    },
};
</script>

<template>
    <div class="homeContainer">
        <div class="timeLine">
            <el-carousel :interval="3000" type="card" height="50vh" trigger="click">
                <el-carousel-item v-for="(imagePath, index) in imagePaths" :key="index">
                    <img :src="imagePath" alt="pic">
                </el-carousel-item>
            </el-carousel>
        </div>
    </div>
</template>


<style>
.homeContainer {
    width: 90%;
    height: 65vh;
    margin-top: 10vh;
}


.timeLine img {
    max-width: 100%;
    height: auto;
    display: block;
}
</style>
