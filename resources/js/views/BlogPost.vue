<template>
    <div id="blog" class="container">
            <div class="page-title">
                <h1 >Blog</h1>
            </div>
            <div v-for="post of this.$parent.data.blog" class="d-flex justify-content-center blog-item" :key="post.id" >
                <div class="text-center" style="width: 80%">
                        <h2 class="title">{{post.title}}</h2>
                        <p class="created-at">{{date(post.created_at)}}</p>
                       <img :src="'/storage/imgs/' + post.image" class="img-fluid">
                        <p v-html="excerpt(post.content, 150)"></p>
                        <button class="btn btn-primary" v-on:click="$parent.back">Go Back</button >
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
            excerpt(input, length) {
                let output;
                output = input.substring(0, length)
                return output + '...';
            },
            date(input) {
                let date = new Date(input);
                var month = new Array();
                month = [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ];
 
                return month[date.getMonth()] + ' ' + date.getDate() + ',' + date.getFullYear();
                // output example: January 1, 2050
            },
        },
        mounted() {
              this.$parent.displayTopbar();
        },
        // Fetches posts when the component is created.
        created() {

        },
    }
</script>

