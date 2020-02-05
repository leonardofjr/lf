<template>
  <div id="contact" class="container page">
            <div class="page-title">
                <h1 >Contact Form</h1>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-8 mb-5 mb-md-0 ">
                    <p class="my-3">Please don't hesitate to contact me if you have any questions, comments or mesages. I'll try to response to.</p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Your Name">
                        <span class="invalid-feedback" role="alert">
                            <strong class="error-name"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email">
                        <span class="invalid-feedback" role="alert">
                            <strong class="error-email"></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="10" type="text" id="message" name="message" placeholder="Message"></textarea>
                        <span class="invalid-feedback" role="alert">
                            <strong class="error-message"></strong>
                        </span>
                    </div>
                    <div class="form-group text-right ">
                        <button class="btn btn-primary btn-danger btn-submit" v-on:click="sendMessage">Send</button>
                    </div>
                        <div class="alert alert-success pt-3 d-none" role="alert">
                            <strong>Your message has been sent.</strong>
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
                                <dd><a href="/LeoFelipa.vcf">Download</a></dd>
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
                    <div class="d-none">
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
                errors: [],
            }
        },
        mounted() {
             this.$parent.displayTopbar();

        },
        methods: {
            sendMessage() {
                axios({
                    url: this.web_url + '/api/mail',
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
                    if(response.data.status === 'errors') {
                        console.error(response.data.message);
                        this.validate('input[name="name"]', response.data.errors.name);
                        this.validate('input[name="email"]', response.data.errors.email);
                        this.validate('textarea[name="message"]', response.data.errors.message);

                    } else {
                        $('*').removeClass('is-invalid');
                        $('.btn-submit').attr('disabled', true);
                        $('.alert-success').removeClass('d-none')
                    }

                })
                .catch((error) => {
                    return error;
                })
            },
            
            validate(ele, err) {
                if (err) {
                    $(ele).addClass('is-invalid');
                    $(ele).siblings('span').children('strong').text(err[0]);

                } else {
                    $(ele).removeClass('is-invalid');
                }
            }
        },


    }
</script>
