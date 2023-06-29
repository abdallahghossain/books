<!-- <template>
  <form class="d-flex">
    <input
      class="form-control me-2"
      type="search"
      placeholder="Search"
      aria-label="Search"
      v-model="search"
    />
    <button @click="searchData()" class="btn btn-outline-info" type="button">Search</button>
  </form>
</template>
<script>
import axios from 'axios';

export default {
data() {
    return {
        sear:'',
    }
},
methods: {
    searchData() {
        var sear =this.search;
        const tt= this;
    axios.get('/api/search/'+sear)
    .then(function(response) {
        console.log(response);
        tt.$store.state.Books=response.data;
    })
    .catch(function(error) {
      console.error(error);
    });
  },
},
}
</script> -->
<template>
    <form class="d-flex">
      <input
        class="form-control me-2"
        type="search"
        placeholder="Search"
        aria-label="Search"
        v-model="search"
      />
    </form>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        search: '',
      };
    },
    watch: {
      search: {
        handler(newSearch) {
          this.searchData(newSearch);
        },
      },
    },
    methods: {
      searchData(searchQuery) {
        const tt = this;
        axios
          .get('/api/search/' + searchQuery)
          .then(function (response) {
            console.log(response);
            tt.$store.state.Books = response.data;
          })
          .catch(function (error) {
            console.error(error);
          });
      },
    },
  };
  </script>

