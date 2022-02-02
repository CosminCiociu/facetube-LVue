<template>
    <main>
        <div class="pb-3 font-semibold text-xl text-gray-800 leading-tight">
                <h4> {{ video.title }} </h4>
        </div>
        <div class="flexible-container ">
            <iframe :src="video.videoUrl"  width="448" height="252" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen ></iframe>
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
main {
    width: 100%;
    /* padding: 2em;  */
    /* background: #fff; */
}
</style>