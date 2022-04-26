import {createStore} from "vuex";
import axiosClient from "../axios";
import axiosOrigin from '../axiosSource';

const adminModule = {
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    },
    registeredVoters: {
      data: {}
    },
    tempStudentsRecordHold: {
      loading: false,
      data: {}
    },
  },
  getters: {},
  actions: {
    getRegisteredVoters({commit}, userLogin) {
      return axiosClient.get('/voterget_all')
        .then(({data}) => {
          commit('setDataTableRegStud', data)
          return data;
        })
    },
    login({commit}, userLogin) {
      return axiosClient.post('/adminLogin', userLogin)
        .then(({data}) => {
          commit('setUser', data);
          return data;
        })
    },
    logout({commit}, userLogout) {
      return axiosClient.post('/logout', userLogout)
        .then(response => {
          commit('logout');
          return response;
        });
    },
    register({commit}, userRegister) {
      return axiosClient.post('/make_admin', userRegister)
        .then(({data}) => {
          return data;
        })
    },
    loadStudentSearch({commit}, request) {
      const jsonSearch = JSON.stringify(request.idNum);
      return axiosClient.get('/voterinfo/' + jsonSearch)
        .then(({data}) => {
          return data;
        })
    },
    //
    getAllRecordsSource({commit}, noData) {
      return axiosOrigin.get('/getstudentrecords')
        .then(({data}) => {
          commit('parseDataFromOrigin', data)
          return data;
        });
    },
    systemRecordUpdate({commit}, dataArray) {
      return axiosClient.post('/update_records', dataArray)
        .then(({data}) => {
          return data;
        });
    },
    getMstrDash({commit}, sample){
      return axiosClient.get('/mstr_dash')
        .then(({data})=>{
          return data;
        })
    },
    getCandidateInfo({commit}, mainData){
      return axiosClient.get('/campaignSite')
        .then(({data})=>{
          return data;
        })
    }
  },
  mutations: {
    logout: (state) => {
      state.user.token = null;
      state.user.data = {};
      sessionStorage.removeItem("TOKEN");
    },
    setUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      sessionStorage.setItem("TOKEN", userData.token);
    },
    setDataTableRegStud: (state, tableData) => {
      state.registeredVoters.data = tableData.students['id'];
    },
    parseDataFromOrigin: (state, arrayData) => {
      state.tempStudentsRecordHold.data = arrayData.students['id']
    },
  },
  modules: {}
}

const voterModule = {}

const store = createStore({
  modules: {
    a: adminModule,
    b: voterModule
  }
})

export default store;
