/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import "../sass/app.scss";
import Swal from "sweetalert2";

import router from "@/router";
import store from "@/store";
import { createApp } from "vue";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
window.Swal = Swal;
const app = createApp({
    created() {
        // if ((localStorage.getItem("token"))) {
        //     const tt = this;
        //     axios
        //         .get("api/user", {
        //             headers: {
        //                 Authorization: "Bearar" + localStorage.getItem("token"),
        //             },
        //         })
        //         .then(function (response) {
        //             console.log(response);
        //             tt.$store.state.token = localStorage.getItem("token");
        //             console.log(tt.$store.state.token);
        //         })
        //         .catch(function (error) {
        //             console.log(error);
        //             localStorage.setItem("token", null);
        //             tt.$router.push({ path: "/login" });
        //         });
        // } else {
        //     this.$router.push({ path: "/login" });
        // }
        this.$store.state.token=localStorage.getItem("token");
        console.log(this.$store.state.token);
    },
});
import LogoutComponent from "@/components/LogoutComponent.vue";
import SearchComponent from "@/components/SearchComponent.vue";
app.component("logout-component", LogoutComponent);
app.component("search-component", SearchComponent);
app.use(store);
app.use(router);
app.mount("#app");
