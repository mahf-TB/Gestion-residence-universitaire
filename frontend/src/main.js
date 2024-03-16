import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import PrimeVue from 'primevue/config';

import '../public/css/Tailwind.css';
import '../public/css/style.css';

import 'primevue/resources/primevue.min.css';
import 'primevue/resources/themes/aura-light-blue/theme.css'
import 'primeicons/primeicons.css';

import '@fortawesome/fontawesome-free/css/all.css';
import 'vue-multiselect/dist/vue-multiselect.css';
import 'bootstrap/dist/css/bootstrap.min.css'


createApp(App).use(store).use(PrimeVue).use(router).mount('#app')
