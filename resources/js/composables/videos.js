import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCompanies() {
    const videos = ref([])
    const video = ref([])
    const router = useRouter()
    const errors = ref('')
    const infoPaginate = ref({})
    const categories = ref([])

    const getVideos = async (page = 1,dateValue = 'mounth') => {
        let response = 
        await axios.get(`/api/videos?page=${page}&date=${dateValue}`)

        videos.value = response.data.data;
        
        infoPaginate.value = {
            current: response.data.current_page,
            last_page: response.data.last_page,
            per_page: response.data.per_page,
        }
    }

    const getVideo = async (id) => {
        let response = await axios.get('/api/videos/' + id)
        video.value = response.data.data;
    }

    const storeVideo = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/videos', data)
            await router.push({name: 'videos.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateVideo = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/videos/' + id, video.value)
            await router.push({name: 'videos.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyVideo = async (id) => {
        await axios.delete('/api/videos/' + id)
    }

    const getVideosByCategory = async (categoryId,page = 1,dateValue = 'alltime') => {
        let response = 
        await axios.get(`/api/categories/${categoryId}/?page=${page}&date=${dateValue}`)

        videos.value = response.data.data;
        
        infoPaginate.value = {
            current: response.data.current_page,
            last_page: response.data.last_page,
            per_page: response.data.per_page,
        }
    }

    const getVideosBySearch = async (keyword) => {
        let response = 
        await axios.get(`/api/search?keyword=${keyword}`)
        videos.value = response.data.videos;
        categories.value = response.data.categories;
        
    }

    const getRelatedVideosByCategory = async (categoryId,append=false) => {
        let response = 
        await axios.get(`/api/related-videos?categoryId=${categoryId}`)
        if(append) {
            videos.value = [...videos.value, ...response.data]
        }else {
            videos.value = response.data;
        }
    }

    return {
        videos,
        video,
        categories,
        errors,
        infoPaginate,
        getVideos,
        getVideo,
        storeVideo,
        updateVideo,
        destroyVideo,
        getVideosByCategory,
        getVideosBySearch,
        getRelatedVideosByCategory
    }
}
