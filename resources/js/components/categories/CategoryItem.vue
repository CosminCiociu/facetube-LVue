<template>
  <!--Card-->
        <div class="card" >
            <router-link :to="{ name: 'single.category', params: {categoryId: category.id } }" class="text-decoration-none text-dark ">
                <div class="image-category-container">
                    <img class="test-img" :src="category.imageUrl" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ category.title }}</h5>
                    <span class="video-no">( {{ category.videoNo }} )</span>
                </div>
            </router-link>
        </div>
</template>

<script>
export default {
    props: {
        category: Object,
    }
}
</script>

<style scoped>
    .test-img {
        width: 100%;
        height: 15vw !important;
        object-fit: fill;
        max-width: 100%;
        /* object-position: bottom; */
     }  
    .image-category-container{
        position: relative;
    }
    .card {
        background-color: transparent;
        border: 0;
        /* border-radius: 5px; */
        /* box-shadow: 0 4px 10px 0 rgb(40 49 53 / 20%);  */
        overflow: hidden;
        margin-top: 10px;
        position: relative;
        /* -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); */
        /* -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); */
    }
    .card:hover {
        opacity: 0.9;
        transition: all 0.2s ease-out;
        box-shadow: 4px 0 8px #8c8c8c;
        top: -4px;
        border: 0;
        /* background-color: white; */
    }
    .card-body {
        display: flex;
        border-radius: 10px 0 0 10px;
        padding: 0.5rem 0.5rem 0 0;
    }
    .card-body {
        border-radius: 10px 0 0 10px;
        padding: 0.5rem 0.5rem 0 0;
    }
    .video-no {
        padding-left: 5px;
        opacity: 0.7;
        font-size: 14px;
    }
</style>