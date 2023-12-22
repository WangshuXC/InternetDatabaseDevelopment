<script>
import InfoBox from '../components/InfoBox.vue';
import axios from 'axios';
export default {
    data() {
        return {
            movieList: [],
            pagecount: 1,
        }
    },
    mounted() {
        this.getUrl();
        this.getpage();
    },
    components: {
        InfoBox,
    },
    methods: {
        getUrl() {
            axios.post('http://10.130.26.91:8080/api/getvideo')
                .then(response => {
                    this.movieList = response.data;
                })
                .catch(error => {
                    console.error('请求失败', error);
                });
        },
        handlePageChange(page) {
            axios.post('http://10.130.26.91:8080/api/getvideo?page=' + page)
                .then(response => {
                    const elBacktop = document.querySelector('.el-backtop');
                    this.movieList = response.data;
                    elBacktop.click();
                })
                .catch(error => {
                    console.error('请求失败', error);
                });
        },
        getpage() {
            axios.post('http://10.130.26.91:8080/api/getvideopagecount')
                .then(response => {
                    this.pagecount = response.data * 10;

                    console.log(this.pagecount)
                })
                .catch(error => {
                    console.error('请求失败', error);
                });
        }
    }
}
</script>

<template>
    <div class="movieContainer">
        <div class="movieBox">
            <div class="movieItemBox">
                <div v-for="item in movieList" :key="item.VideoID" class="movieItem">
                    <router-link :to="'/movie/' + item.VideoID">
                        <InfoBox :src=item.PictureURL :title=item.Title :time=item.UploadDate
                            :synopsis="item.Description" />
                    </router-link>
                </div>
            </div>
            <el-pagination background layout="prev, pager, next" :total="pagecount" hide-on-single-page
                @current-change="handlePageChange" />
        </div>
    </div>
    <el-backtop :right="100" :bottom="100" />
</template>


<style>
.movieContainer {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-top: 10vh;
    width: 100vw;
    height: auto;
}

.movieBox {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;

    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 15px;

    width: 90%;
    height: auto;
    padding: 30px;
}

.movieItemBox {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

.movieItem {
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 20px;
    width: auto;
    height: auto;
    margin: 20px 30px;
}

.movieItem p {
    margin: 0;
}

.picBox {
    display: flex;
    height: 100%;
    width: 20%;
}

.contentBox {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;

    margin-left: 40px;
    height: 100%;
}
</style>
