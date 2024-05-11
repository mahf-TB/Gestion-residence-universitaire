import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import PrimeVue from 'primevue/config';

// import dotenv from 'dotenv';

import Echo from "laravel-echo"
import Pusher from "pusher-js";

console.log(process.env.VUE_APP_URL_BACK)
// dotenv.config();
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'local',
    wsHost:'127.0.0.1',
    wsPort: 6001,
    cluster: "mt1",
    forceTLS: false,
    disableStats: true,
    authEndpoint :'http://127.0.0.1:8000/api/broadcasting/auth',
    auth:{
        headers: {
            Authorization: 'Bearer '+localStorage.getItem('token'), 
        }
    },
 
});



import '../public/css/Tailwind.css';
import '../public/css/style.css';

import 'primevue/resources/primevue.min.css';
import 'primevue/resources/themes/aura-light-blue/theme.css'
import 'primeicons/primeicons.css';

import 'aos/dist/aos.css'

import '@fortawesome/fontawesome-free/css/all.css';
import 'vue-multiselect/dist/vue-multiselect.css';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle';
// import 'jquery';



createApp(App).use(store).use(PrimeVue).use(router).mount('#app')
