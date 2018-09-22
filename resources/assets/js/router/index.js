import Vue from 'vue'
import Router from 'vue-router'
import Home from './../components/Home.vue'
import ProfessionalRegister from './../components/ProfessionalRegister.vue'
import Search from './../components/Search.vue'
import NotFound from './../components/NotFound.vue'

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/register/professional',
            name: 'RegisterProfessional',
            component: ProfessionalRegister
        },
        {
            path: '/search/:term?/:location?/:payment?',
            name: 'Search',
            props: true,
            component: Search
        },
        {
            path: '/404',
            name: '404',
            component: NotFound
        },
        {
            path: '/*',
            name: 'Not Found',
            component: NotFound
        }
    ]
})
