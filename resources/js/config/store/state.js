export default {
    info: {
        timeout: 3000,
        show: false,
        text: null
    },

    nav: [
        { path: "/", title: "Home", auth: "both" }
    ],

    authNav: [
        { path: "/signUp", title: "SignUp", auth: false },
        { path: "/signIn", title: "SignIn", auth: false }
    ],

    profileNav: [
        { path: "/profile", title: "Profile", auth: true },
        { path: "/logout", title: "Logout", auth: true }
    ],

    Auth: {
        login: false,
        user_id: null,
        api_token: null,
        name: null,
        photo: null
    }
};
