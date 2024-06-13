import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import PrimeVue from 'primevue/config';

// import dotenv from 'dotenv';

import VueTelInput from 'vue-tel-input'

import Echo from "laravel-echo"
import Pusher from "pusher-js";

// dotenv.config();
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'local',
    wsHost:'127.0.0.1',
    // wsHost:'192.168.1.137',
    // wsHost:'172.20.10.3',
    wsPort: 6001,
    cluster: "mt1",
    encrypted: true,
    forceTLS: false,
    disableStats: true,
    // authEndpoint :'http://172.20.10.3:8000/api/broadcasting/auth',
    authEndpoint :'http://127.0.0.1:8000/broadcasting/auth',
    auth:{
        headers: {
            Authorization: 'Bearer '+ JSON.parse(localStorage.getItem("token")), 
            'X-Requested-With': 'XMLHttpRequest',
        }
    },
 
});



import 'vue-tel-input/vue-tel-input.css';
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



createApp(App).use(store).use(PrimeVue).use(VueTelInput).use(router).mount('#app')
