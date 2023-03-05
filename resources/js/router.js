import {createRouter, createWebHashHistory} from 'vue-router';
import Home from "./components/Home.vue";
import Desks from "./components/desks/Desks.vue";

export default createRouter({
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/desks',
            component: Desks,
            name: 'desks'
        }
    ],
    history: createWebHashHistory()
});
