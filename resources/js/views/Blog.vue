<template>
    <div id="blog" class="container">
            <div class="page-title">
                <h1 class="h1">Blog</h1>
            </div>
            <div v-for="post of this.$parent.data.blog" class="d-flex justify-content-center blog-item" :key="post.id" >
                <div class="text-center" style="width: 80%">
                        <h2 class="title">{{post.title}}</h2>
                        <p class="created-at">{{date(post.created_at)}}</p>
                       <img :src="'/storage/imgs/' + post.image" class="img-fluid">
                        <p v-html="excerpt(post.content, 150)"></p>
                        <a href="#">Read more</a>
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
                month[0] = "January";
                month[1] = "February";
                month[2] = "March";
                month[3] = "April";
                month[4] = "May";
                month[5] = "June";
                month[6] = "July";
                month[7] = "August";
                month[8] = "September";
                month[9] = "October";
                month[10] = "November";
                month[11] = "December";
                return month[date.getMonth()] + ' ' + date.getDate() + ',' + date.getFullYear();
            },
        },
        mounted() {
            console.log('Component mounted.')
        },
        // Fetches posts when the component is created.
        created() {

        },
    }
</script>

