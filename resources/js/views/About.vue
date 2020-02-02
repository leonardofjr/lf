<template>
        <section id="about" class="container page">
            <div class="page-title">
                <h1 >About</h1>
                <hr>
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
