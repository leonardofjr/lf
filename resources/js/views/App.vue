<template>     
      <main>
        <div id="phone-btn" class="d-md-none">
            <a :href='"tel://" + data.phone' >
              <img src="imgs/phone-icon.png">
            </a>
        </div>
        <div id="top-bar" class="navbar navbar-light fixed-top d-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" v-on:click="toggleNav($event)">
              <span class="navbar-toggler-icon"></span>
            </button>
            
                <div class="dropdown">
                <!-- If user is null -->  
                <template  v-if="!user" class="mr-3 my-3 text-right">
                      <!--   <a href="/admin/login">Login</a> 
                       <a href="/admin/register">Register</a>-->
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

        <aside id="sidebar" class="lf-white-bg">
      
            <div class="aside-inner">

              <!-- User -->
              <div class="user">
                <!-- User Avatar -->
                <div class="user-avatar d-flex justify-content-center">
                    <router-link to="/"  class="navbar-brand"  exact>
                      <img v-if="this.data.profile_image" :src='"/storage/" + this.data.profile_image' alt="" class="avatar img-fluid rounded-circle mt-4">
                      <img v-else src="/imgs/logo.png" alt="" class="avatar img-fluid rounded-circle">
                    </router-link>
                </div>
                
                <!-- User Name -->
                <div  class="user-name d-flex justify-content-center">
                  <router-link to="/"  class="navbar-brand text-uppercase"  exact >{{data['fname']}} {{data['lname']}}</router-link>
                </div>
                
                <!-- User Job Title -->
                <div class="user-title">
                <router-link to="/">
                  <h2 class="user-title-style ">Web Developer</h2>
                  </router-link>
                </div>
              </div>
              <!-- Navigation Links -->
              <nav class="navbar  my-3 ">            

                      <div class="primary-menu">
                          <div>
                            <router-link v-on:click.native="resetNavigation()" to="/work/web-development" class="nav-item nav-link">Work</router-link>
                              <div class="ml-3">
                                <router-link v-on:click.native="resetNavigation()" to="/work/web-development/" class="nav-item nav-link" exact>Web Development</router-link>
                                <router-link v-on:click.native="resetNavigation()" to="/work/logo-design/" class="nav-item nav-link" exact>Logo Design</router-link>
                                <router-link v-on:click.native="resetNavigation()" to="/work/graphic-design/" class="nav-item nav-link" exact>Graphic Design</router-link>
                              </div>
                          </div>

                          <div class="mt-3">
                            <router-link v-on:click.native="resetNavigation()" to="/blog" class="nav-item nav-link">Blog</router-link>
                            <router-link v-on:click.native="resetNavigation()" to="/about" class="nav-item nav-link" exact>About</router-link>
                            <router-link v-on:click.native="resetNavigation()" to="/contact" class="nav-item nav-link">Let's Talk</router-link>
                          </div>
                      </div>
              </nav>

              <div class="block-social d-flex justify-content-center">
                  <!-- Contact link icons -->
                  <div class="">
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
                </div>
              </div> <!-- .aside-inner ends here -->
              
          </aside>

          <section v-on:click="resetNavigation()" id="content" class="container-fluid" style="position: absolute">
                <transition
                  name="fade"
                  mode="out-in"
                >
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
  mounted() {
        this.loadNavigationEvents();


        axios({
          method: 'get',
          url: this.web_url + 'api/user',
        })
        .then(response => {
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

          loadNavigationEvents() {
              $(document).ready(function() {
                  if ($(window).width() > 800) {
                      $('#content').addClass('frontend-lg');
                  } 
                $(window).resize(function(e) {
                    // If the window.width is greater than 800 then the following if statement will be executed.
                    if ($(window).width() > 800) {
                        $('#content').addClass('frontend-lg');
                    } else {
                        $('#content').removeClass('frontend-lg');
                    }
                })
              })
          },

          toggleNav() {
                  if (!$('.navbar-toggler').hasClass('toggle-on')) {
                    // The following function will be excuted
                    this.slideInNavigation();
                      //The function bellow will only be called if #content contains the .frontend-lg class.
                    if($('#content').hasClass('frontend-lg')) {
                        this.slideInContent();
                    }
                  } else {

                      // The following function will be excuted
                       this.slideOutNavigation();
                      //The function bellow will only be called if #content contains the .frontend-lg class.
                      if($('#content').hasClass('frontend-lg')) {
                          this.slideOutContent();
                      }
                  }
              },
            slideInNavigation() {
                $('.navbar-toggler').addClass('toggle-on')
                // The following classes applied by the slideOutElements() function will be removed.
                $('aside').removeClass('slide-in-navigation slide-out-navigation show');
                $('#content').removeClass('slide-in-content slide-out-content show');
                $('aside').addClass('slide-in-navigation show');
            },
            slideOutNavigation() {
                $('.navbar-toggler').removeClass('toggle-on')
                // The following classes applied by the slideInElements() function will be removed.
                $('aside').removeClass('slide-in-navigation show');
                $('#content').removeClass('slide-in-content show');
                $('aside').addClass('slide-out-navigation');
            },
            slideInContent() {
                $('#content').addClass('slide-in-content show');
            },
            slideOutContent() {
                $('#content').addClass('slide-out-content');
            },
            resetNavigation() {
              if ($('aside').hasClass('show') ) {
                  // The following classes applied by the slideInElements() function will be removed.
                  $('aside').removeClass('slide-in-navigation show');
                  $('#content').removeClass('slide-in-content show');
                  // The following function will be excuted
                  this.slideOutNavigation();
                  //The function bellow will only be called if #content contains the .frontend-lg class.
                  if($('#content').hasClass('frontend-lg')) {
                      this.slideOutContent();
                  }
              }
            }
           }
}
</script>





