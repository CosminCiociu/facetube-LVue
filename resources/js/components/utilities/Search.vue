<template>
  <form class="d-flex" @submit.prevent="submitSearch"> 
        <input v-model="searchInput" class="form-control mr-2 search-custom " type="search" placeholder="Search video" aria-label="Search"> 
        <button class="btn btn-outline-warning hover-white-text" type="submit">Search</button> 
    </form>
</template>

<script>
export default {
    data() {
        return {
            searchInput: '',
        }
    },
    methods: {
        submitSearch(e) {
            console.log(this.searchInput)
            e.preventDefault();
            // this.$emit('submit', this.searchInput)
        }
    } 
}

</script>

<style scope>

/* Search bar styles */
.search-custom:focus {
    --tw-ring-shadow :#fb923c !important;
    border-color: #fb923c !important;
    background-color: #8C8C8C;
    color: #fff;
}
.search-custom::placeholder {
    color: #fff;
    background-color: #8C8C8C;
    font-size: 14px;
    opacity: 0.9;
}
.search-custom {
    background-color: #8C8C8C !important;
    border-radius: 20px;
}

.hover-white-text {
    border-color: #6b7280;
}

.hover-white-text:hover {
    color: #fff;
    border-color: #fb923c;
    background-color: #fb923c;
}
.hover-white-text:focus {
    box-shadow: none !important;

}
</style>