<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-200 shadow-xl 2xl:min-w-full 2xl:px-4 2xl:py-2">
      <div class="flex items-left font-bold text-5xl py-4">
        <p>MANAGE PARTYLIST</p>
      </div>
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
      <div
        class="bg-white-50 rounded-lg shadow-xl grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 2xl:grid-cols-2 px-3 min-w-screen">
        <div class="py-4 px-4 max-w-lg">
          <form class="" @submit="addPartylist">
            <div class="flex flex-wrap -mx-4 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-election">
                Create Partylist
              </label>
              <input v-model="partylistData.name"
                     class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                     id="grid-election" type="text" placeholder="Partylist Name:" required>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <button type="submit"
                        class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                  Add Partylist
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="mx-10">
          <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
            left to right</label>
          <div id="table" class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        position
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        date created
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        actions
                      </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(index, key) in savedPartylist" :key="index.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 m-10">
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ index.party_name }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ index.created_at }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <button @click="deletePartylist(index)"
                                class="uppercase text-white bg-red-500 hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
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
import store from '../../store'
import Warning from "../../components/Warning.vue";

let savedPartylist = []
let serverResponse = {
  message: ''
}
let errorMsg = {
  message: ''
}

let partylistData = {
  name: ''
}

function getPartylistTable() {
  this.loading = true

  store.dispatch('getPartylistData')
    .then((response) => {
      response.success.map((function (obj, i) {
        savedPartylist.push(obj)
      }))
      savedPartylist = []
      this.loading = false
    })
    .catch((error) => {
      this.loading = false
    })
}

export default {
  name: "MngPartylist",
  components: {Warning},
  setup() {
    return {
      partylistData,
      errorMsg,
      serverResponse,
      savedPartylist,
      getPartylistTable
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
    addPartylist(ev) {
      ev.preventDefault();
      this.loading = true

      store.dispatch('addPartylist', partylistData)
        .then((response) => {
          this.success = true;
          this.loading = false
          serverResponse.message = response.success

          alert(response.success)
          window.location.reload()
          serverResponse.message = response.success
        })
        .catch((error) => {
          this.error = true
          this.loading = false
          errorMsg.message = error.error

          alert(error.response.data.message)
          errorMsg.message = error.response.data.message
        })
    },
    deletePartylist(id) {
      this.loading = true;
      store.dispatch('deletePartylist', id)
        .then((response) => {
          this.success = true;
          this.loading = false
          alert(response.success)
          serverResponse.message = response.success
          window.location.reload()
        })
        .catch((error2) => {
          this.error = true
          this.loading = false
          errorMsg.message = error2.error
        })
    }
  },
  mounted() {
    this.getPartylistTable()
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
