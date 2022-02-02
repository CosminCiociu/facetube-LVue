<template>
    <div id="filters">
        <Filters :dateSelect="dateSelect" :changeDateSelect="changeDateSelect"/>
    </div>
    <div class="container-fluid" id="container-no-padding">
        <div class="row row-cols-2 row-cols-lg-3">
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
        </div>     
    </div>     
</template>

<script>

import useVideos from "../../composables/videos";
import { onMounted, watch } from "vue";
import VideoItem from '../videos/VideoItem';
import Pagination from '../utilities/Pagination'
import {useRoute} from "vue-router";
import Filters from "../utilities/Filters"

export default {
    name : "CategorySpecific",
    data() {
        return {
            dateSelect:'alltime',
        }
    },
    components: {
        VideoItem,
        Pagination,
        Filters
    },
    setup() {
        const { videos, getVideosByCategory, infoPaginate } = useVideos()
        const route = useRoute();
        const categoryId = route.params.categoryId;
        onMounted(getVideosByCategory(categoryId))
        return {
            videos,
            infoPaginate,
            getVideosByCategory
        }
    },
    mounted() {
        watch(() => this.dateSelect, (dateValue) => {
                this.getVideosByCategory(1, dateValue)  
            });
    },
    methods: {
        prev() {
            this.infoPaginate.current--
            this.getVideosByCategory(this.infoPaginate.current,this.dateSelect)
        },
        next() {
            this.infoPaginate.current++
            this.getVideosByCategory(this.infoPaginate.current,this.dateSelect)
        },
        changeDateSelect(newVal) {
            this.dateSelect = newVal.target.value
        },
    }
}   
</script>

<style scoped>


</style>