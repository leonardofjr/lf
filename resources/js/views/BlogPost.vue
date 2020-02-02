<template>
    <div id="blog" class="container page">
            <div class="page-title">
                <h1 >Blog</h1>
                <hr>
            </div>
            <div v-for="post of this.$parent.data.blog" class="d-flex justify-content-center blog-item" :key="post.id" >
                <template v-if="params === post.slug">
                    <div class="text-center" style="width: 80%">
                            <h2 class="title">{{post.title}}</h2>
                            <p class="created-at">{{$parent.date(post.created_at)}}</p>
                            <img :src="post.image ? '/storage/'+ post.image : 'https://via.placeholder.com/500/333333/FFFFFF/?text=no%20image%20selected'" class="img-fluid my-5">                            <p v-html="post.content"></p>
                            <button class="btn btn-primary mt-4" v-on:click="$parent.back">Go Back</button >
                    </div>
                </template>
            </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                params: this.$router.currentRoute.params.id,
            }
        },
        methods: {

        },
        mounted() {
            console.log(this.$router.currentRoute.params.id);
              this.$parent.displayTopbar();
        },
        // Fetches posts when the component is created.
        created() {

        },
    }
</script>

