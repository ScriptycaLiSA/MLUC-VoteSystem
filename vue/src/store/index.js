import {createStore} from "vuex";
import axiosClient from "../axios";
import axiosOrigin from '../axiosSource';
import axiosSanctum from '../sanctumAxios'

const adminModule = {
  state: {
    user: {
      data: {},
      token: localStorage.getItem("TOKEN"),
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
    getSession({commit}) {
      return axiosClient.get('/user')
        .then(({data}) => {
          return data;
        })
    },
    login({commit}, userLogin) {
      return axiosSanctum.get('/sanctum/csrf-cookie')
        .then(response => {
          return axiosClient.post('/adminLogin', userLogin)
            .then(({data}) => {
              commit('setUser', data);
              return data;
            })
        });
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
    getMstrDash({commit}, sample) {
      return axiosClient.get('/mstr_dash')
        .then(({data}) => {
          return data;
        })
    },
    getCandidateInfo({commit}, mainData) {
      return axiosClient.get('/campaignSite')
        .then(({data}) => {
          return data;
        })
    },
    getCollegesData({commit}, fetched) {
      return axiosClient.get('/colleges')
        .then(({data}) => {
          return data;
        })
    },
    getElectionData({commit}, fetched) {
      return axiosClient.get('/election_data')
        .then(({data}) => {
          return data;
        })
    },
    getPositionData({commit}, fetched) {
      return axiosClient.get('/get_positions')
        .then(({data}) => {
          return data;
        });
    },
    createElections({commit}, setElection) {
      return axiosClient.post('/create_election', setElection)
        .then(({data}) => {
          return data;
        });
    },
    deleteElection({commit}, deleteElec) {
      return axiosClient.post('/delete_election', deleteElec)
        .then(({data}) => {
          return data;
        })
    },
    createPositionMode({commit}, setPosition) {
      return axiosClient.post('/create_position', setPosition)
        .then(({data}) => {
          return data;
        })
    },
    deletePosition({commit}, deletePos) {
      return axiosClient.post('/delete_position', deletePos)
        .then(({data}) => {
          return data;
        })
    },

    //Partylist functions
    getPartylistData({commit}, fetched) {
      return axiosClient.get('/partylist_data')
        .then(({data}) => {
          return data;
        });
    },
    addPartylist({commit}, addPartylist) {
      return axiosClient.post('/create_partylist', addPartylist)
        .then(({data}) => {
          return data;
        })
    },
    deletePartylist({commit}, deleteParty) {
      return axiosClient.post('/delete_partylist', deleteParty)
        .then(({data}) => {
          return data;
        })
    },
    getSavedCandidates({commit}, getCand) {
      return axiosClient.get('/get_candidates')
        .then(({data}) => {
          return data;
        })
    },
    createCandidates({commit}, addCand) {
      return axiosClient.post('/create_candidate', addCand)
        .then(({data}) => {
          return data;
        })
    },
    deleteCandidate({commit}, delCand){
      return axiosClient.post('/delete_candidate',delCand)
        .then(({data})=>{
          return data;
        })
    },
  },
  mutations: {
    logout: (state) => {
      state.user.token = null;
      state.user.data = {};
      localStorage.removeItem("TOKEN");
    },
    setUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      localStorage.setItem("TOKEN", userData.token);
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

const voterModule = {state: {
    user: {
      data: {},
      token: localStorage.getItem("TOKEN2"),
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
    getVoterSession({commit}) {
      return axiosClient.get('/user')
        .then(({data}) => {
          return data;
        })
    },
    voterLogin({commit}, userLogin) {
      return axiosSanctum.get('/sanctum/csrf-cookie')
        .then(response => {
          return axiosClient.post('/voterLogin', userLogin)
            .then(({data}) => {
              commit('setVoterUser', data);
              return data;
            })
        });
    },
    voterLogout({commit}, userLogout) {
      return axiosClient.post('/voter/voterLogout', userLogout)
        .then(response => {
          commit('voterLogout');
          return response;
        });
    },
  },
  mutations: {
    voterLogout: (state) => {
      state.user.token = null;
      state.user.data = {};
      localStorage.removeItem("TOKEN2");
    },
    setVoterUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      localStorage.setItem("TOKEN2", userData.token);
    },
  },
  modules: {}
}

const store = createStore({
  modules: {
    a: adminModule,
    b: voterModule
  }
})

export default store;
