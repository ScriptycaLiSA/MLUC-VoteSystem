<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class=" min-h-screen ">
      <div class="flex font-bold pl-2 text-5xl">
        <p>LEADERBOARD</p>
      </div>

      <div class="grid 2xl:grid-cols-2 px-8 py-4 gap-16 xl:mb-8">
        <div class="px-2 ">

          <!-- div v-if wrap -->
          <div v-if="candTemp.length > 1" class="grid-cols-1 2xl:grid-cols-2 px-2 py-4 gap-2">
            <label class="mt-10 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex items-right">
              showing the data active voting results from your college:
            </label>
            <div class="bg-white-50 rounded-lg grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-1 min-w-screen gap-2">
              <div id="table" class="flex flex-col px-2 sm:px-0.1">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                      <table class="min-w-full">
                        <thead class="border-gray-600 shadow-2xl">
                        <tr>
                          <th scope="col"
                              class="py-3 px-6 text-xs font-semibold tracking-wider text-center text-gray-800 uppercase dark:text-gray-700">
                            image
                          </th>
                          <th scope="col"
                              class="py-3 px-6 text-xs font-semibold tracking-wider text-center text-gray-800 uppercase dark:text-gray-700">
                            name
                          </th>
                          <th scope="col"
                              class="py-3 px-6 text-xs font-semibold tracking-wider text-center text-gray-800 uppercase dark:text-gray-700">
                            position
                          </th>
                          <th scope="col"
                              class="py-3 px-6 text-xs font-semibold tracking-wider text-center text-gray-800 uppercase dark:text-gray-700">
                            votes
                          </th>
                        </tr>
                        </thead>
                        <tbody v-for="(i2, k2) in candTemp" :key="k2">

                        <tr
                          class="border-b dark:bg-gray-100 dark:border-gray-100" v-for="(i1, k1) in posTemp" :key="k1">
                          <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="object-cover w-12 h-12 rounded-full"
                                 :src="getImgInfo(i2.image)" alt=""/>
                          </td>
                          <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap ">
                            {{ i2.lname }}, {{ i2.fname }} {{ i2.mname }}
                          </td>
                          <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap ">
                            {{ i2.pos_name }}
                          </td>
                          <td class="px-4 py-3 text-sm font-bold text-3xl justify-center text-gray-500 text-gray-900">
                            <div v-for="(i3, k3) in resTemp" :key="k3">
                              <div v-if="i3.candidate_id===i2.id">
                                {{ i3.votes }}
                              </div>
                            </div>
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
          <div class="border border-slate-100 text-2xl sm:text-md px-16" v-else>
            {{ errorMessage.error }}
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "../../../store";

let elections = []

let electionId = {
  election_id: ''
}

let userSpec = {
  id: '',
}

let elecId = {
  election_id: ''
}

let errorMessage = {
  error: ''
}

let posTemp = []
let resTemp = []
let candTemp = []

//3 way instantiate
function getUserVerify() {
  this.loading = true

  store.dispatch('getVoterSession')
    .then((response) => {
      userSpec.id = response.id

      store.dispatch('voterGetSample', userSpec)
        .then((response) => {
          elecId.election_id = response.data.votes.election_id
          this.getElectionFinalData()
        })
    })
    .catch((error) => {
    })
}

function getImgInfo(string) {
  return "http://localhost:8000/api/image_search/" + string
}

function getElectionFinalData()
{
  this.loading = true

  store.dispatch('voterLeaderboard', elecId)
    .then((response) => {
      this.posTemp = []
      this.resTemp = []
      this.candTemp = []

      errorMessage.error = response.data.message

      this.posTemp = response.data.success.original.position
      this.resTemp = response.data.success.original.result
      this.candTemp = response.data.success.original.candidate


      this.loading = false
    })
}

export default {
  name: "VoterLeaderboardTally",
  components: {
  },
  setup() {
    return {
      electionId,
      elections,
      posTemp,
      resTemp,
      candTemp,
      getImgInfo,
      getUserVerify,
      elecId,
      errorMessage,
      getElectionFinalData
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
  },
  mounted() {
    this.getUserVerify()
  }
}
</script>

<style scoped>

</style>
