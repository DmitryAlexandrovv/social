import Vue from "vue";
import Vuetify from "vuetify";
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify);

export default new Vuetify({
    icons: {
        iconfont: "md" // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
    },
    theme: {
        light: {
            primary: '#b689b0',
            secondary: '#b0bec5',
            accent: '#8c9eff',
            error: 'rgb(227, 38, 54)',
        },
    }
});
