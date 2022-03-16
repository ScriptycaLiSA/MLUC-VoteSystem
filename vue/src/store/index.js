import {createStore} from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    }
  },
  getters: {},
  actions: {
    login({commit}, userLogin){
      return axiosClient.post('/login', userLogin)
        .then(({data}) => {
          commit('setUser',data);
          return data;
        })
    },
    logout({commit}, userLogout){
      return axiosClient.post('/logout', userLogout)
        .then(response => {
          commit('logout');
          return response;
        });
    },
    register({commit}, userRegister){
      return axiosClient.post('/make_admin', userRegister)
        .then(({data}) => {
          return data;
        })
    },
  },
  mutations: {
    logout: (state) => {
      state.user.token = sessionStorage.removeItem("TOKEN");
      state.user.data = {};
    },
    setUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      sessionStorage.setItem("TOKEN", userData.token);
    },
  },
  modules: {}
})

export default store;
