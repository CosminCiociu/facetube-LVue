import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCategory() {
    const categories = ref([])
    const category = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCategories = async () => {
        let response = await axios.get('/api/categories')
        categories.value = response.data.data;
        // console.log(categories.value);
        // debugger
    }

    const getCategory = async (id) => {
        let response = await axios.get('/api/categories/' + id)
        category.value = response.data.data;
    }

    const storeCategory = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/categories', data)
            await router.push({name: 'categories.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateCategory = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/categories/' + id, category.value)
            await router.push({name: 'categories.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyCategory = async (id) => {
        await axios.delete('/api/categories/' + id)
    }


    return {
        categories,
        category,
        errors,
        getCategories,
        getCategory,
        storeCategory,
        updateCategory,
        destroyCategory
    }
}
