<script>
export default {
    data() {
        return {
            articalList: [
                { id: 1, title: 'artical1', content: 'aaaaaaaa1', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 2, title: 'artical2', content: 'aaaaaaaa2', picurl: 'https://p4.img.cctvpic.com/photoworkspace/2023/11/02/2023110216242032841.jpg' },
                { id: 3, title: 'artical3', content: 'aaaaaaaa3', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 4, title: 'artical4', content: 'aaaaaaaa4', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 5, title: 'artical5', content: 'aaaaaaaa5', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 6, title: 'artical6', content: 'aaaaaaaa6', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 7, title: 'artical7', content: 'aaaaaaaa7', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 8, title: 'artical8', content: 'aaaaaaaa8', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 9, title: 'artical9', content: 'aaaaaaaa9', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 10, title: 'artical10', content: 'aaaaaaaa10', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 11, title: 'artical11', content: 'aaaaaaaa11', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 12, title: 'artical12', content: 'aaaaaaaa12', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 13, title: 'artical13', content: 'aaaaaaaa13', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 14, title: 'artical14', content: 'aaaaaaaa14', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 15, title: 'artical15', content: 'aaaaaaaa15', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 16, title: 'artical16', content: 'aaaaaaaa16', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 17, title: 'artical17', content: 'aaaaaaaa17', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 18, title: 'artical18', content: 'aaaaaaaa18', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 19, title: 'artical19', content: 'aaaaaaaa19', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' },
                { id: 20, title: 'artical20', content: 'aaaaaaaa20', picurl: 'https://p2.img.cctvpic.com/photoworkspace/2023/07/27/2023072712591675099.jpg' }
            ]
        }
    }
}
</script>

<template>
    <div class="articalContainner">
        <div class="articalBox">
            <div v-for="item in  articalList " :key="item.id" class="articalItem">
                <h2>{{ item.title }}</h2>
                <div class="info">
                    <div class="picBox">
                        <el-image style="width: auto; height: auto" :src=item.picurl :fit="contain" />
                    </div>
                    <div class="contentBox">
                        <p>{{ item.content }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>


<style>
.articalContainner {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-top: 3vh;
    width: 100vw;
    height: auto;
}

.articalBox {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;

    background-color: rgb(224, 224, 224);
    border-radius: 15px;

    width: 90%;
    height: auto;
    padding: 30px;
}

.articalItem {
    background-color: rgb(255, 255, 255);
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
    width: 90%;
    height: 200px;
    margin: 20px 30px;
}

.articalItem h2 {
    margin-top: 0;
    margin-bottom: 10px;
}

.info {
    display: flex;

    width: 100%;
    height: 80%;
}

.picBox {
    display: flex;
    height: 100%;
    width: auto;
}

.picBox img {
    display: flex;
    border-radius: 15px;
}

.contentBox {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;

    margin-left: 40px;
    height: 100%;
}

.contentBox p {
    margin-top: 0;
}
</style>
