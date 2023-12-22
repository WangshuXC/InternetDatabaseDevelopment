<script>
import MenberBox from '../components/MenberBox.vue';

export default {
    data() {
        return {
            name1: "梁晓储",
            name2: "张昊星",
            name3: "方奕",
            name4: "王思宇",
        }
    },
    components: {
        MenberBox,
    },
}
</script>

<template>
    <div class="aboutContainer">
        <div class="webInfo1">
            <MenberBox :fullname=name1></MenberBox>
            <MenberBox :fullname=name2></MenberBox>
        </div>
        <div class="webInfo2">
            <MenberBox :fullname=name3></MenberBox>
            <MenberBox :fullname=name4></MenberBox>
        </div>
        <el-backtop :right="100" :bottom="100" />
    </div>
</template>


<style>
.aboutContainer {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 10vh;
    width: 100%;
    min-height: 65vh;

    overflow-x: hidden;
    overflow-y: hidden;
}

.webInfo1 {
    display: flex;
    margin-top: 10vh;
    margin-bottom: 10vh;
    width: 100%;
    justify-content: space-evenly;
}

.webInfo2 {
    display: flex;
    margin-top: 10vh;
    margin-bottom: 10vh;
    width: 100%;
    justify-content: space-evenly;
}

.card {
    margin-inline: 30px;
}
</style>
