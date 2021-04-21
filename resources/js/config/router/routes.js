import Home from '../../components/home';
import SignIn from "../../components/auth/signIn/SignIn";
import SignUp from "../../components/auth/signUp/SignUp";
import Profile from "../../components/profile/Profile";

export const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: false
        }
    },
    {
        path: '/signIn',
        name: 'signIn',
        component: SignIn,
        meta: {
            auth: false
        }
    },
    {
        path: '/signUp',
        name: 'signUp',
        component: SignUp,
        meta: {
            auth: false
        }
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile,
        meta: {
            auth: true
        }
    }
]
