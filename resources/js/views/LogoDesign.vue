<template>
    <div id="logo_design" class="container page">
        <div v-for="post of this.$parent.$parent.data.portfolio" class="row portfolio-item" :key="post.id">
            <template v-if='post.type === "logo_design"'>
            <div class="col-12 col-md-4">
                            <img :src="post.image ? '/storage/'+ post.image : 'https://via.placeholder.com/500/333333/FFFFFF/?text=no%20image%20selected'" class="img-fluid">
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
        this.$parent.$parent.displayTopbar();

    }
}

</script>