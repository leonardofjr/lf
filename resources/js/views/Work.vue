<template>
        <section id="work" class="container page">
            <div class="page-title">
                <h1 >Work</h1>
            <div class="nav justify-content-end">
                <router-link to="/work/web-development/" class="nav-item nav-link" exact>Web Development</router-link>
                <router-link to="/work/logo-design/" class="nav-item nav-link" exact>Logo Design</router-link>
                <router-link to="/work/graphic-design/" class="nav-item nav-link" exact>Graphic Design</router-link>
                </div>
                <hr>
            </div>

                <transition 
                    name="fade"
                    mode="out-in"
                >
                     <router-view></router-view>
                </transition>
        </section>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        mounted() {
              this.$parent.displayTopbar();


        },
        // Fetches posts when the component is created.
        created() {

        },
    }
</script>
