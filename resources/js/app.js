require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';
import FrontpageIndex from './components/frontpage/FrontpageIndex';

createApp({
    components: {
        FrontpageIndex,
    }
}).use(router).mount('#app')

