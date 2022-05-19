<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl min-h-screen min-w-full px-2">
      <div class="flex flex-cols font-bold text-5xl">
        <p>COLLEGES</p>
      </div>
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
      <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-2">
        <div class="py-4 px-4 max-w-lg">
          <form class="" @submit.prevent="addCollege">
            <div class="flex flex-wrap -mx-4 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-election">
                COLLEGE:
              </label>
              <input v-model="createCollegeData.coll_name"
                     class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                     id="grid-election" type="text" placeholder="Enter College Name:" required>
            </div>
            <div class="flex flex-wrap -mx-4 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-cname">
                COLLEGE INITIALS:
              </label>
              <input v-model="createCollegeData.initials"
                     class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                     id="grid-cname" type="text" placeholder="Enter Initials of College" required>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <button type="submit"
                        class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                  Add college
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="bg-white-900 min-w-screen">
          <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
            left to right</label>
          <label class="font-semibold text-black">REGISTERED DATA</label>
          <div id="table" class="flex flex-col px-4">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        college
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        college initial
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        REGISTERED VOTER
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        actions
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(collegeStats, key) in collegesData" :key="key"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-white">
                        {{ collegeStats.coll_name }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        {{ collegeStats.initials }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        {{ collegeStats.registered }}
                      </td>
                      <td
                        class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        <button
                          @click="deleteCollege(collegeStats)"
                          class="uppercase text-white bg-red-500 hover:bg-slate-500 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                          delete
                        </button>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "../../store";
import Warning from '../../components/Warning.vue';

let collegesData = []

let createCollegeData = {
  coll_name: '',
  initials: ''
}

let serverResponse = {
  message: ''
}

let errorMsg = {
  message: ''
}

export default {
  name: "Colleges",
  components: {
    Warning
  },
  setup() {
    return {
      collegesData,
      createCollegeData,
      serverResponse,
      errorMsg
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false
    }
  },
  methods: {
    getColleges() {
      this.loading = true

      store.dispatch('getCollegesSorted')
        .then((response) => {
          response.success.map(function (obj, i) {
            collegesData.push(obj)
          })

          this.loading = false

          collegesData = []
        })
    },
    addCollege() {
      this.loading = true

      store.dispatch('createCollegeData', createCollegeData)
        .then((response) => {
          this.success = true
          this.loading = false

          alert(response.success)
          serverResponse.message = response.success
          window.location.reload()
        })
        .catch((error) => {
          this.error = true
          this.loading = false

          alert(error.error)
          errorMsg.message = error.error
        })
    },
    deleteCollege(id) {
      this.loading = true

      store.dispatch('deleteCollegeData', id)
        .then((response) => {
          this.loading = false
          this.success = true

          alert(response.success)
          serverResponse.message = response.success
          window.location.reload()
        })
        .catch((error) => {
          this.error = true
          this.loading = false
          alert(error.error)
        })
    },

  },
  mounted() {
    this.getColleges()
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

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
