<template>
        <section id="about" class="container">
            <div class="page-title">
                <h2 class="h1">Web Developer & Graphic Designer<br> experienced in creating CRUD applications.</h2>
            </div>
            <div>
                <div v-html="this.$parent.data.bio"></div>
                <!--<button class="btn btn-primary">VIEW RESUME</button>-->
            </div>
            <div>
              <div v-html="this.$parent.data.skills_and_offer"></div>
                <!--<button class="btn btn-primary">VIEW RESUME</button>-->
            </div>
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
