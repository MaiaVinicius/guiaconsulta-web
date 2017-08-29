import Vue from 'vue'
import Router from 'vue-router'
import Home from './../components/Home.vue'
import RegisterProfessional from './../components/RegisterProfessional.vue'
import RegisterProfessionalActivate from './../components/RegisterProfessionalActivate.vue'
import WizardProfessional from './../components/WizardProfessional.vue'
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
            component: RegisterProfessional
        },
        {
            path: '/register/professional/activate',
            name: 'RegisterProfessionalActivate',
            component: RegisterProfessionalActivate
        },
        {
            path: '/professional/profile/wizard',
            name: 'WizardProfessional',
            component: WizardProfessional
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
    ],
    // mode: 'history'
})
