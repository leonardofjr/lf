<template>
    <div id="blog" class="container page">
            <div class="page-title">
                <h1 class="display-4" >Blog</h1>
            </div>
            <div v-for="post of this.$parent.data.blog" class="d-flex justify-content-center blog-item" :key="post.id" >
                <div class="text-center" style="width: 80%">
                        <h2 class="title">{{post.title}}</h2>
                        <p class="created-at">{{$parent.date(post.created_at)}}</p>
                       <img :src="'/storage/imgs/' + post.image" class="img-fluid">
                        <p v-html="$parent.excerpt(post.content, 150)"></p>
                        <router-link :to="'blog/post/' + post.slug">Read more</router-link>
                        <div class="my-5">
                            <hr>
                        </div>
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
        methods: {

        },
        mounted() {
              this.$parent.displayTopbar();
        },
        // Fetches posts when the component is created.
        created() {

        },
    }
</script>

