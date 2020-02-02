<template>
  <div id="contact" class="container page">
            <div class="page-title">
                <h1 class="display-4" >Contact Me</h1>
            </div>
            <p>I am available for hire and open to any ideas of cooperation.</p>
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="10" type="text" id="message" name="message" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" v-on:click="sendMessage">Send</button>
                    </div>
                </div>
                <div class="col-4">
                    <template v-if="this.$parent.data.phone && this.$parent.data.city && this.$parent.data.province">
                    <p>{{this.$parent.data.city}}, {{$parent.data.province}}, <br>{{this.$parent.data.phone}}</p>
                    </template>
                    <div>
                        <!-- If email is not null -->
                        <span v-if="this.$parent.data.email" class="px-1">
                            <a :href="'mailto:' + this.$parent.data.email"><i class="fas fa-2x fa-envelope"></i></a>
                        </span>
                        <!-- If twitter_url is not null -->
                        <span v-if="this.$parent.data.twitter_url" class="px-1">
                             <a :href="this.$parent.data.twitter_url"><i class="fab fa-2x fa-twitter"></i></a>
                        </span>
                        <!-- If linkedin_url is not null -->
                        <span v-if="this.$parent.data.linkedin_url" class="px-1">
                             <a :href="this.$parent.data.linkedin_url"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        </span>
                        <!-- If facebook_url is not null -->
                        <span v-if="this.$parent.data.facebook_url" class="px-1">
                             <a :href="this.$parent.data.facebook_url"><i class="fab fa-2x fa-facebook"></i></a>
                        </span>
                        <!-- If github_url is not null -->
                        <span v-if="this.$parent.data.github_url" class="px-1">
                             <a :href="this.$parent.data.github_url"><i class="fab fa-2x fa-github"></i></a>
                        </span>
                    </div>
                </div>
            </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                root: 'http://localhost:8000',
            }
        },
        mounted() {
             this.$parent.displayTopbar();

        },
        // Fetches posts when the component is created.
        created() {

        },
        methods: {
            sendMessage() {
                axios({
                    url: this.root + '/api/mail',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN' : this.$parent.csrf,
                    },
                    data: {
                        name: $('input[name="name"]').val(),
                        email: $('input[name="email"]').val(),
                        message: $('textarea[name="message"]').val(),
                    },
                })
                .then((response) => {
                    if(response.status === 200) {
                        console.log(response.data.message);
                        return response;
                    }
                })
                .catch((error) => {
                    return error;
                })
            }
        }

    }
</script>
