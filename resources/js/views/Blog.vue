<template>
    <div id="blog" class="container">
            <div class="page-title">
                <h2>Blog</h2>
            </div>
            <div v-for="post of this.$parent.data.blog" class="row blog-item" :key="post.id">
                <div class="col-12 col-md-9">
                        <h2 class="project-title">{{post.title}}</h2>
                       <img :src="'/storage/imgs/' + post.image" class="img-fluid">
                        <p v-html="post.content"></p>
                       
                </div>
                <div class="col-12 col-md-3">

                </div>

            </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        // Fetches posts when the component is created.
        created() {

        },
    }
</script>

