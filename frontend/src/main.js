import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import '../public/css/Tailwind.css';
import '@fortawesome/fontawesome-free/css/all.css';
import 'vue-multiselect/dist/vue-multiselect.css';
import 'bootstrap/dist/css/bootstrap.min.css'

createApp(App).use(store).use(router).mount('#app')
