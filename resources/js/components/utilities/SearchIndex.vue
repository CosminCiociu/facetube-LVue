<template>
    <div v-if="categories.length" class="category-part">
            <div class="container-fluid" id="container-no-padding">
                <h1 class="display-6 mb-3">Categories</h1>
                <div class="row row-cols-2 row-cols-lg-3">
                    <template v-for="category in categories" :key="category.id">
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <CategoryItem  :category="category"/>
                        </div>
                    </template>
                </div>
            </div>
    </div>
  <div v-if="videos.length > 0" class="video-part">
        <div class="container-fluid" id="container-no-padding">
            <h1 class="display-6 mb-3">Videos</h1>
            <div class="row row-cols-2 row-cols-lg-3">
                <template v-for="video in videos" :key="video.id">
                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <VideoItem  :video="video"/>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import useVideos from "../../composables/videos";
import VideoItem from '../videos/VideoItem';
import CategoryItem from '../categories/CategoryItem';
import { onMounted, watch } from "vue";
import { useRoute } from 'vue-router'


export default {
    name : "SearchResults",
    components: {
        VideoItem,
        CategoryItem
    },
    setup() {
        const { videos, categories, getVideosBySearch } = useVideos()
        const route = useRoute()
        onMounted(getVideosBySearch(route.query.keyword))
        
        watch(() => route.query.keyword, (newKeyword) => {
                getVideosBySearch(newKeyword)  
            });

        return {
            videos,
            categories
        }
    },
}
</script>

<style>

</style>