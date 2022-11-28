import { createRouter, createWebHistory } from 'vue-router'
import Create from '../views/Create.vue';
import Content from '../views/Content.vue';


const routes = [{
    path: '/',
    name: 'Content',
    component: 'Content'
}, {
    path: '/create',
    name: 'Create',
    component: 'Create'
}];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;