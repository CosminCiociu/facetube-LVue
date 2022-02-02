
<template>
    <div class="video-wrapper">
        <single-video-item :video="video" />
        <related-to-video />
    </div>
    
</template>
<script>
import useVideos from "../../composables/videos";
import { onMounted } from "vue";
import SingleVideoItem from "./SingleVideoItem"
import RelatedToVideo from "./RelatedToVideo"

export default {
    props: {
        videoId: {
            required: true,
            type: String
        }
    },
    components: {
        SingleVideoItem,
        RelatedToVideo     
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

</style>