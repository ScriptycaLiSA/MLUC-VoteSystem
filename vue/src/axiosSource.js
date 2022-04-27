import axios from 'axios'
import store from './store'

const axiosClient = axios.create({
  baseURL: 'http://localhost:8001/api/'
})

axiosClient.interceptors.request.use(request => {
  request.headers.common['Accept'] = 'application/json';
  request.headers.common['Content-Type'] = 'application/json';
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
