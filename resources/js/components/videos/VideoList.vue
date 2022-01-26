<template>
    <template v-if="videos.length">
            <template v-for="video in videos" :key="video.id">
                <VideoItem  :video="video"/>
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
</style>