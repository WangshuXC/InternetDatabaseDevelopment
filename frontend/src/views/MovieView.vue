<script>
import InfoBox from '../components/InfoBox.vue';
import axios from 'axios';
export default {
    data() {
        return {
            movieList: [{ 'id': '29992492', 'title': 'CCTV-13新闻频道', 'content': '日本福岛第一核电站工作人员遭核污染 外交部：再次证明妥处核污染水极端重要', 'picurl': 'https://p5.img.cctvpic.com/fmspic/2023/12/13/ff3be23f0891410f9cc4303fbf39f2dc-1.jpg' }, { 'id': '30002367', 'title': '视频频道', 'content': '与核污染无关？日本死鱼多到渔船寸步难行', 'picurl': 'https://p3.img.cctvpic.com/apple3g/www/upload/image/20231217/1702808376506000135.jpg' }, { 'id': '29941836', 'title': 'CCTV-4中文国际频道', 'content': '中国外交部：日方应全面配合建立核污染水排海国际监测安排', 'picurl': 'https://p2.img.cctvpic.com/fmspic/2023/11/23/db0222c58284486e8b43fdb8cb68c486-1.jpg' }, { 'id': '29584370', 'title': 'CCTV-2财经频道', 'content': '关注日本核污染水排海 日本民众集会反对核污染水排海', 'picurl': 'https://p3.img.cctvpic.com/fmspic/2023/07/06/8ac3e3d2e4464d1e8f6d354209be4649-1.jpg' }, { 'id': '29715034', 'title': 'CCTV-2财经频道', 'content': '关注日本核污染水排海 斐济民众抗议日本核污染水排海', 'picurl': 'https://p1.img.cctvpic.com/fmspic/2023/08/26/9a6db7c97fa942cba1b9943e8114602a-1.jpg' }, { 'id': '29571835', 'title': 'CCTV-4中文国际频道', 'content': '多方反对日本强推核污染水排海 日本民众集会反对核污染水排海', 'picurl': 'https://p3.img.cctvpic.com/fmspic/2023/07/01/477c912aa2454358868138bb79b9b95b-1.jpg' }, { 'id': '29710636', 'title': 'CCTV-2财经频道', 'content': '日本启动核污染水排海 韩国社会强烈反对日本核污染水排海', 'picurl': 'https://p1.img.cctvpic.com/fmspic/2023/08/24/82d984ebeaa64149b8cf2d0cb6738af6-1.jpg' }, { 'id': '29710319', 'title': 'CCTV-2财经 频道', 'content': '日本启动核污染水排海 无视多方反对 日本今日启动核污染水排海', 'picurl': 'https://p4.img.cctvpic.com/fmspic/2023/08/24/59224a1eb0a7404797acc399c5e7ba97-1.jpg' }, { 'id': '29708215', 'title': 'CCTV-13新闻频道', 'content': '多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定', 'picurl': 'https://p3.img.cctvpic.com/fmspic/2023/08/23/d3529e822da8450caabf2b6537f371ff-1.jpg' }, { 'id': '29715991', 'title': 'CCTV-2财经频道', 'content': '关注日本核污染水排海 斐济民众抗议日本核污染水排海', 'picurl': 'https://p4.img.cctvpic.com/fmspic/2023/08/26/097253fac2f644a68ed75e1eeed05158-1.jpg' }, { 'id': '29710501', 'title': 'CCTV-2财经频道', 'content': '日本启动核污染水排海 日本启动核污 染水排海 韩国社会强烈反对', 'picurl': 'https://p2.img.cctvpic.com/fmspic/2023/08/24/3cfc9d07b79743ef89e4887096c8b446-1.jpg' }, { 'id': '29710275', 'title': 'CCTV-2财经频道', 'content': '日本启动核污染水排海 不顾多方反对 日本今日启动核污染水排海', 'picurl': 'https://p3.img.cctvpic.com/fmspic/2023/08/24/8cb00939a50141508800d520c6c070c1-1.jpg' }, { 'id': '29572313', 'title': 'CCTV-4中文国际频道', 'content': '多方反对日本强推核污染水排海 日本民众集会反对核污染水排海', 'picurl': 'https://p5.img.cctvpic.com/fmspic/2023/07/01/dc8d082f6c7c4d9aa93550c059e13c9c-1.jpg' }, { 'id': '29725597', 'title': 'CCTV-2财经频道', 'content': '关注日本核污染水排海 韩国民众举行集会 反对日本核污染水排海', 'picurl': 'https://p3.img.cctvpic.com/fmspic/2023/08/30/5ea29000ab6a4a4594015b3e3fe2f330-1.jpg' }, { 'id': '29708740', 'title': 'CCTV-13新闻频道', 'content': '多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定', 'picurl': 'https://p5.img.cctvpic.com/fmspic/2023/08/23/97ba39c451aa4e78b76efee099791281-1.jpg' }, { 'id': '29703540', 'title': 'CCTV-1综合频道', 'content': '【多方反对日本强推核污染水排海】福岛各界举行圆桌会 反对核污染水排海', 'picurl': 'https://p1.img.cctvpic.com/fmspic/2023/08/21/ff915da8c7014ed18447a83faf1869ba-1.jpg' }, { 'id': '29619859', 'title': 'CCTV-13新闻频道', 'content': '多方反对日本强推核污染水排海 菲律宾民众抗议日本核污染水排海方案', 'picurl': 'https://p4.img.cctvpic.com/fmspic/2023/07/20/bb65573a43ef4fe8ae48778bebd75c0f-1.jpg' }, { 'id': '29583530', 'title': 'CCTV-1综合频道', 'content': '多方反对日本强推核污染水 排海 中方就日本强推核污染水排海阐明严正立场', 'picurl': 'https://p5.img.cctvpic.com/fmspic/2023/07/05/fedcb63ec6c84a1abe14eb2197259043-1.jpg' }, { 'id': '29712191', 'title': 'CCTV-2财经频道', 'content': '关注日本核污染水排海 无视多方反对 日本昨日强行启动核污染水排海', 'picurl': 'https://p5.img.cctvpic.com/fmspic/2023/08/25/ef6a60db217a4a05a9aeab86958dcf9e-1.jpg' }, { 'id': '29710487', 'title': 'CCTV-2财经频道', 'content': '日本启动核污染水排海 专家：日本偷换概念 为核污染水排海洗白', 'picurl': 'https://p1.img.cctvpic.com/fmspic/2023/08/24/a378d960c1124c5bbf77623fc5ea3131-1.jpg' }]
        }
    },
    mounted() {
        this.getUrl();
    },
    components: {
        InfoBox,
    },
    methods: {
        getUrl() {

            axios.post('http://localhost:8080/api/getvideo')
                .then(response => {
                    this.movieList = response.data;
                    console.log(response.data)
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
            <div v-for="item in movieList" :key="item.VideoID" class="movieItem">
                <InfoBox :src=item.PictureURL :title=item.Title :synopsis="item.Description" />
            </div>
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
    margin-top: 6vh;
    width: 100vw;
    height: auto;
}

.movieBox {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;

    background-color: gainsboro;
    border-radius: 15px;

    width: 90%;
    height: auto;
    padding: 30px;
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
