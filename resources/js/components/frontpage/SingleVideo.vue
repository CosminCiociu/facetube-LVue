
<template>
    <div class=" pb-1 font-semibold text-xl text-gray-800 leading-tight">
        <h4> {{ video.title }} </h4>
    </div>
    <div class="flexible-container">
        <iframe  allow="autoplay; encrypted-media" allowfullscreen :src="video.videoUrl" scrolling="no" frameborder="0"  ref="resizeIframe" ></iframe>
    </div>
</template>
<script>
import useVideos from "../../composables/videos";
import {onMounted} from "vue";

export default {
    props: {
        videoId: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, video, getVideo } = useVideos()

        onMounted(getVideo(props.videoId))

        return {
            errors,
            video,
        }
    }
}
</script>
<style scoped>
/* Flexible iFrame */

.flexible-container {
  position: relative;
  padding-bottom: 56.25%;
  padding-top: 30px;
  height: 0;
  overflow: hidden;
}

.flexible-container iframe,
.flexible-container object,
.flexible-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>