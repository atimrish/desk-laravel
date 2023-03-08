import {createRouter, createWebHashHistory} from 'vue-router';
import Home from "./components/Home.vue";
import Desks from "./components/desks/Desks.vue";
import ShowDesk from "./components/desks/ShowDesk.vue";

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
        },
        {
            path: '/desks/:deskId',
            component: ShowDesk,
            name: 'showDesk',
            props: true
        }
    ],
    history: createWebHashHistory()
});
