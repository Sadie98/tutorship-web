import VueRouter from 'vue-router'
import Profile from './components/pages/Profile'
import Main from './components/pages/Main'
import Meetings from './components/pages/Meetings'

export default new VueRouter({
    routes: [
        {
            path: '/profile',
            component: Profile
        },

        {
            path: '/',
            component: Main
        },

        {
            path: '/meetings',
            component: Meetings
        }
    ],
    mode: 'history'
})
