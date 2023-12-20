<script>

export default {
    data() {
        return {
            imagePaths: ["src/assets/imgs/1.png", "src/assets/imgs/2.png", "src/assets/imgs/3.png"], // Initialize an empty array to store image paths
        };
    },
    mounted() {
    },
};
</script>

<template>
    <div class="homeContainer">
        <div class="timeLine">
            <h1>核污染宣传，从你我做起</h1>
            <el-carousel :interval="3000" type="card" height="40vh" indicator-position="none">
                <el-carousel-item v-for="(imagePath, index) in imagePaths" :key="index">
                    <img :src="imagePath" alt="pic">
                </el-carousel-item>
            </el-carousel>
        </div>
    </div>
</template>


<style>
.homeContainer {
    width: 80%;
    height: 65vh;
    margin-top: 10vh;
}

.timeLine h1 {
    color: white;
    justify-content: center;
}
</style>
