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
            <label class="mt-10 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex items-right"
                   for="dataTable">
              showing the data active voting results from your college:
            </label>
            <div>
              <div id="dataTable" class="flex flex-cols flex-auto w-full mb-10 overflow-hidden rounded-lg shadow-xl my-4"
                   v-for="(i1, k1) in posTemp" :key="k1">
                <table class="w-full flex-auto">
                  <thead>
                  <tr
                    class="flex justify-center text-md font-medium tracking-wide text-left text-gray-900 uppercase ">
                    <th class="px-4 py-3"></th>
                  </tr>
                  </thead>

                  <thead>
                  <tr
                    class="text-xs font-medium tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-gray-600">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Position</th>
                    <th class="px-4 py-3">Votes</th>
                  </tr>
                  </thead>
                  <tbody class="bg-white" v-for="(i2, k2) in candTemp" :key="k2">
                  <tr class="text-gray-700">
                    <td class="px-4 py-3 border">
                      <div class="flex items-center text-sm">
                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full"
                               :src="getImgInfo(i2.image)" alt="" loading="lazy"/>
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold text-2xl text-black">{{ i2.lname }}, {{i2.fname}} {{i2.mname}}</p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 border">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold text-2xl text-black">{{i2.pos_name}}</p>
                        </div>
                      </div>
                    </td>
                    <div class="" v-for="(i3, k3) in resTemp" :key="i3.id">
                      <div class="px-4 py-3 text-sm border font-bold text-3xl justify-center"
                           v-if="i3.candidate_id===i2.id">
                        {{ i3.votes }}
                      </div>
                      <div class="px-4 py-3 text-sm border font-bold text-3xl justify-center" v-else-if="i2.position_id===i3.position_id&&i3.candidate_id===i2.id">0</div>
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
