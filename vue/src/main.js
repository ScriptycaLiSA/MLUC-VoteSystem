import { createApp } from 'vue'
import store from './store'
import router from './router'
import cors from 'cors'
import App from './App.vue'
import './index.css'
import './plugins/chart.js'
import 'animate.css'

createApp(App)
  .use(store)
  .use(router)
  .use(cors)
  .mount('#app')
