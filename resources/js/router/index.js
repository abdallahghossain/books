import  {createRouter,createWebHashHistory}  from 'vue-router';
import Home  from '@/components/IndexComponent.vue';
import login from '@/components/LoginComponent.vue';
import LogoutComponent from '@/components/LogoutComponent.vue';
import SearchComponent from '@/components/SearchComponent.vue';
import register from '@/components/RegComponent.vue';
import post from '@/components/PostComponent.vue';
import panel from '@/components/ControlPanelComponent.vue';
import create from '@/components/AddComponent.vue';
import UpdatePost from '@/components/UpdatePostComponent.vue';
import show from '@/components/ShowPost.vue';
const routes = [
    { path: '/', component: Home },
    { path: '/login', component: login },
    { path: '/register', component: register },
    { path: '/post', component: post },
    { path: '/panel', component: panel },
    { path: '/create', component: create },
    { name:'update', path: '/update/:id', component: UpdatePost },
    { name:'show',path: '/show/:id', component: show },
    { path: '/search', component: SearchComponent },
    { path: '/logout', component: LogoutComponent },
  ]
  const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
  })
export default router;
