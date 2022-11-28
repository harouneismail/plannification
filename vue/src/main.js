import { createApp } from 'vue'
import App from './App.vue'
import store from './store'
import router from './router'
import './assets/css/bootstrap.min.css'
import './assets/js/bootstrap.min.js'
createApp(App).use(store).use(router).mount('#app')