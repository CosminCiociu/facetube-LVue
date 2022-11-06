<template>
    <main>
        <div class="pb-3 font-semibold text-xl text-gray-800 leading-tight">
                <h4> {{ video.title }} </h4>
        </div>
        <div class="flexible-container ">
            <div class="fluid_video_wrapper fluid_player_layout_default">
                <iframe :src="video.videoUrl"  width="448" height="252" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen ></iframe>
            </div>
        </div>
    </main>
    
</template>

<script>

export default {
    props: {
        video: {
            required: true,
            type: Object
        }
    },
}
</script>

<style scoped>
/* Flexible iFrame */

.flexible-container {
  position: relative;
  width: 100%;
  height: 0;
  padding-bottom: 56.25%;
}
.fluid_video_wrapper {
    max-width: 100%;
    display: inline-block;
    box-sizing: content-box;
}

.flexible-container iframe,
.flexible-container object,
.flexible-container embed {
  position: absolute;
  /* top: 0; */
  /* left: 0; */
  width: 100%;
  height: 100%;
  /* object-fit: contain; */
}
.flexible-container iframe {
    height: 100%;
}
main {
    width: 100%;
    max-width: 1341px;
    /* padding: 2em;  */
    /* background: #fff; */
}
</style>