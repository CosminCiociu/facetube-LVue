<template>
  <!--Card-->
        <div class="card" >
            <h5 class="card-title">{{ video.title }}</h5>
            <span class="views">views:{{ video.views }}</span>
            <router-link :to="{ name: 'single.video', params: {videoId: video.id } }" class="text-decoration-none text-dark ">
                <img :src="video.imageUrl" alt="">
                <!-- <video class="img-fluid" playsinline autoplay muted loop>
                    <source :src="video.videoUrl" type="video/mp4">
                </video> -->
            </router-link>
        </div>
</template>

<script>
export default {
    props: {
        video: Object,
    }
}
</script>

<style>

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
.views {
    z-index: 3;
    position: absolute;
    bottom: 0;
    left: 100%;
    transform: translate(-100%,0);
    color: #fafafa;
    white-space: nowrap;
    font-size: 12px;
    line-height: 18px;
    display: inline-block;
    padding: 0px 8px;
    vertical-align: middle;
    border-radius: 10%;
    background: #000;
    background: rgba(0,0,0,.7);
}

</style>