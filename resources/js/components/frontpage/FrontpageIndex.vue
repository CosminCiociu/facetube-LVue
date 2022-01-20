<template>
    <div id="container">
        <template v-for="item in videos" :key="item.id">
            <!--Card-->
            <div class="card" >
                <h5 class="card-title">{{ item.title }}</h5>
                <router-link :to="{ name: 'single.video', params: {videoId: item.id } }" class="text-decoration-none text-dark ">
                    <img :src="item.imageUrl" alt="">
                    <video class="img-fluid" playsinline autoplay muted loop>
                        <source :src="item.videoUrl" type="video/mp4">
                    </video>
                </router-link>
            </div>
        </template>    
    </div>
</template>

<script>
import useVideos from "../../composables/videos";
import { onMounted } from "vue";

export default {
    setup() {
        const { videos, getVideos } = useVideos()
        onMounted(getVideos)
        return {
            videos
        }
    }
    
}
</script>
<style scoped>
body {
	background: #202020;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #FAFFD1, #202020);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #FAFFD1, #202020); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	display: flex;
	flex-direction: column;
}

#container {
    background: #202020;
    background: -webkit-linear-gradient(to top, #b6b6b6, #202020);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #b6b6b6, #202020); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	margin: auto;
	/* opacity: .7; */
	border-radius: 3px;
	margin-top: 50px;
	padding: 10px;
    justify-content: center;
    align-items: center;
}

.card {
	width: 18%;
	height: 200px;
    min-height: 40%;
	align-self: center;
    /* background: #202020; */
    /* background: -webkit-linear-gradient(to top, #222222, #202020);  Chrome 10-25, Safari 5.1-6 */
    /* background: linear-gradient(to top, #222222, #202020); W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	padding: 5px;
	border-radius: 3px;
	margin: 10px 10px;
	font-family: monospace;
	transition: all .15s ease-in-out;
}
.card:hover {
    transform: scale(1.1);
}

.card-title {
    width: 100%;
    z-index: 3;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%,0);
    text-align: center;
    color: #fafafa;
}
.card a {
    height: 100%;
}
video,
img {
  object-fit: fill;
  width: 100%;
  height: 100%;
}
.card:hover img{
    display: none;
}
.card:hover .card-title {
    animation: mymove 0.5s linear forwards;
}
@keyframes mymove {
  from {
    bottom: 0;
    left: 50%;
    transform: translate(-50%,0);
    opacity: 1;
    }
  to {
    bottom: 0;
    left: 50%;
    transform: translate(-50%,100%);
    opacity: 0;
    }
}
.card img{
    position: absolute;
    z-index: 2;
    top: 0;
    left: 0;
}

</style>