<template>
    <div id="web_development" class="container">
        <div class="page-title">
            <h1>Web Development</h1>
        </div>
            <div v-for="post of this.$parent.data.portfolio"  :key="post.id">
                <template v-if='post.type === "web_development"'>
                    <div class="row portfolio-item flex align-items-center">
                        <div class="col-12 col-md-7">
                            <img :src="'/storage/imgs/' + post.image" class="img-fluid">
                        </div>
                        <div class="col-12 col-md-5">
                                <h2 class="project-title"> <a :href="post.website_url">{{post.title}}</a></h2>
                                <p v-html="post.description"></p>
                        </div>
                    </div>
                </template>
                <div class="my-5">
                    <hr>
                </div>
            </div>
        </div>
</template>
<script>

import axios from 'axios';

export default {
    data() {
        return {

        }
    },
    methods: {
        getPostBody (post) {
            this.body = this.stripTags(post);

            return this.body.length > 50 ? this.body.substring(0, 50) + '...' : this.body;           
        },

        stripTags (text) {
            return text.replace(/(<([^>]+)>)/ig, '');
        } 

    },

    // Fetches posts when the component is created.
    mounted() {
        this.$parent.displayTopbar();
    }
}

</script>