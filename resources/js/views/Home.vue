<template>
        <div id="home" class="row">
            <div class="loading-overlay ">
                <div class="loading-text text-center center-md-content" style="color: black">
                    <h1>Leo Felipa</h1>
                    <p>Web Developer & Graphic Designer </p>
                </div>
            </div>


            <div class="home-background d-none d-lg-block">

            </div>
            <div class="content center-md-content">
                <div class="home-buttons text-center">
                    <router-link to="/web-development"><button class="btn btn-secondary">Web Development Projects</button></router-link>
                    <router-link to="/logo-design"><button class="btn btn-secondary">Logo Design Projects</button></router-link>
                    <router-link to="/graphic-design"><button class="btn btn-secondary">Graphic Design Projects</button></router-link>
                </div>
                <!--
                <div class="form-inline">
                    <button class="create-dialog-box-btn btn btn-primary mb-2 col-12 col-lg-5" >Change Name</button>
                    <div class="col-lg-5 input-dialog-box form-group mb-2"></div>
                </div>
                -->
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
                a();
            }

            function a() {
                clearTimeout(a);
                var a = setTimeout(function() {
                    $('.loading-overlay').removeClass('loading-overlay-animation')
                    $('.loading-text').fadeOut(1000, function() {
                    $('.loading-overlay').addClass('loading-overlay-animation');

                    });
                }, 1000)
            }
        },
        
    }
</script>
