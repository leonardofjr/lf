<template>

        <div id="home" class="row">
      
                <div class="content-wrapper">
                    <div class="content text-center center-md-content">
                        <div class="user-name mb-3" v-if="this.$parent.data.fname && this.$parent.data.lname">
                            <h1>{{this.$parent.data.fname + ' ' + this.$parent.data.lname}}</h1>
                        </div>
                        <div class="short-description mb-5">
                            <p>A <b>self-motivated</b> full-stack <b>web developer</b> specializing in developing <b>dynamic web applications</b></p>
                        </div>

                        <div class="text-center btns-wrapper">
                            <router-link class="d-block d-md-inline-block" to="/work/web-development"><button class="btn btn-danger" v-on:click="fadeLoadingOverlay">View work</button></router-link>
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

            if ($('.loading-overlay') != null) {
                $('body').removeClass('overflow-auto');
                $('#top-bar').addClass('d-none');
                $('body').addClass('overflow-hidden');
                $('.loading-overlay').addClass('loading-overlay-animation');

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
