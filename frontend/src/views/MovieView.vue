<script>
export default {
    data() {
        return {
            movieList: [
                { id: 1, title: 'movie1', picture: 'pic1' },
                { id: 2, title: 'movie2', picture: 'pic2' },
                { id: 3, title: 'movie3', picture: 'pic3' },
                { id: 4, title: 'movie4', picture: 'pic4' },
                { id: 5, title: 'movie5', picture: 'pic5' },
                { id: 6, title: 'movie6', picture: 'pic6' },
                { id: 7, title: 'movie7', picture: 'pic7' },
                { id: 8, title: 'movie8', picture: 'pic8' },
                { id: 9, title: 'movie9', picture: 'pic9' },
                { id: 10, title: 'movie10', picture: 'pic10' },
                { id: 11, title: 'movie11', picture: 'pic11' },
                { id: 12, title: 'movie12', picture: 'pic12' },
                { id: 13, title: 'movie13', picture: 'pic13' },
                { id: 14, title: 'movie14', picture: 'pic14' },
                { id: 15, title: 'movie15', picture: 'pic15' },
                { id: 16, title: 'movie16', picture: 'pic16' },
                { id: 17, title: 'movie17', picture: 'pic17' },
                { id: 18, title: 'movie18', picture: 'pic18' },
                { id: 19, title: 'movie19', picture: 'pic19' },
                { id: 20, title: 'movie20', picture: 'pic20' }
            ]
        }
    }
}
</script>

<template>
    <div class="movieContainner">
        <p>
            this is movie page
        </p>
        <div class="movieBox">
            <div v-for="item in movieList" :key="item.id" class="movieItem">
                <div class="moviePic">

                </div>
                <p>{{ item.title }}</p>
            </div>
        </div>
    </div>
</template>


<style>
.movieContainner {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
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
    background-color: rgb(174, 174, 174);
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    width: 25%;
    height: 200px;
    margin: 20px 30px;
}

.moviePic {
    background: url("../assets/imgs/bcpic.jpg") no-repeat;
    border-radius: 15px;
    width: 100%;
    height: 90%;
    margin-bottom: 5px;
}

.movieItem p {
    margin: 0;
}
</style>
