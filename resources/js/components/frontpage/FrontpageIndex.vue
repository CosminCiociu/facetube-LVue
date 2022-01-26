<template>
    <div id="filters">
        <Filters />
    </div>
    <div id="container">
        <VideoList />    
    </div>
</template>

<script>

import Filters from '../utilities/Filters'
import VideoList from "../videos/VideoList";

export default {
    components: {
        VideoList,
        Filters
    }
}
</script>
<style scoped>
body {
	background: #202020;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #FAFFD1, #202020);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #FAFFD1, #202020); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	display: flex;
	flex-direction: column;
}

#container {
    background: #202020;
    background: -webkit-linear-gradient(to top, #b6b6b6, #202020);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to top, #b6b6b6, #202020); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	margin: auto;
	/* opacity: .7; */
	border-radius: 3px;
	margin-top: 50px;
	padding: 10px;
    justify-content: center;
    align-items: center;
}
</style>