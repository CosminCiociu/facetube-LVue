<template>
    <div class="container-fluid like-container p-0 m-0">
        <div class="like-container ml-3">
            <div class="placement">
                <div 
                    :class="{ active: isActive }"
                    @click="events(video.likes)"
                    class="heart">
                </div>
            </div>
            <span class="h5 mb-0" v-text="video.likes"></span>
        </div>
        <div class="views-container">
            <span class="h5 mx-3">Views:</span>
            <span class="h5 " v-text="video.views"></span>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        video: {
            required: true,
            type: Object
        },
    },
    data() {
        return {
            isActive: false,
        }
    },
    methods: {
        events() {
            this.isActive = !this.isActive;
            if(this.isActive) {
                this.$props.video.likes++;
            }else {
               this.$props.video.likes--;
            }
        }
    }
}
</script>
<style lang="scss" scoped>
.heart {
  width: 50px;
  height: 50px;
  background: url("https://cssanimation.rocks/images/posts/steps/heart.png") no-repeat;
  background-position: -25px -25px;
  cursor: pointer;
  transition: background-position 1s steps(28);
  transition-duration: 0s;
  -webkit-transform:scale(0.7);
    -moz-transform:scale(0.7);
    -ms-transform:scale(0.7);
    transform:scale(0.7);
//   transform: translate(-15%,-30%);
  
  &.active {
    transition-duration: 1s;
    background-position: -2825px -25px;
  }
}
.views-container {
    margin-left: auto;
    margin-right: 3rem;
}
.like-container {
    max-width: 1341px;
    display: flex;
    align-items: center;
    height: 50px;
    background: black;
    border-radius: 0px 0px 10px 10px;
}

</style>