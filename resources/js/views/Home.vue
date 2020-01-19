<template>
        <div id="home" class="row">
            <div class="loading-overlay ">
                <div class="loading-text text-center center-md-content" style="color: black">
                    <div class="user-name">
                        <h1 class="display-4">Leo Felipa</h1>
                    </div>
                    <div class="job-title mb-5">
                        <p>Web Developer & Graphic Designer </p>
                    </div>

                    <div class="text-center">
                        <router-link to="/web-development"><button class="btn btn-secondary mb-4" v-on:click="fadeLoadingOverlay">Web Development Projects</button></router-link>
                        <router-link to="/logo-design"><button class="btn btn-secondary mb-4" v-on:click="fadeLoadingOverlay">Logo Design Projects</button></router-link>
                        <router-link to="/graphic-design"><button class="btn btn-secondary mb-4" v-on:click="fadeLoadingOverlay">Graphic Design Projects</button></router-link>
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

            if ($('loading-overlay') != null ) {
                $('#top-bar').addClass('d-none');
                loadingOverlay();
            }
            function loadingOverlay() {
                $('.loading-overlay').removeClass('loading-overlay-animation')
                $('.loading-text');
            }
            

        },
        methods: {
            fadeLoadingOverlay()  {
                this.$parent.displayTopbar();
                $('.loading-overlay').addClass('loading-overlay-animation');
            },
  
        }
        
    }
</script>
