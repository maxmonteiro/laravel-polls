/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'


Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: require('./components/PollsComponent.vue').default
    },
    {
        path: '/poll/add',
        component: require('./components/AddPollComponent.vue').default
    },
    {
        path: '/poll/vote/:id',
        name: 'vote-poll',
        component: require('./components/VotePollComponent.vue').default
    },
    {
        path: '/poll/status/:id',
        name: 'status-poll',
        component: require('./components/PollStatusComponent.vue').default
    },
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    router
}).$mount('#app')
