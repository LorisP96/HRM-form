import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


import FormPage from './pages/FormPage.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'form',
            component: FormPage
        },
    ]
});

export default router;