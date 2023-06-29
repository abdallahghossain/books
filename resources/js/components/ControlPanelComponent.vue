<template>
  <div class="container m-5">
    <router-link to="/create" class="btn btn-outline-info btn-sm ml-4 mb-3"
      >Create Books</router-link
    >
    <!-- {{ this.$store.state.token }} -->

    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Image -- Title</th>
          <th>Name</th>
          <th>Number</th>
          <th>date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody v-for="item in this.$store.state.Books" :key="item">
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                :src="'uploads/' + item.image"
                class="rounded-circle"
                alt=""
                style="width: 45px; height: 45px"
              />
              <div class="ms-3">
                <p class="fw-bold mb-1">{{ item.title }}</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">{{ item.name }}</p>
          </td>
          <td>
            <p class="fw-normal mb-1">{{ item.number }}</p>
          </td>
          <td>
            <p class="fw-normal mb-1">{{ item.date }}</p>
          </td>

          <!-- <td>Senior</td> -->
          <td class="p-2">
            <router-link
              class="btn btn-outline-info m-2"
              :to="{ name: 'update', params: { id: item.id } }"
              >Edit</router-link
            >
            <!-- <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-danger">
              Delete
            </button> -->
            <!-- Button trigger modal -->
            <!-- Modal -->
            <!-- <div
              class="modal fade"
              id="exampleModal"
              tabindex="-1"
              aria-labelledby="exampleModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    Deleted !!
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">Are you Sure </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-warning"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                  </div>
                </div>

              </div>
            </div> -->
            <button  id="btn-close" class="btn btn-outline-danger"  @click="deletePost(item.id)">
                      deleted
            </button>
        </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  data() {
    return {
    //   Books: [],
    };
  },
  mounted() {
    if (localStorage.getItem("token") == null) {
      console.log(this.$store.state.token);
      this.$router.push({ path: "/login" });
    }
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

    // deletePost(id) {
    //   // console.log('Im In Deleted function');
    //   const tt = this;
    //   axios
    //     .delete(`api/delete/${id}`)
    //     .then(function (response) {
    //       console.log(response.data);
    //         $('#btn-close').modal('hide');
    //           tt.index();

    //     })
    //     .catch(function (error) {
    //       console.log(error);
        //   Swal.fire({
        //     position: "center",
        //     icon: error.response.data.icon,
        //     title: error.response.data.message,
        //     showConfirmButton: false,
        //     timer: 1500,
        //   });
    //     });
    // },
    deletePost(id) {
      if (confirm("Are you Want Delete this Book ")) {
        console.log(id);
        const tt=this;
        axios
          .delete(`api/delete/${id}/`)
          .then(function (response) {
             tt.index();
            Swal.fire({
            position: "center",
            icon:response.data.icon,
            title:response.data.message,
            showConfirmButton: false,
            timer: 1500,
          });
          })
          .catch(function (error) {
            // if (error.response) {
            //   if (error.response.status == 404) {
            //     alert(error.response.data.message);
            //   }
            // }
          });
      }
    },
  },
};
</script>
