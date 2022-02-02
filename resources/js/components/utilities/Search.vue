<template>
  <form class="d-flex"> 
        <input 
            @focus="magic_flag = true" 
            @blur="delayClose"
            v-on:keyup.enter="delayClose"
            v-model="keyword" 
            class="form-control mr-2 search-custom " 
            type="search" 
            placeholder="Search video" 
            aria-label="Search"/> 
    <router-link :to="{ path: '/search',  query: {keyword: keyword } }" >
        <button 
            class="btn btn-outline-warning hover-white-text" 
            type="submit">
            Search
        </button> 
    </router-link>
        <div v-show="magic_flag" id='autocomplete_holder'>
            <div id='autocomplete'>
                <ul class="autocomplete-items-list custom-ul" role="listbox" v-if="videos.length > 0">
                    <router-link v-for="video in videos" :key="video.id" :to="{ name: 'single.video', params: {videoId: video.id } }" class="text-decoration-none text-dark ">
                        <li class="autocomplete-item custom-li"   >
                                {{ video.title }}
                        </li>
                    </router-link>

                </ul>
            </div>
        </div>
        
    </form>
    
</template>

<script>
export default {
    data() {
        return {
            keyword: null,
            videos: [],
            magic_flag: false
        };
    },
    watch: {
        keyword(after, before) {
            if(after.length > 2){
                this.getResults();
            }
        }
    },
    methods: {
        getResults() {
            axios.get('/api/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.videos = res.data)
                .catch(error => {});
        },delayClose() {
            setTimeout(() => {
                this.magic_flag=false
                }, 100);
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
#autocomplete_holder {
    position: absolute;
    top: 50px;
    width: 200px;
    margin-top: 5px;
}
.custom-li {
    padding: 0.5rem 0.75rem;
    line-height: 1.5rem;
    font-size: 1rem;
    background: #7e8085;
    border: 1px solid;
    cursor: pointer;
}
.custom-li:hover {
    background: #424244;
}

</style>