
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import './bootstrap.js';

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const  App = () => System.import('./views/App');
const  Home = () => System.import('./views/Home');
const  About = () => System.import('./views/About');
const  Work = () => System.import('./views/Work');
const  WebDevelopment = () => System.import('./views/WebDevelopment');
const  LogoDesign = () => System.import('./views/LogoDesign');
const  GraphicDesign = () => System.import('./views/GraphicDesign');
const  Blog = () => System.import('./views/Blog');
const  BlogPost = () => System.import('./views/BlogPost');
const  Contact = () => System.import('./views/Contact');


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
                   //return "https://lfelipa.com/";
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

