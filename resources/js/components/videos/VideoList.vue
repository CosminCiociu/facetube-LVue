<template>
    <template v-if="videos.length">
            <template v-for="video in videos" :key="video.id">
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <VideoItem  :video="video"/>
                </div>
            </template>
            <nav class="pagination w-100 pagination">
                <pagination :next='next' :prev='prev' :current="infoPaginate.current" :total="infoPaginate.last_page"/>
            </nav>

    </template>
                
</template>

<script>

import useVideos from "../../composables/videos";
import { onMounted, watch } from "vue";
import VideoItem from './VideoItem';
import Pagination from '../utilities/Pagination'

export default {
    name : "VideoList",
    props: {
        dateSelect: String,
    },
    components: {
        VideoItem,
        Pagination
    },
    setup(props) {
        const { videos, getVideos, infoPaginate } = useVideos()
        onMounted(getVideos)

        watch(() => props.dateSelect, (dateValue) => {
                console.log(dateValue);
                // Page is 1 and dataValue will be received
                // From props
                getVideos(1, dateValue)  
        });

        return {
            videos,
            infoPaginate,
            getVideos
        }
    },
    methods: {
        prev() {
            this.infoPaginate.current--
            this.getVideos(this.infoPaginate.current,this.dateSelect)
        },
        next() {
            this.infoPaginate.current++
            this.getVideos(this.infoPaginate.current,this.dateSelect)
        },
        
    }
}   
</script>

<style scoped>


</style>