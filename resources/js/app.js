
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Bootstrap from './bootstrap.js';

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Home from './views/Home'
import About from './views/About'
import Portfolio from './views/Portfolio'
import Blog from './views/Blog'
import Contact from './views/Contact'


const router = new VueRouter({
    mode: '',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path : '/about',
            name : 'about',
            component : About
        },
        {
            path: '/portfolio',
            name: 'portfolio',
            component: Portfolio,
            meta: { transitionName: 'slide' }
        },
        {
            path: '/blog',
            name: 'Blog',
            component: Blog,
        },
        {
            path: '/contact',
            name: 'Contact Me',
            component: Contact,
            meta: { transitionName: 'slide' },
        }
    ]
});

// inject a handler for `myOption` custom option
Vue.mixin({
    data: function () {
            return {
                get web_url() {
                   // return "https://leojr.me/api/";
                    return "http://localhost:8000/";
        }
    }
}
    
})


const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

