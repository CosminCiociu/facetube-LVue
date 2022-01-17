import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCompanies() {
    const videos = ref([])
    const video = ref([])
    const router = useRouter()
    const errors = ref('')

    const getVideos = async () => {
        let response = await axios.get('/api/videos')
        videos.value = response.data.data;
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
            await axios.put('/api/videos/' + id, company.value)
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


    return {
        videos,
        video,
        errors,
        getVideos,
        getVideo,
        storeVideo,
        updateVideo,
        destroyVideo
    }
}
