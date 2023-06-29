<template>
  <div>
    <button @click="$event=> logout()" type="button" class="nav-item nav-link">Logout</button>
  </div>
</template>
<script>
export default {
    methods: {
//   async logout() {
//     try {
//       const response = await axios.post("/api/logout", null, {
//         headers: {
//           Authorization: 'Bearer ' + localStorage.getItem("token")
//         }
//       });
//       localStorage.removeItem("token");
//       this.$router.push("/login");
//       console.log(response.data);
//     } catch (error) {
//       console.error(error);
//       Swal.fire({
//         position: "center",
//         icon: error.response.data.icon,
//         title: error.response.data.message,
//         showConfirmButton: false,
//         timer: 1500,
//       });
//     }
//   },
    logout(){
        this.$store.state.token=localStorage.removeItem("token");
        axios.get('api/logout')
        .then(function(response) {
            console.log(response);

        })
        this.$router.push('/login');
    }
},


};
</script>

