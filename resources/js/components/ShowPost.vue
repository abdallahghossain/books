<template>
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div
          class="col-lg-6 wow fadeInUp"
          data-wow-delay="0.1s"
          style="
            min-height: 400px;
            visibility: visible;
            animation-delay: 0.1s;
            animation-name: fadeInUp;"
        >
          <div class="position-relative h-100">
            <img
              class="img-fluid position-absolute w-100 h-100"
              :src="'uploads/' + post.data.image"
              alt=""
              style="object-fit: cover"
            />
          </div>
        </div>
        <div
          class="col-lg-6 wow fadeInUp"
          data-wow-delay="0.3s"
          style="
            visibility: visible;
            animation-delay: 0.3s;
            animation-name: fadeInUp;
          "
        >
          <h6 class="section-title bg-white text-start text-primary pe-3">
            About Us
          </h6>
          <h1 class="mb-4">{{ post.data.title }}</h1>
          <p class="mb-4">
          {{ post.data.name }}
          </p>

          <div class="row gy-2 gx-4 mb-4">
            <div class="col-sm-6">
              <p class="mb-0">
                <i class="fa fa-arrow-right text-primary me-2"></i>{{post.data.date}}
              </p>
            </div>
            <div class="col-sm-6">
              <p class="mb-0">
                <i class="fa fa-arrow-right text-primary me-2"></i>{{ post.data.number }}
              </p>
            </div>

          </div>
          <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data() {
        return {
            post: [],
        }
    },
  methods: {
     getPostById() {
      const tt = this;
       axios
        .get(`api/get/${this.$route.params.id}`)
        .then(function (response) {
            tt.post = response.data;
            console.log(tt.post);
        });
    },
  },
  created(){
    this.getPostById();
  }
};
</script>
