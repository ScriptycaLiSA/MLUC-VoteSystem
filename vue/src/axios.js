import axios from 'axios'
import store from './store'

let axiosClient = axios.create({
  baseURL: 'http://localhost:8000/api/',
  withCredentials: true
})

axiosClient.interceptors.request.use(request => {
  request.headers.common['Access-Control-Allow-Origin'] = 'http://localhost:8000';
  request.headers.common['Accept'] = 'application/json';
  request.headers.common['Content-Type'] = 'application/json';
  request.headers.Authorization = `Bearer ${store.state.a.user.token}`
  return request;
});

axiosClient.interceptors.response.use(response => {
    return response;
  },
  error => {
    return Promise.reject(error);
  }
);

export default axiosClient;
