
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import JQuery from 'jquery';

window.$ = window.JQuery =  JQuery; 
import'popper.js';
import'bootstrap';
import'bootstrap/dist/css/bootstrap.min.css';


window.axios = require('axios');

Vue.prototype.$http = window.axios;



import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import App from './views/App'
import Home from './views/Home'
import About from './views/About'
import Work from './views/Work'
import WebDevelopment from './views/WebDevelopment'
import LogoDesign from './views/LogoDesign'
import GraphicDesign from './views/GraphicDesign'
import Blog from './views/Blog'
import BlogPost from './views/BlogPost'
import Contact from './views/Contact'


const router = new VueRouter({
    mode: 'history',
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
            path : '/work',
            name : 'work',
            component : Work,
            children: [
                {
                    path: 'web-development',
                    name: 'web-development',
                    component: WebDevelopment,
                },
                {
                    path: 'logo-design',
                    name: 'logo-design',
                    component: LogoDesign,
                },
                
        {
                    path: 'graphic-design',
                    name: 'graphic-design',
                    component: GraphicDesign,
                },
            ]
        },


        {
            path: '/blog',
            name: 'Blog',
            component: Blog,
            children: [
                
            ]
        },
        {
            path: '/blog/post/:id',
            name: 'Blog',
            component: BlogPost,
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
                   // return "https://lfelipa.com/";
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

