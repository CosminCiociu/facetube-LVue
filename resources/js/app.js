require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';
import Search from './components/utilities/Search';

createApp({
    components: {
        Search,
    }
}).use(router).mount('#app')


