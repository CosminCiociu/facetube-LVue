require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';

createApp({
    components: {
    }
}).use(router).mount('#app')

