<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl min-h-full">
      <Warning v-if="success">
        {{ serverResponse.message }}
        <span
          @click="success=null"
          class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
         <svg
           xmlns="http://www.w3.org/2000/svg"
           class="h-6 w-6"
           fill="none"
           viewBox="0 0 24 24"
           stroke="currentColor"
         >
           <path
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="2"
             d="M6 18L18 6M6 6l12 12"/>
         </svg>
        </span>
      </Warning>
      <Warning v-if="error">
        {{ errorMsg.message }}
        <span
          @click="error=null"
          class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
         <svg
           xmlns="http://www.w3.org/2000/svg"
           class="h-6 w-6"
           fill="none"
           viewBox="0 0 24 24"
           stroke="currentColor"
         >
           <path
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="2"
             d="M6 18L18 6M6 6l12 12"/>
         </svg>
        </span>
      </Warning>
      <div class="flex py-5 px-5 ">
        <h1 class="font-bold text-5xl py-3 items-left">Manage Voter</h1>
      </div>

      <form class="px-2 py-2" @submit.prevent="searchStudent">
        <div class="grid grid-cols-2 gap-2  ">
          <input v-model="searchId.idNum" id="idNum" name="idNum" type="number" required=""
                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                 placeholder="Enter ID"/>
          <button type="submit"
                  :disabled="loading"
                  class="text-gray-900 bg-white w-40 border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">
            Find & Show ID
          </button>
        </div>
      </form>

      <div class="grid grid-cols-1 sm:grid-cols-1 xl:grid-cols-2">
        <!-- -->
        <form class="px-2 py-2" @submit.prevent="updateVoter">
          <div class="">
            <input
              v-model="fillFields.idNum"
              class="appearance-none block w-full bg-slate-400 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-first-idNum" type="number" placeholder="Enter ID Number (disabled auto-fill by API):" required
              disabled>
            <input
              v-model="fillFields.fname"
              class="appearance-none block w-full bg-slate-400 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-first-firstname" type="text" placeholder="Enter Firstname (disabled auto-fill by API):" required
              disabled>
            <input
              v-model="fillFields.lname"
              class="appearance-none block w-full bg-slate-400 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-first-lastname" type="text" placeholder="Enter Lastname (disabled auto-fill by API):" required
              disabled>
            <input
              v-model="fillFields.email"
              class="appearance-none block w-full bg-gray-100 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              type="email" placeholder="Enter Email:" required>

            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
              Select College:
            </label>
            <select
              v-model="fillFields.college_init"
              class="appearance-none block w-full bg-gray-100 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-College">
              <option disabled value="" class="uppercase">-- SELECT COLLEGE --</option>
              <option v-for="(infoCol, index) in colleges" :key="index" v-bind:value="infoCol.initials">
                {{ infoCol.coll_name }}
              </option>
            </select>
          </div>
          <div class="">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Enter Password:
            </label>
            <input
              v-model="fillFields.password"
              class="appearance-none block w-full bg-gray-100 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-password" type="password" placeholder="Enter Password:">
          </div>

          <button type="submit"
                  class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
            UPDATE VOTER'S INFORMATION
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import store from "../../store";
import Warning from "../../components/Warning.vue";
import VueTailwindPagination from '@ocrv/vue-tailwind-pagination'

let students = []
let colleges = []

let serverResponse = {
  message: ''
}
let errorMsg = {
  message: ''
}

let searchId = {
  idNum: '',
}

let fillFields = {
  idNum: '',
  fname: '',
  lname: '',
  email: '',
  college_init: '',
  password: ''
}

export default {
  name: 'RegVoter',
  components: {
    Warning,
    VueTailwindPagination
  },
  setup() {
    return {
      serverResponse,
      errorMsg,
      searchId,
      fillFields,
      students,
      colleges,
      VueTailwindPagination,
    }
  },
  data() {
    return {
      loading: false,
      success: '',
      error: '',
      currentPage: 1,
      perPage: 5,
      total: this.students.length
    }
  },
  methods: {
    getTableData() {
      this.loading = true

      store.dispatch('getRegisteredVoters')
        .then((response) => {
          response.students.map(function (obj, i) {
            students.push(obj)
          })

          students = []
          store.dispatch('getCollegesData')
            .then((response) => {
              response.success.map(function (obj, i) {
                colleges.push(obj);
              })

              colleges = []
              this.loading = false;
            })
        })
    },
    searchStudent() {
      this.loading = true

      store.dispatch('loadStudentSearch', searchId)
        .then((response) => {
          alert('Data Loaded')
          fillFields.idNum = response.student.idNum
          fillFields.fname = response.student.fname
          fillFields.lname = response.student.lname
          fillFields.email = response.student.email

          this.loading = false
        })
        .catch((error)=>{
          alert('This id is not existing in our system!')
          this.loading = false
        })
    },
    updateVoter(){
      this.loading = true

      store.dispatch('updateVoter', fillFields)
        .then((response)=>{
          this.success = true
          alert(response.success)
          serverResponse.message = response.success

          this.resetData()
          this.loading = false
        })
        .catch((error)=>{
          this.error = true
          alert(error.message)
          errorMsg.message = error.message

          this.loading = false
        })
    },
    resetData(){
      fillFields.idNum = ''
      fillFields.fname = ''
      fillFields.lname = ''
      fillFields.email = ''
      fillFields.password = ''
    },
    deleteVoterAccount(id){
      this.loading = true

      store.dispatch('deleteVoterAccount', id)
        .then((response)=>{
          alert(response.success)
        })
    },
  },
  mounted() {
    this.getTableData();
  }
}
</script>

<style scoped>
#axiosForm { /* Components Root Element ID */
  position: relative;
}

.loader { /* Loader Div Class */
  position: absolute;
  top: 0px;
  right: 0px;
  width: 100%;
  height: 100%;
  background-color: #eceaea;
  background-image: url('../../assets/assets.gif');
  background-size: 50px;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 10000000;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
</style>
