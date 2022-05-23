<template>
   <div class="my-3 container-fluid" id="container-no-padding">
        <div class="row row-cols-2 row-cols-lg-3">
            <template v-for="video in videos" :key="video.id">
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <VideoItem :video="video"/>
                </div>
            </template>
            <button type="button" @click="showMore" class="btn btn-secondary container-fluid w-100">Show More</button>
        </div>
    </div>
</template>

<script>
import VideoItem from '../videos/VideoItem'
import { onMounted, watch } from "vue";
import useVideos from "../../composables/videos";

export default {
    props: {
        videoId: {
            required: true,
            type: Number
        },
    },
    components: {
        VideoItem,
    },
    setup(props) {
        const { errors, videos, getRelatedVideosByCategory } = useVideos()
        const random = Math.floor(Math.random() * props.videoId.length);
        onMounted(getRelatedVideosByCategory(props.videoId[random].id))

        return {
            errors,
            videos,
            getRelatedVideosByCategory
        }
    },
    methods :{
        showMore(e) {
            e.target.style.display = 'none';
            const random = Math.floor(Math.random() * this.$props.videoId.length);
            this.getRelatedVideosByCategory(this.$props.videoId[random].id,true);
        }
    }
}
</script>

<style>

</style>