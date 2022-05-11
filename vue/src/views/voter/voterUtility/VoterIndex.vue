<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl min-h-screen">
      <div class="hidden" v-if="getUserVerify()"></div>

      <div class="text-4xl sm:text-sm md:text-sm px-16 " v-if="ballotData.length > 1">
        <div class="border border-slate-100 text-4xl sm:text-md px-16 uppercase">election ballot</div>
        <form @submit.prevent="castVote">
          <div id="table1" class="flex flex-col mx-4" v-for="(i, k) in ballotPositions" :key="k">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-4 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <div class="bg-grey-50 dark:bg-gray-400 px-2 py-3 border-solid border-grey-light border-b">
                    {{ i.pos_name }}
                  </div>
                  <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                        Select
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                        Profile
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                        Name
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-medium tracking-wider text-center text-gray-700 uppercase dark:text-gray-400">
                        Partylist
                      </th>
                    </tr>
                    </thead>

                    <tbody v-for="(index, key) in ballotData">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-if="index.position_id==i.id">
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="form-check">
                          <input
                            v-model="selected.candidate_id"
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" :value="index.id" :id="i.id" :name="i.pos_name">
                        </div>
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <div class="relative w-14 h-14">
                          <img class="rounded-full border border-gray-100 shadow-sm"
                               :src="getImgInfo(index.image)" alt="user image"/>
                        </div>
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <label class="form-check-label text-white mb-12">
                          {{ index.cand_name }}
                        </label>
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ index.party_name }}
                      </td>
                      <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      </td>
                    </tr>
                    </tbody>

                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--selected field here /casted vote-->
          <button
            type="submit"
            class="my-2 uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            cast vote
          </button>
        </form>
      </div>

      <div v-else>
        <div class="border border-slate-100 text-4xl sm:text-md md:text-8xl px-16">{{ voterMessage.message }}</div>
      </div>

    </div>
  </div>
</template>

<script>
import store from '../../../store'

let userSpec = {
  id: '',
  college_init: ''
}

let selected = []

function getImgInfo(string) {
  return "http://localhost:8000/api/image_search/" + string
}

let ballotData = []
let ballotPositions = []

function getUserVerify() {
  this.loading = true

  store.dispatch('getVoterSession')
    .then((response) => {
      userSpec.id = response.id
      userSpec.college_init = response.college_init

      store.dispatch('getPositionData')
        .then((response) => {
          let data = response.success

          data.map(function (obj, i) {
            ballotPositions.push(obj)
          })
          ballotPositions = []

          this.loading = false
        })
      this.getBallot2()
    })
    .catch((error) => {
    })
}

export default {
  name: "VoterIndex",
  components: {},
  setup() {
    return {
      userSpec,
      getUserVerify,
      ballotData,
      ballotPositions,
      getImgInfo,
      selected
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false,
      errorMsg: '',
      loadingBtn: false,
      voterMessage: [],
      checkedValue: '',
    }
  },
  methods: {
    //as a validator for rendering ballot
    getBallot2() {
      store.dispatch('voterViewBallot', userSpec)
        .then((response) => {
          let data = response.data

          this.voterMessage.message = data.message
          data.message.map(function (obj, i) {
            ballotData.push(obj)
          })
          ballotData = []

        })
    },
    castVote(){
      this.loading = true

      store.dispatch('castVoteFromBallot', selected)
        .then((response)=>{
          console.log(response)
        })
        .catch((error)=>{

        })
    }
  },
  mounted() {
    this.getUserVerify()
    this.checkedValue = '1'
  },
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
  background-image: url('../../../assets/assets.gif');
  background-size: 50px;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 10000000;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
</style>
