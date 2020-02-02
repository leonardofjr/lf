<template>
  <div id="contact" class="container page">
            <div class="page-title">
                <h1 >Contact Form</h1>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-8 ">
                    <p class="my-3">Please don't hesitate to contact me if you have any questions, comments or mesages. I'll try to response to.</p>
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
                        <button class="btn btn-primary float-right btn-danger" v-on:click="sendMessage">Send</button>
                    </div>
                </div>
                <div class="col-md-4 pl-5">
                    <h4>Contact information</h4>
                    <template v-if="this.$parent.data.phone && this.$parent.data.city && this.$parent.data.province">
                        <dl class="dl dl-vertical mb-5">
                            <div class="">
                                <dt>Phone</dt>
                                <dd><a :href="'tel:' + this.$parent.data.phone">{{this.$parent.data.phone}}</a></dd>
                            </div>
                            <div class="">
                                <dt>Email</dt>
                                <dd><a :href="'mailto:' + this.$parent.data.email">{{this.$parent.data.email}}</a></dd>
                            </div>
                            <div class="">
                                <dt>Address</dt>
                                <dd>{{this.$parent.data.city}}, {{this.$parent.data.province}}</dd>
                            </div>
                            <div class="">
                                <dt>vCard</dt>
                                <dd><a href="#">Download</a></dd>
                            </div>
                        </dl>
                    </template>
                    <div class="mb-5">
                        <h4>Networks</h4>
                        <!-- If twitter_url is not null -->
                        <span v-if="this.$parent.data.twitter_url" class="px-1">
                             <a :href="this.$parent.data.twitter_url"><i class="fab fa-2x fa-twitter mr-3"></i></a>
                        </span>
                        <!-- If linkedin_url is not null -->
                        <span v-if="this.$parent.data.linkedin_url" class="px-1">
                             <a :href="this.$parent.data.linkedin_url"><i class="fab fa-2x fa-linkedin-in mr-3"></i></a>
                        </span>
                        <!-- If facebook_url is not null -->
                        <span v-if="this.$parent.data.facebook_url" class="px-1">
                             <a :href="this.$parent.data.facebook_url"><i class="fab fa-2x fa-facebook mr-3"></i></a>
                        </span>
                        <!-- If github_url is not null -->
                        <span v-if="this.$parent.data.github_url" class="px-1">
                             <a :href="this.$parent.data.github_url"><i class="fab fa-2x fa-github mr-3"></i></a>
                        </span>
                    </div>
                    <div>
                        <h4>Quick links</h4>
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
