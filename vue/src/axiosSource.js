import axios from 'axios'
import store from './store'

const axiosClient = axios.create({
  baseURL: 'http://localhost:8001/api/'
})

axiosClient.interceptors.request.use(config=>{
  config.headers.Authorization = `Bearer ${store.state.a.user.token}`
  return config;
})

export default axiosClient;
