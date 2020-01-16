<template>
    <div id="graphic_design" class="container">
        <div class="page-title">
            <h1>Graphic Design</h1>
        </div>
            <div v-for="post of this.$parent.data.portfolio" class="row portfolio-item" :key="post.id">
                <template v-if='post.type === "graphic_design"'>
                <div class="col-12 col-md-5">
                        <h2 class="project-title"> <a :href="post.website_url">{{post.title}}</a></h2>
                        <p v-html="post.description"></p>
                       
                </div>
                <div class="col-12 col-md-7">
                       <img :src="'/storage/imgs/' + post.image" class="img-fluid">
                </div>
                </template>
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