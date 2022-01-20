import { createRouter, createWebHistory } from "vue-router";
import 'bootstrap';

import FrontpageIndex from '../components/frontpage/FrontpageIndex'
import VideosIndex from '../components/videos/VideosIndex'
import VideosCreate from '../components/videos/VideosCreate'
import VideosEdit from '../components/videos/VideosEdit'
import SingleVideo from '../components/frontpage/SingleVideo'

const routes = [
    {
        path: '/',
        name: 'home',
        component: FrontpageIndex
    },
    {
        path: '/:videoId/',
        name: 'single.video',
        component: SingleVideo,
        props: true
    },
    {
        path: '/admin/videos',
        name: 'videos.index',
        component: VideosIndex
    },
    {
        path: '/admin/videos/create',
        name: 'videos.create',
        component: VideosCreate
    },
    {
        path: '/admin/videos/:id/edit',
        name: 'videos.edit',
        component: VideosEdit,
        props: true
    }
]
export default createRouter({
    history: createWebHistory(),
    routes
})
