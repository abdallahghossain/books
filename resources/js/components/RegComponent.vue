<template lang="">
   <section class="vh-100 m-5">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid"
            alt="Sample image"
          />
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form @submit.prevent>
              <!-- Name input -->
              <div class="form-outline mb-4">
              <input
                type="text"

                class="form-control form-control-lg"
                placeholder="Enter a Name"
                v-model="user.name"/>
              <label class="form-label" for="form3Example3"
                >Your Name</label>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input
                type="email"
                id="form3Example3"
                class="form-control form-control-lg"
                placeholder="Enter a valid email address"
                v-model="user.email"/>
              <label class="form-label" for="form3Example3"
                >Email address</label>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input
                type="password"
                class="form-control form-control-lg"
                placeholder="Enter password"
                v-model="user.password"
              />
              <label class="form-label" for="form3Example4">Password</label>
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <button
                @click="register()"
                class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem"
              >
                Login
              </button>
              <p class="small fw-bold mt-2 pt-1 mb-0">
                Don't have an account?
                <a href="#!" class="link-danger">Register</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    <!--container end.//-->
</template>
<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    register() {
      const tt = this;
      axios
        .post("api/register", tt.user)
        .then(function (response) {
          console.log(response);
          if (response.data.status) {
            tt.$router.push({path: "/login",});
          }
          Swal.fire({
            position: "center",
            icon: response.data.icon,
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500,
          });
        })
        .catch(function (error) {
          console.log(error);
          Swal.fire({
            position: "center",
            icon: error.response.data.icon,
            title: error.response.data.message,
            showConfirmButton: false,
            timer: 1500,
          });
        });
    },
  },
};
</script>
