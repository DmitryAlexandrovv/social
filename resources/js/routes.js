import Home from './components/home';
import SignIn from "./components/auth/signIn/SignIn";
import SignUp from "./components/auth/signUp/SignUp";

export const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/signIn',
        name: 'signIn',
        component: SignIn
    },
    {
        path: '/signUp',
        name: 'signUp',
        component: SignUp
    }
]
