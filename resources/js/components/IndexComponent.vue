<template>
  <!-- Courses Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">
          Courses
        </h6>
        <h1 class="mb-5">Popular Courses</h1>
      </div>
      <div
        class="row g-4 justify-left">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" v-for="item in this.$store.state.Books"
        :key="item">
          <div class="course-item bg-light">
            <div class="position-relative overflow-hidden">
              <img class="img-fluid" style="width: 407px;height:320px ;" :src="'uploads/' + item.image" alt="" />

            </div>
            <div class="text-center p-4 pb-0">
                <router-link :to="{ name: 'show', params: { id: item.id } }">
                    <h5 class="mb-4">{{ item.title }}</h5>
              </router-link>
            </div>
            <div class="d-flex border-top">
                <router-link :to="{ name: 'show', params: { id: item.id } }"> <small class="flex-fill text-center border-end py-2"
                ><i class="fa fa-user-tie text-primary me-2"></i
                >{{ item.name }}</small
              ></router-link>

              <small class="flex-fill text-center border-end py-2"
                ><i class="fa fa-clock text-primary me-2"></i
                >{{ item.number }}</small
              >
              <small class="flex-fill text-center py-2"
                ><i class="fa fa-user text-primary me-2"></i
                >{{ item.date }}</small
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Courses End -->

  <!-- Team Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">
          Instructors
        </h6>
        <h1 class="mb-5">Expert Instructors</h1>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item bg-light">
            <div class="overflow-hidden">
              <img class="img-fluid" src="img/team-1.jpg" alt="" />
            </div>
            <div
              class="position-relative d-flex justify-content-center"
              style="margin-top: -23px"
            >
              <div class="bg-light d-flex justify-content-center pt-2 px-1">
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="text-center p-4">
              <h5 class="mb-0">Instructor Name</h5>
              <small>Designation</small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="team-item bg-light">
            <div class="overflow-hidden">
              <img class="img-fluid" src="img/team-2.jpg" alt="" />
            </div>
            <div
              class="position-relative d-flex justify-content-center"
              style="margin-top: -23px"
            >
              <div class="bg-light d-flex justify-content-center pt-2 px-1">
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="text-center p-4">
              <h5 class="mb-0">Instructor Name</h5>
              <small>Designation</small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="team-item bg-light">
            <div class="overflow-hidden">
              <img class="img-fluid" src="img/team-3.jpg" alt="" />
            </div>
            <div
              class="position-relative d-flex justify-content-center"
              style="margin-top: -23px"
            >
              <div class="bg-light d-flex justify-content-center pt-2 px-1">
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="text-center p-4">
              <h5 class="mb-0">Instructor Name</h5>
              <small>Designation</small>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
          <div class="team-item bg-light">
            <div class="overflow-hidden">
              <img class="img-fluid" src="img/team-4.jpg" alt="" />
            </div>
            <div
              class="position-relative d-flex justify-content-center"
              style="margin-top: -23px"
            >
              <div class="bg-light d-flex justify-content-center pt-2 px-1">
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-sm-square btn-primary mx-1" href=""
                  ><i class="fab fa-instagram"></i
                ></a>
              </div>
            </div>
            <div class="text-center p-4">
              <h5 class="mb-0">Instructor Name</h5>
              <small>Designation</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Team End -->

  <!-- Testimonial Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
      <div class="text-center">
        <h6 class="section-title bg-white text-center text-primary px-3">
          Testimonial
        </h6>
        <h1 class="mb-5">Our Students Say!</h1>
      </div>
      <div class="owl-carousel testimonial-carousel position-relative">
        <div class="testimonial-item text-center">
          <img
            class="border rounded-circle p-2 mx-auto mb-3"
            src="img/testimonial-1.jpg"
            style="width: 80px; height: 80px"
          />
          <h5 class="mb-0">Client Name</h5>
          <p>Profession</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
              amet diam et eos. Clita erat ipsum et lorem et sit.
            </p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img
            class="border rounded-circle p-2 mx-auto mb-3"
            src="img/testimonial-2.jpg"
            style="width: 80px; height: 80px"
          />
          <h5 class="mb-0">Client Name</h5>
          <p>Profession</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
              amet diam et eos. Clita erat ipsum et lorem et sit.
            </p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img
            class="border rounded-circle p-2 mx-auto mb-3"
            src="img/testimonial-3.jpg"
            style="width: 80px; height: 80px"
          />
          <h5 class="mb-0">Client Name</h5>
          <p>Profession</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
              amet diam et eos. Clita erat ipsum et lorem et sit.
            </p>
          </div>
        </div>
        <div class="testimonial-item text-center">
          <img
            class="border rounded-circle p-2 mx-auto mb-3"
            src="img/testimonial-4.jpg"
            style="width: 80px; height: 80px"
          />
          <h5 class="mb-0">Client Name</h5>
          <p>Profession</p>
          <div class="testimonial-text bg-light text-center p-4">
            <p class="mb-0">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam
              amet diam et eos. Clita erat ipsum et lorem et sit.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonial End -->
</template>

<script>
export default {
  data() {
    return {
    //   apiData: [],
    };
  },
  created() {
    this.index();
  },
  methods: {
    async index() {
        const tt=this;
      // console.log("i am here");
       await axios.get("api/index").then(function (response) {
        tt.$store.state.Books=response.data;
      });
    },
  },
};
</script>
