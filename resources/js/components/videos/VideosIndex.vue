<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link :to="{ name: 'videos.create' }" class="btn btn-primary">Create Video</router-link>
            </div>
        </div>

        <table class="table table-striped w-100 text-center min-w-full border divide-y divide-gray-200">
            <thead class="thead-dark">
            <tr>
                <th class="px-6 py-3 bg-gray-50 col">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Title</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 col">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">ImageUrl</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 col">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">VideoUrl</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 col">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Duration</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 col">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Action</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in videos" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.title }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <a target="_blank" rel="noopener noreferrer" :href="item.imageUrl">{{ item.imageUrl }}</a>
                        
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <a target="_blank" rel="noopener noreferrer" :href="item.videoUrl">{{ item.videoUrl }}</a>
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.duration }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 d-flex whitespace-no-wrap">
                        <router-link :to="{ name: 'videos.edit', params: { id: item.id } }"
                                     class="btn btn-dark transition ease-in-out duration-150">
                            Edit
                        </router-link>
                        <button  x-on:click="deleteVideo(item.id)"
                                class="btn btn-danger">
                        Delete</button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useVideos from "../../composables/videos";
import { onMounted } from "vue";

export default {
    setup() {
        const { videos, getVideos, destroyVideo } = useVideos()

        onMounted(getVideos)

        const deleteVideo = async (id) => {
            if (!window.confirm('Are you sure?')) {
                return
            }

            await destroyVideo(id);
            await getVideos();
        }

        return {
            videos,
            deleteVideo
        }
    }
}
</script>