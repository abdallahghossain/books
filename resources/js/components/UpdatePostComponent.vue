<template >
  <div class="container m-5">
    <form @submit.prevent>
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input
          v-model="title"
          type="text"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Enter Title"
        />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Name Author</label>
        <input
          v-model="name"
          type="text"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Enter Name"
        />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Image</label>
        <input
          type="file"
          @change="chooseImage"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
        />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">number of books</label>
        <input
          v-model="number"
          type="number"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Enter number"
        />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">date of publish</label>
        <input
          v-model="date"
          type="date"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Enter date"
        />
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button @click="update()" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>
  <script>
export default {
  data() {
    return {
      title: "",
      name: "",
      image: "",
      number: "",
      date: "",
    };
  },
  created() {
    this.getPostById();
  },
  methods: {
    async getPostById() {
      const tt = this;
      await axios
        .get(`api/get/${this.$route.params.id}`)
        .then(function (response) {
          console.log(response.data.data);
          tt.title = response.data.data.title;
          tt.name = response.data.data.name;
          tt.number = response.data.data.number;
          tt.image = response.data.data.image;
          tt.date = response.data.data.date;
        });
    },
    chooseImage(event) {
      this.image = event.target.files[0];
    },
   async update() {
    const tt = this;
      var data = new FormData();
      data.append("title", this.title);
      data.append("name", this.name);
      data.append("number", this.number);
      data.append("image", this.image);
      data.append("date", this.date);
     await axios.post(`/api/update/${this.$route.params.id}`,data)
        .then(function (response) {
          console.log(response);
          Swal.fire({
            position: "center",
            icon: response.data.icon,
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500,
          });
          tt.name = "";
          tt.title = "";
          tt.number = "";
          tt.date = "";
          tt.image = "";
          tt.$router.push({path: "/panel",});
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
    //  update() {
    //   const tt = this;
    //   var data = new FormData();
    //   data.append("title", this.title);
    //   data.append("name", this.name);
    //   data.append("number", this.number);
    //   data.append("image", this.image);
    //   data.append("date", this.date);
    //    axios
    //     .put(`/api/update/${this.$route.params.id}`, data)
    //     .then(function (response) {
    //       console.log(response.data);
    //       Swal.fire({
    //         position: "center",
    //         icon: response.data.icon,
    //         title: response.data.message,
    //         showConfirmButton: true,
    //         timer: 1500,
    //       });
    //         tt.title = "",
    //         tt.name = "",
    //         tt.date = "",
    //         tt.number = "",
    //         tt.image = "";
    //       tt.$router.push({ path: "/panel" });
    //     })
    //     .catch((error) => {
    //       console.log(error);
    //       Swal.fire({
    //         position: "center",
    //         icon: error.response.data.icon,
    //         title: error.response.data.message,
    //         showConfirmButton: false,
    //         timer: 1500,
    //       });
    //     });
    // },
  },
};
</script>
