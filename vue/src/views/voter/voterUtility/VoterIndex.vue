<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl min-h-screen ">
      <!-- test div -->
      <div class="hidden" v-if="getUserVerify()"></div>
      <div class="" v-if="getBallot">
        {{ voterMessage.message }}
      </div>

      <div class="" v-else>
        <div class="flex font-bold pl-2 text-4xl">
          <p>Election Title:</p>
        </div>
        <div
          class="bg-white-50 rounded-lg shadow-xl grid grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 2xl:grid-cols-1 px-2 min-w-screen">
          <div class="py-4 px-4 max-w-lg"></div>
          <div>
            <label for="table1" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the
              table
              left to right</label>
            <div id="table1" class="flex flex-col mx-4">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-4 min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <div class="bg-grey-50 dark:bg-gray-400 px-2 py-3 border-solid border-grey-light border-b">
                      %Position%
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
                      <tbody>

                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <div class="form-check">
                            <input
                              class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                              type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <div class="relative w-12 h-12">
                            <img class="rounded-full border border-gray-100 shadow-sm"
                                 src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image"/>
                            <div
                              class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <label class="form-check-label text-white mb-12">
                            %MOMO%
                          </label>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          %Manyak%
                        </td>
                        <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        </td>
                      </tr>
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <div class="form-check">
                            <input
                              class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                              type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <div class="relative w-12 h-12">
                            <img class="rounded-full border w-12 h-12 border-gray-100 shadow-sm"
                                 src="https://www.bongbongmarcos.com/wp-content/uploads/2022/04/bongbong-marcos.jpeg"
                                 alt="user image"/>
                            <div
                              class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <label class="form-check-label text-white mb-12">
                            %Bong Bong Marcos%
                          </label>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          %UniTeam%
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
          </div>

          <div>
            <label for="table2" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the
              table
              left to right</label>
            <div id="table2" class="flex flex-col mx-4">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block py-4 min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden shadow-md sm:rounded-lg">
                    <div class="bg-grey-50 dark:bg-gray-400 px-2 py-3 border-solid border-grey-light border-b">
                      %Position%
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
                      <tbody>

                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <div class="form-check">
                            <input
                              class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                              type="radio" name="flexRadioDefault2" id="flexRadioDefault3" checked>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <div class="relative w-12 h-12">
                            <img class="rounded-full border border-gray-100 shadow-sm"
                                 src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image"/>
                            <div
                              class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <label class="form-check-label text-white mb-12">
                            %MOMO%
                          </label>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          %Manyak%
                        </td>
                        <td class="hidden py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        </td>
                      </tr>
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <div class="form-check">
                            <input
                              class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                              type="radio" name="flexRadioDefault2" id="flexRadioDefault4" checked>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <div class="relative w-12 h-12">
                            <img class="rounded-full border w-12 h-12 border-gray-100 shadow-sm"
                                 src="https://www.bongbongmarcos.com/wp-content/uploads/2022/04/bongbong-marcos.jpeg"
                                 alt="user image"/>
                            <div
                              class="absolute top-0 right-0 h-3 w-3 my-1 border-2 border-white rounded-full bg-green-400 z-2"></div>
                          </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          <label class="form-check-label text-white mb-12">
                            %Bong Bong Marcos%
                          </label>
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                          %UniTeam%
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
          </div>
        </div>
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

let ballotData = []

function getUserVerify() {
  store.dispatch('getVoterSession')
    .then((response) => {
      userSpec.id = response.id
      userSpec.college_init = response.college_init

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
      ballotData
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false,
      errorMsg: '',
      loadingBtn: false,
      voterMessage: []
    }
  },
  methods: {
    //as a validator for rendering ballots
    getBallot: function () {
      store.dispatch('voterViewBallot', userSpec)
        .then((response) => {
          return response.message.length > 1
        })
    },
    getBallot2() {
      this.loading = true
      store.dispatch('voterViewBallot', userSpec)
        .then((response) => {
          this.voterMessage.message = response.data.message
          console.log(this.voterMessage.message)

          this.loading = false
        })
    }
  },
  created() {
    this.getUserVerify()
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
