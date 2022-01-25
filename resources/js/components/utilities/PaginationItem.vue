<template>
    
    <li v-show="current - 1 > 0" v-if="index == 0"  class="page-item">
        <a class="page-link" @click="prev" aria-label="Previous">Previous</a>
    </li>
    <li v-show="current - 1 > 0"  v-if="index == 1"  class="page-item">
        <a class="page-link" @click="prev" aria-label="Page-{{ current }}">{{ current - 1 }}</a>
    </li>
    <li  v-if="index == 2"  class="page-item active">
        <a class="page-link" @click="prev" aria-label="Page-{{ current }}">{{ current }}</a>
    </li>
    <li v-if="index == 3"  class="page-item ">
        <a class="page-link" @click="next()" aria-label="Page-{{ current }}">{{ current + 1 }}</a>
    </li>
    <li v-if="index == 4"  class="page-item">
        <a class="page-link" @click="next()" aria-label="Previous">Next</a>
    </li>

         <!-- <li class="page-item"><a class="page-link" @click="prev" aria-label="Previous">Prev</a></li>
            <li class="page-item "><a class="page-link" href="javascript:void(0)">{{ current }}</a></li>
            <li class="page-item"><a class="page-link" @click="next()" aria-label="Next">Next</a></li> -->
</template>

<script>
export default {
    name: "Pagination-Item",
    props: {
        index: Number,
        current: Number,
        // current: Number,
        // next: Function,
    }
}
</script>

<style>

</style>