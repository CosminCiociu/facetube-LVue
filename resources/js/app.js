require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router'
import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';
import Search from './components/utilities/Search';

// import AutocompleteComponent from './components/utilities/AutocompleteComponent';

createApp({
    components: {
        Search,
        // AutocompleteComponent
    }
}).use(router).mount('#app')


