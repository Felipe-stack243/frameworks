import { createRouter, createWebHistory } from 'vue-router';
import Inicio from '../components/Inicio.vue';
import Login from '../components/Login.vue';

const routes = [
    { path: '/', component: Inicio },
    { path: '/inicio', component: Inicio },
    { path: '/login', component: Login },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;