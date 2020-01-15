<template>     
      <div class="row">
        <div class="top-navbar navbar navbar-light  fixed-top ">
            <button class="sidebar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                <ul  class="navbar-nav ml-auto">
                <!-- If user is null -->  
                <template  v-if="!user" class="mr-3 my-3 text-right">
                    <li class="nav-item">
                          <a  class="ml-2" href="/admin/login">Login</a> 
                    </li>
                    <li class="nav-item">
                        <a  class="ml-2" href="/admin/register">Register</a>
                    </li>
                </template>

                <!-- else if user data is returned -->
                <template v-else  >
                      <li class="nav-item dropdown">
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
                        </li>
        
                </template>
              </ul>
        </div>
        <aside class="sidebar-bg">
      
            <div class="aside-inner">

              <!-- User -->
              <div class="user">
                <!-- User Avatar -->
                <div class="user-avatar d-flex justify-content-center">
                    <router-link to="/"  class="navbar-brand"  exact>
                      <img v-if="this.data.profile_image" :src='"/storage/logo/" + this.data.profile_image' alt="" class="avatar img-fluid rounded-circle mt-4">
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

          <main id="frontend" class="content">
                <transition name="fade">
                  <router-view>
                  
                  </router-view>
                  
              </transition>
          </main>
      </div>
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
          url: this.web_url + 'get-user-settings',
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

  }
}
</script>

