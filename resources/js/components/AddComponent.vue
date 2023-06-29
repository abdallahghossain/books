<template >
  <div class="container m-5">
    <form @submit.prevent>
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input
          v-model="book.title"
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
          v-model="book.name"
          type="text"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Enter Name"
        />
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Created Date</label>
        <input
          v-model="book.date"
          type="date"
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
          v-model="book.number"
          type="number"
          class="form-control"
          aria-describedby="emailHelp"
          placeholder="Enter number"
        />
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button @click="add()" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      book: {
        title: "",
        name: "",
        number: "",
        image: null,
        date: "",
      },
    };
  },
  methods: {
    chooseImage(event) {
      this.book.image = event.target.files[0];
    },
    add() {
      var data = new FormData();
      data.append("title", this.book.title);
      data.append("name", this.book.name);
      data.append("number", this.book.number);
      data.append("image", this.book.image);
      data.append("date", this.book.date);
      const tt= this;
      axios
        .post("api/add", data)
        .then(function (response) {
          console.log(response);
          Swal.fire({
            position: "center",
            icon: response.data.icon,
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500,
          });
          tt.book.name = "";
          tt.book.title = "";
          tt.book.number = "";
          tt.book.date = "";
          tt.book.image = "";
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
