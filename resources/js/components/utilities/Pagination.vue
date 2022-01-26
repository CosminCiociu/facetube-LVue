<template>
    <div class="col-12 mt-4 pt-2">
        <ul class="pagination justify-content-center mb-0">
           <li v-show="current - 1 > 0"  class="page-item">
                <a class="page-link " @click="prev" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                        Previous
                </a>
            </li>
            <li v-show="current - 1 > 0" class="page-item">
                <a class="page-link " @click="prev" aria-label="Page-{{ current }}">{{ current - 1 }}</a>
            </li>
            <li class="page-item active">
                <a class="page-link " @click="prev" aria-label="Page-{{ current }}">{{ current }}</a>
            </li>
            <li v-show="current < total" class="page-item ">
                <a class="page-link " @click="next()" aria-label="Page-{{ current }}">{{ current + 1 }}</a>
            </li>
            <li v-show="current < total" class="page-item">
                <a class="page-link " @click="next()" aria-label="Previous">Next
                    <span aria-hidden="true">&raquo;</span>
                </a>
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

<style scoped>
.pagination > li > a
{
    background-color: white;
    color: #404040;
    cursor: pointer;
}

.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover
{
    color: #5a5a5a;
    background-color: #eee;
    border-color: #ddd;
}

.pagination > .active > a
{
    color: white;
    background-color: #404040 !Important;
    border: solid 1px #5A4181 !Important;
}

.pagination > .active > a:hover
{
    background-color: #404040 !Important;
    border: solid 1px #5A4181;
}
</style>