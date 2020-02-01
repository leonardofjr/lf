<template>
        <div id="home" class="row">
                <div class="loading-overlay ">
                </div>
                <div class="content-wrapper">
                    <div class="content text-center center-md-content" style="color: black">
                        <div class="user-name" v-if="this.$parent.data.fname && this.$parent.data.lname">
                            <h1 class="display-4">{{this.$parent.data.fname + ' ' + this.$parent.data.lname}}</h1>
                        </div>
                        <div class="job-title mb-5">
                            <p>Web Developer & Graphic Designer </p>
                        </div>


                        <div class="text-center btns-wrapper">
                        <router-link class="d-block d-md-inline-block" to="/web-development"><button class="btn btn-secondary mb-4" v-on:click="fadeLoadingOverlay">Web Development</button></router-link>
                        <router-link class="d-block d-md-inline-block" to="/logo-design"><button class="btn btn-secondary mb-4" v-on:click="fadeLoadingOverlay">Logo Design</button></router-link>
                        <router-link class="d-block d-md-inline-block" to="/graphic-design"><button class="btn btn-secondary mb-4" v-on:click="fadeLoadingOverlay">Graphic Design</button></router-link>
                </div>
                    </div>
                </div>

        </div>
</template>

<script>
    export default {
        data() {
            return {

            };
        },
        mounted() {

            if ($('.loading-overlay') != null ) {
                $('body').removeClass('overflow-auto');
                $('#top-bar').addClass('d-none');
                $('body').addClass('overflow-hidden');
                $('.loading-overlay').addClass('loading-overlay-animation');
                $('.btns-wrapper').addClass('home-btns-animation');

            } 
            

        },
        methods: {
            fadeLoadingOverlay()  {
                this.$parent.displayTopbar();
                $('body').removeClass('overflow-hidden');
                $('body').addClass('overflow-auto')
                $('.loading-overlay').addClass('loading-overlay-animation');
            },
  
        }
        
    }
</script>
