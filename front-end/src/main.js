import { createApp } from 'vue'
import './assets/css/reset.css';
import App from './App.vue'
import store from '@/store';
import './proto/index'

createApp(App)
    .use(store)
    .mount('#app')
