import { createRouter, createWebHistory } from 'vue-router';
import Laboratorios from '../components/Laboratorios.vue';
import Inicio from '../components/Inicio.vue';
import Login from '../components/Login.vue';
import ControlLaboratorios from '../components/controlLaboratorios.vue';

const routes = [
    { path: '/', component: Laboratorios },
    { path: '/inicio', component: Inicio },
    { path: '/laboratorios', component: Laboratorios },
    { path: '/login', component: Login },
    { path: '/controlLaboratorios', component: ControlLaboratorios },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;