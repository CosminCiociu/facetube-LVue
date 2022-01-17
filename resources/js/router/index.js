import { createRouter, createWebHistory } from "vue-router";
import 'bootstrap';

import CompaniesIndex from '../components/companies/CompaniesIndex'
import CompaniesCreate from '../components/companies/CompaniesCreate'
import CompaniesEdit from '../components/companies/CompaniesEdit'
import VideosIndex from '../components/videos/VideosIndex'
import VideosCreate from '../components/videos/VideosCreate'
import VideosEdit from '../components/videos/VideosEdit'

const routes = [
    {
        path: '/dashboard',
        name: 'companies.index',
        component: CompaniesIndex
    },
    {
        path: '/companies/create',
        name: 'companies.create',
        component: CompaniesCreate
    },
    {
        path: '/companies/:id/edit',
        name: 'companies.edit',
        component: CompaniesEdit,
        props: true
    },
    {
        path: '/videos',
        name: 'videos.index',
        component: VideosIndex
    },
    {
        path: '/videos/create',
        name: 'videos.create',
        component: VideosCreate
    },
    {
        path: '/videos/:id/edit',
        name: 'videos.edit',
        component: VideosEdit,
        props: true
    }
]
export default createRouter({
    history: createWebHistory(),
    routes
})
