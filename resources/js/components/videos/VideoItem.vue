<template>
  <!--Card-->
        <div class="card" >
            <router-link :to="{ name: 'single.video', params: {videoId: video.id } }" class="text-decoration-none text-dark ">
                <div class="image-video-container">
                    <img :src="video.imageUrl" alt="">
                    <span class="duration">{{ video.duration }}</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ truncate(video.title, 35, " ...") }}</h5>
                </div>
            </router-link>
        </div>
</template>

<script>
export default {
    props: {
        video: Object,
    },
    methods: {
        truncate: function (text, length, suffix) {
                if (text.length > length) {
                    return text.substring(0, length) + suffix;
                } else {
                    return text;
                }
            },
    }
}
</script>

<style scoped>
    .image-video-container{
        position: relative;
    }
    .image-video-container > img {
        max-height: 500px;
    }
    .duration {
        position: absolute;
        bottom: 0;
        right: 0;
        /* padding: 5px; */
        font-size: 11px;
        font-weight: bold;
        line-height: 18px;
        padding: 0 6px;
        vertical-align: middle;
        background: #000;
        background: rgba(0,0,0,.7);
        color: #fff !important;
        border-radius: 10px 0 0 10px;
    }
    .card {
        background-color: transparent;
        border: 0;
        /* border-radius: 5px; */
        /* box-shadow: 0 4px 10px 0 rgb(40 49 53 / 20%);  */
        overflow: hidden;
        margin-top: 10px;
        position: relative;
        /* -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); */
        /* -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); */
    }
    .card:hover {
        opacity: 0.9;
        transition: all 0.2s ease-out;
        box-shadow: 4px 0 8px #8c8c8c;
        top: -4px;
        border: 0;
        /* background-color: white; */
    }
    .card-body {
        border-radius: 10px 0 0 10px;
        padding: 0.5rem 0.5rem 0 0;
    }
    .card-title{
        text-align: center;
        font-size: 14px;
    }
</style>