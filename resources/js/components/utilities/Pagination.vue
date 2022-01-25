<template>
    <div class="col-12 mt-4 pt-2">
        <ul class="pagination justify-content-center mb-0">
           <li v-show="current - 1 > 0"  class="page-item">
                <a class="page-link" @click="prev" aria-label="Previous">Previous</a>
            </li>
            <li v-show="current - 1 > 0" class="page-item">
                <a class="page-link" @click="prev" aria-label="Page-{{ current }}">{{ current - 1 }}</a>
            </li>
            <li    class="page-item active">
                <a class="page-link" @click="prev" aria-label="Page-{{ current }}">{{ current }}</a>
            </li>
            <li v-show="current < total" class="page-item ">
                <a class="page-link" @click="next()" aria-label="Page-{{ current }}">{{ current + 1 }}</a>
            </li>
            <li v-show="current < total" class="page-item">
                <a class="page-link" @click="next()" aria-label="Previous">Next</a>
            </li>
        </ul>
    </div>
</template>

<script>
// import paginationItem from './PaginationItem';

export default {
    name: "Pagination",
    components: {
        // paginationItem,
    },
    props: {
        prev: Function,
        current: Number,
        next: Function,
        total: Number,
    },
    data() {
        return {
            numberOfElements: 5,
        }
    }
}
</script>

<style>

</style>