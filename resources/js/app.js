import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';
import App from "./components/App.vue";
import router from './router';

createApp(App)
    .use(router)
    .mount('#app');
