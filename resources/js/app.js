require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';


import CompaniesIndex from './components/companies/CompaniesIndex.vue';

createApp({
    components: {
        CompaniesIndex
    }
}).use(router).mount('#app')

