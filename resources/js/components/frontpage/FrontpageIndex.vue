<template>
    <div id="filters">
        <Filters :dateSelect="dateSelect" :changeDateSelect="changeDateSelect"/>
    </div>
    <div class="container-fluid" id="container-no-padding">
        <div class="row row-cols-2 row-cols-lg-3">
            <VideoList :dateSelect="dateSelect"/>    
        </div>
    </div>
</template>

<script>

import Filters from '../utilities/Filters'
import VideoList from "../videos/VideoList";

export default {
    data() {
        return {
            dateSelect:'mounth',
        }
    },
    components: {
        VideoList,
        Filters
    },
    methods: {
        changeDateSelect(newVal) {
            this.dateSelect = newVal.target.value
        },
    }
}
</script>
<style scoped>
    #container-no-padding {
        padding-left: 0;
        padding-right: 0;
    }
    #filters {
        padding-bottom: 2rem;
    }
</style>