
<template>
    <div class="video-wrapper">
        <div class="padding-12">
            <single-video-item :video="video" />
            <related-to-video :video="video" />
        </div>
        
        <related-videos v-if="video.category_id" :videoId="video.category_id" />
    </div>
    
</template>
<script>
import useVideos from "../../composables/videos";
import { onMounted } from "vue";
import SingleVideoItem from "./SingleVideoItem"
import RelatedToVideo from "./RelatedToVideo"
import RelatedVideos from "./RelatedVideos"

export default {
    props: {
        videoId: {
            required: true,
            type: String
        }
    },
    components: {
        SingleVideoItem,
        RelatedToVideo,
        RelatedVideos   
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
.padding-12 {
    padding: 0 12px;
}
</style>