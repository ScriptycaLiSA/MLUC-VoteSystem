<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-md w-full space-y-8">
        <div>
          <img class="mx-auto h-24 w-auto"
               src="https://www.dmmmsu.edu.ph/wp-content/uploads/2020/01/DMMMSU-Logo-white-small.png"
               alt="Workflow"/>
          <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">VOTER ACCOUNT UTILITY</h2>
        </div>
        <Warning v-if="error">
          {{ errorMsg }}
          <span
            @click="error=''"
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

        <form class="mt-8 space-y-6 gap-2" @submit.prevent="registerVoter">
          <div class="rounded-md shadow-sm -space-y-px grid gap-2">
            <div>
              <label for="id_num" class="sr-only">ID Number:</label>
              <input v-model="voterAcct.idNum" id="id_num" name="ID_num" type="number" autoComplete="email" required=""
                     class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                     placeholder="ID Number:"/>
            </div>
            <div>
              <label for="In_Email" class="sr-only">Email:</label>
              <input v-model="voterAcct.email" id="In_Email" name="Email" type="email" autoComplete="current-email"
                     required=""
                     class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                     placeholder="Email:"/>
            </div>
            <select v-model="voterAcct.college_init"
                    class="appearance-none block w-full text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-College">
              <option disabled value="" class="uppercase">-- SELECT COLLEGE --</option>
              <option v-for="(infoCol, index) in colleges" :key="index" v-bind:value="infoCol.initials">
                {{ infoCol.coll_name }}
              </option>
            </select>
            <div>
              <label for="Ent_Pass" class="sr-only">Password:</label>
              <input v-model="voterAcct.password" id="Ent_Pass" name="password" type="password" autoComplete="none"
                     required=""
                     class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                     placeholder="Password:"/>
              <div class="mb-2"></div>
            </div>
          </div>
          <div>
            <button type="submit"
                    :disabled="loading"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              Register Account
            </button>

          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Warning from "../components/Warning.vue";
import store from "../store";
import router from "../router";

let colleges = []

let voterAcct = {
  idNum: '',
  email: '',
  college_init: '',
  password: ''
}

function getCollegeSelect() {
  this.loading = true

  store.dispatch('voterGetCollegesData')
    .then((response) => {
      response.success.map((function (obj, i) {
        colleges.push(obj)
      }))
      this.loading = false;
      colleges = []
    })
}

export default {
  name: "VoterCreate",
  components: {
    Warning
  },
  setup() {
    return {
      colleges,
      voterAcct,
      getCollegeSelect
    }
  },
  data() {
    return {
      loading: false,
      error: false,
      loadingBtn: false,
      errorMsg: ''
    }
  },
  methods: {
    registerVoter() {
      this.loading = true

      store.dispatch('createVoterAcct', voterAcct)
        .then(() => {
          alert('You are now registered! Please login to continue...')
          router.push({
            name: 'VoterLogin'
          })
          this.loading = false
        })
        .catch((error) => {
          this.error = true
          this.loading = false
          if (error.response.status === 401) {
            this.errorMsg = error.response.data.errors
          }
          else if (error.response.status === 422){
            this.errorMsg = error.response.data.errors
          }
        })
    },
  },
  mounted() {
    this.getCollegeSelect()
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
  background-image: url('../assets/assets.gif');
  background-size: 50px;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 10000000;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
</style>
