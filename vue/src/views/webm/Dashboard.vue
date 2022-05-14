<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class=" min-h-screen ">
      <div class="flex font-bold pl-2 text-5xl">
        <p>DASHBOARD</p>
      </div>

      <div class="grid 2xl:grid-cols-2 px-8 py-4 gap-16 xl:mb-8">
        <div class="px-2 ">
          <form @submit.prevent="getElectionFinalData">
            <div class="flex flex-wrap text-4xl sm:text-md md:text-8xl  mx-2 mb-6">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                     for="grid-election">
                ELECTION:
              </label>
              <select v-model="electionId.election_id"
                      class="appearance-none block w-full rounded-md bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                      id="grid-election">
                <option disabled value="" class="uppercase">-- SELECT ELECTION --</option>
                <option v-for="(infoCol, index) in elections" :key="index" v-bind:value="infoCol.id">
                  {{ infoCol.elec_name }}
                </option>
              </select>
              <button
                :disabled="loading"
                type="submit"
                class="uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              >
                SEARCH DATA / RENDER
              </button>
            </div>
          </form>

          <!-- div v-if wrap -->
          <div v-if="candTemp.length > 1" class="grid-cols-1 2xl:grid-cols-2 px-2 py-4 gap-2">
            <label class="mt-10 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex items-right"
                   for="dataTable">
              showing the data voting results from current voting event:
            </label>
            <div>
              <div class="grid grid-cols-2 sm:grid-cols-1 md:grid-cols-1 items-center">
                <div class="flex flex-cols">
                  <button
                    @click="printData()"
                    class="flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" data-modal-toggle="defaultModal">
                    PRINT RESULTS
                  </button>
                  <button
                    class="flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" data-modal-toggle="defaultModal">
                    SEND THE RESULTS
                  </button>
                </div>
              </div>
              <div id="dataTable" class="flex w-full mb-10 overflow-hidden rounded-lg shadow-xl my-4"
                   v-for="(i1, k1) in posTemp" :key="k1">
                <table class="w-full flex-auto">
                  <thead>
                  <tr
                    class="flex justify-center text-md font-medium tracking-wide text-left text-gray-900 uppercase ">
                    <th class="px-4 py-3">{{ i1.pos_name }}</th>
                  </tr>
                  </thead>

                  <thead>
                  <tr
                    class="text-xs font-medium tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-gray-600">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Votes</th>
                  </tr>
                  </thead>
                  <tbody class="bg-white" v-for="(i2, k2) in candTemp" :key="k2">
                  <tr class="text-gray-700" v-if="i2.position_id===i1.id">
                    <td class="px-4 py-3 border">
                      <div class="flex items-center text-sm">
                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full"
                               :src="getImgInfo(i2.image)" alt="" loading="eager"/>
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold text-2xl text-black">{{ i2.cand_name }}</p>
                        </div>
                      </div>
                    </td>
                    <div class="" v-for="(i3, k3) in resTemp" :key="k3">
                      <div class="px-4 py-3 text-sm border font-bold text-3xl justify-center"
                           v-if="i3.candidate_id===i2.id">
                        <td class="">{{ i3.votes }}</td>
                      </div>
                    </div>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <div class="border border-slate-100 text-2xl sm:text-md px-16" v-else>
            {{ errorMessage.error }}
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DashModal from './toolComponents/dashModal.vue';
import ViewStats from "./toolComponents/ChartDoughnut.vue";
import store from "../../store";

let elections = []

let electionId = {
  election_id: ''
}

let errorMessage = {
  error: ''
}

let posTemp = []
let resTemp = []
let candTemp = []

function getImgInfo(string) {
  return "http://localhost:8000/api/image_search/" + string
}

function getElectionResults() {
  this.loading = true
  store.dispatch('getElectionData')
    .then((response) => {
      response.success.map(function (obj, i) {
        elections.push(obj)
      })
      elections = []
      this.loading = false
    })
}

export default {
  name: "Dashboard",
  components: {
    DashModal,
    ViewStats
  },
  setup() {
    return {
      electionId,
      elections,
      posTemp,
      resTemp,
      candTemp,
      errorMessage,
      getElectionResults,
      getImgInfo
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false,
    }
  },
  methods: {
    getElectionFinalData() {
      this.loading = true

      store.dispatch('getElectionResult', electionId)
        .then((response) => {
          this.errorMessage.error = ''
          this.posTemp = []
          this.resTemp = []
          this.candTemp = []

          errorMessage.error = response.success

          this.posTemp = response.success.original.position
          this.resTemp = response.success.original.result
          this.candTemp = response.success.original.candidate

          this.loading = false
        })
        .catch((error) => {
          this.loading = false
        })
    },
    printData() {
      this.loading = true
      window.print()
      this.loading = false
    }
  },
  mounted() {
    this.getElectionResults()
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
