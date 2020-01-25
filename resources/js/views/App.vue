<template>     
      <main>
        <div id="phone-btn" class="d-md-none">
            <a :href='"tel://" + data.phone' >
              <img src="imgs/phone-icon.png">
            </a>
        </div>
        <div id="top-bar" class="navbar navbar-light fixed-top d-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
                <div class="dropdown">
                <!-- If user is null -->  
                <template  v-if="!user" class="mr-3 my-3 text-right">
                        <a href="/admin/login">Login</a> 
                        <a href="/admin/register">Register</a>
                </template>

                <!-- else if user data is returned -->
                <template v-else  >

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                {{data['fname']}}<span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/admin/profile">
                                    Settings
                                </a>
                                <a class="dropdown-item" href="/logout"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                  <!-- the value for the csrf value will be set to the hidden csrf value that is placed on the head -->
                                  <input type="hidden" name="_token" :value="csrf">
                                </form>
                            </div>

                </template>
              </div>
</div>

        <aside id="sidebar" class="sidebar-bg">
      
            <div class="aside-inner">

              <!-- User -->
              <div class="user">
                <!-- User Avatar -->
                <div class="user-avatar d-flex justify-content-center">
                    <router-link to="/"  class="navbar-brand"  exact>
                      <img v-if="this.data.profile_image" :src='"/storage/" + this.data.profile_image' alt="" class="avatar img-fluid rounded-circle mt-4">
                      <img v-else src="/imgs/logo.png" alt="" class="avatar img-fluid rounded-circle mt-4">
                    </router-link>
                </div>
                
                <!-- User Name -->
                <div  class="user-name d-flex justify-content-center">
                  <router-link to="/"  class="navbar-brand text-uppercase"  exact >{{data['fname']}} {{data['lname']}}</router-link>
                </div>
                
                <!-- User Job Title -->
                <div class="user-title">
                <router-link to="/">
                  <h2 class="user-title-style text-center h5 ">Web Developer</h2>
                  </router-link>
                </div>
              </div>
              <!-- Navigation Links -->
              <nav class="navbar  my-3 ">            


                      <div class="primary-menu">
                          <router-link to="/web-development/" class="nav-item nav-link" exact>Web Development</router-link>
                          <router-link to="/logo-design/" class="nav-item nav-link" exact>Logo Design</router-link>
                          <router-link to="/graphic-design/" class="nav-item nav-link" exact>Graphic Design</router-link>
                          <div class="mt-3">
                            <router-link to="/blog" class="nav-item nav-link">Blog</router-link>
                            <router-link to="/about" class="nav-item nav-link" exact>About</router-link>
                            <router-link to="/contact" class="nav-item nav-link">Let's Talk</router-link>
                          </div>
                      </div>
              </nav>

              <div class="block-social py-1 pl-3 d-none d-lg-block">
                  <!-- Contact link icons -->
                  <p class="pb-1 pl-0 block-title">Get In touch</p>
                  <!-- If email is not null -->
                  <span v-if="data.email" class="px-1">
                        <a :href="'mailto:' + data.email">
                          <i class="fas fa-2x fa-envelope"></i>
                        </a>
                    </span>
                    <!-- If twitter_url is not null -->
                    <span v-if="data.twitter_url" class="px-1">
                        <a :href="data.twitter_url">
                          <i class="fab fa-2x fa-twitter"></i>
                          </a>
                    </span>
                    <!-- If linkedin_url is not null -->
                    <span v-if="data.linkedin_url" class="px-1">
                        <a :href="data.linkedin_url" class="px-1">
                          <i class="fab fa-2x fa-linkedin-in"></i> 
                        </a>
                    </span>
                    <!-- If facebook_url is not null -->
                    <span v-if="data.facebook_url" class="px-1">
                      <a :href="data.facebook_url">
                        <i class="fab fa-2x fa-facebook"></i>
                      </a>
                    </span>
                    <!-- If github_url is not null -->
                    <span v-if="data.github_url" class="px-1">
                        <a :href="data.github_url">
                          <i class="fab fa-2x fa-github"></i>
                        </a>
                    </span>
                </div>
              </div> <!-- .aside-inner ends here -->
              
          </aside>

          <section id="content" class="container-fluid" style="position: absolute">
                <transition name="fade">
                  <router-view>
                  
                  </router-view>
                  
              </transition>
          </section>
      </main>
</template>

<script>
 export default {
   name: 'App',
   data() {
     return {
        data: [],
        csrf: $('meta[name="csrf-token"]').attr('content'),
        user: false,
     };
   },
  created() {
        axios({
          method: 'get',
          url: this.web_url + 'api/user',
        })
        .then(response => {
          console.log(response);
          if (!response.data['logged_in']) {
            this.data = response.data;
            this.user = false;
          } else {
            this.data = response.data;
            this.user = true;

          }
        // JSON responses are automatically parsed.
        })
        .catch(e => {
              this.errors.push(e)
        });
  },
  methods: {
          displayTopbar() {
                $('#top-bar').removeClass('d-none');
            },
          back() {
               this.$router.go(-1);
            },

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
  }
}
</script>

