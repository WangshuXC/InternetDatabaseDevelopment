<script>
import MenberBox1 from '../components/MenberBox1.vue';
import MenberBox2 from '../components/MenberBox2.vue';
import MenberBox3 from '../components/MenberBox3.vue';
import MenberBox4 from '../components/MenberBox4.vue';

export default {
    components: {
        MenberBox1,
        MenberBox2,
        MenberBox3,
        MenberBox4,
    },
}
</script>

<template>
    <div class="aboutContainer">
        <div class="webInfo1">
            <MenberBox1></MenberBox1>
            <MenberBox2></MenberBox2>
        </div>
        <div class="webInfo2">
            <MenberBox3></MenberBox3>
            <MenberBox4></MenberBox4>
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
