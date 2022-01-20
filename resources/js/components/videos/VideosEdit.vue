<template>
    <div v-if="errors">
      <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
        <p v-for="error in v" :key="error" class="text-sm">
          {{ error }}
        </p>
      </div>
    </div>
    <form class="space-y-6" v-on:submit.prevent="saveVideo">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="title" class="form-label block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-3">
                    <input type="text" name="title" id="title"
                           class="form-control block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="video.title">
                </div>
            </div>

            <div>
                <label for="imageUrl" class="form-label block text-sm font-medium text-gray-700">Image Url</label>
                <div class="mt-3">
                    <input type="text" name="imageUrl" id="imageUrl"
                           class="form-control block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="video.imageUrl">
                </div>
            </div>

            <div>
                <label for="videoUrl" class="form-label block text-sm font-medium text-gray-700">Video Url</label>
                <div class="mt-3">
                    <input type="text" name="videoUrl" id="videoUrl"
                           class="form-control block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="video.videoUrl">
                </div>
            </div>

            <div>
                <label for="duration" class="form-label block text-sm font-medium text-gray-700">Duration</label>
                <div class="mt-3">
                    <input type="text" name="duration" id="duration"
                           class="form-control block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="video.duration">
                </div>
            </div>
        </div>
        <router-link :to="{ name: 'videos.index' }" type="button"
                class="btn btn-secondary float-right mt-3 px-3 ">
            Back
        </router-link>
        <button type="submit"
                class="btn btn-primary float-right mt-3 px-3">
            Save
        </button>
    </form>
</template>

<script>
import useVideos from "../../composables/videos";
import {onMounted} from "vue";

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, video, getVideo, updateVideo } = useVideos()

        onMounted(getVideo(props.id))

        const saveVideo = async () => {
            await updateVideo(props.id)
        }

        return {
            errors,
            video,
            saveVideo
        }
    }
}
</script>
