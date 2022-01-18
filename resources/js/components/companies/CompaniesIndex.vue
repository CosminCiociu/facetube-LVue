<template>
    <div id="container">
        <!--Card-->
            <div class="card" >
                <h5 class="card-title">Test</h5>
                <a href="" class="text-decoration-none text-dark ">
                    <!-- <img src="https://via.placeholder.com/640x480.png/007799?text=exercitationem" alt=""> -->
                    <video class="img-fluid" playsinline autoplay muted loop>
                        <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4">
                    </video>
                </a>
            </div>
        <template v-for="item in videos" :key="item.id">
            <!--Card-->
            <div class="card" >
                <h5 class="card-title">{{ item.title }}</h5>
                <a :href="item.videoUrl" class="text-decoration-none text-dark ">
                    <img :src="item.imageUrl" alt="">
                    <video class="img-fluid" playsinline autoplay muted loop>
                        <source :src="item.videoUrl" type="video/mp4">
                    </video>
                </a>
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
    background: -webkit-linear-gradient(to top, #222222, #202020);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #222222, #202020); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	margin: auto;
	opacity: .7;
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
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%,-50%);
    text-align: center;
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
.card img{
    z-index: 2;
}

</style>