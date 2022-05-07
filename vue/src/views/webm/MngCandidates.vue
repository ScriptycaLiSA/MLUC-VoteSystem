<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100  px-2 min-w-full min-h-full grid grid-cols-1 xl:grid-cols-2">
      <div class="bg-slate-100  px-12">
        <div class="py-5 ">
          <h1 class="font-bold text-5xl py-3">Manage Candidates</h1>
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

        <form class="w-full max-w-lg" @submit.prevent="createCandidate">
          <div class="flex justify-center">
            <img class="h-24 w-24 rounded-full mx-2 my-2" :src="this.imagePreview" alt="img"/>
            <div class="mb-3 w-96">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formFileLg">
                Image file upload:
              </label>
              <input v-on:change="fileHandle" class="form-control block w-full px-2 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileLg" type="file">
            </div>
          </div>
          <div class="flex flex-wrap -mx-4 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
              Name:
            </label>
            <input
              v-model="name"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-first-lastname" type="text" placeholder="Full Name (First Name, Middle Initial, Last Name)"
              required>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-elections">
              Election:
            </label>
            <select v-model="election_id"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-elections">
              <option disabled value="" class="uppercase">-- SELECT ELECTION --</option>
              <option v-for="(infoCol, index) in elections" :key="index" v-bind:value="infoCol.id">
                {{ infoCol.elec_name }}
              </option>
            </select>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
              College:
            </label>
            <select v-model="college_init"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-College">
              <option disabled value="" class="uppercase">-- SELECT COLLEGE --</option>
              <option v-for="(infoCol, index) in colleges" :key="index" v-bind:value="infoCol.initials">
                {{ infoCol.coll_name }}
              </option>
            </select>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-party">
              Partylist:
            </label>
            <select
              v-model="partylist_id"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-party">
              <option disabled value="" class="uppercase">-- SELECT PARTYLIST (Optional) --</option>
              <option v-for="(infoCol, index) in partylist" :key="index" v-bind:value="infoCol.id">
                {{ infoCol.party_name }}
              </option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            </div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-Position">
              Running Position
            </label>
            <select
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-Position"
              v-model="position_id">
              <option disabled value="" class="uppercase">-- SELECT POSITION --</option>

              <option v-for="(infoCol, index) in positions" :key="index" v-bind:value="infoCol.id">
                {{ infoCol.pos_name }}
              </option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            </div>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-Position">
              Description
            </label>
            <div
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
              <textarea
                v-model="description"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="Portfolio" rows="3" placeholder="Why do you want to run for this position"></textarea>
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-0.1">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <button type="submit"
                      class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                ADD CANDIDATE
              </button>
            </div>
          </div>
        </form>
      </div>
      <!--Table-->
      <div class="bg-white-50 rounded-lg grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-1 min-w-screen gap-2">
        <div>
          <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
            left to right</label>
          <div id="table" class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-1">
              <div class="inline-block py-2 min-w-full sm:px-6 lg:px-2">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                          class="py-2 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Candidate
                      </th>
                      <th scope="col"
                          class="py-2 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        College
                      </th>
                      <th scope="col"
                          class="py-2 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Running for
                      </th>
                      <th scope="col"
                          class="py-2 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Election
                      </th>
                      <th scope="col"
                          class="py-2 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Date Created
                      </th>
                      <th scope="col"
                          class="py-2 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Action
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(index, key) in savedCandidates" :key="index.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ index.cand_name }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ index.college_init }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ index.pos_name }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ index.elec_name }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        {{ index.created_at }}
                      </td>
                      <td class="hidden">
                        {{ index.id }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                        <button @click="deleteCandidate(index)"
                                class="uppercase text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
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
import Warning from "../../components/Warning.vue";

let colleges = [];
let partylist = [];
let elections = [];
let positions = [];

let savedCandidates = []

let serverResponse = {
  message: ''
}
let errorMsg = {
  message: ''
}

let people = {
  name: '',
  college_init: '',
  election_id: '',
  partylist_id: '',
  position_id: '',
  image: null,
  description: '',
}

function getSelectData() {
  this.loading = true;
  store.dispatch('getCollegesData')
    .then((response) => {
      response.success.map(function (obj, i) {
        colleges.push(obj);
      })
      colleges = []
      store.dispatch('getPartylistData')
        .then((response) => {
          response.success.map(function (obj, i) {
            partylist.push(obj);
          })
          partylist = []
          store.dispatch('getElectionData')
            .then((response) => {
              response.success.map(function (obj, i) {
                elections.push(obj);
              })
              elections = []
              store.dispatch('getPositionData')
                .then((response) => {
                  response.success.map(function (obj, i) {
                    positions.push(obj);
                  })
                  positions = []
                  store.dispatch('getSavedCandidates')
                    .then((response) => {
                      response.success.map((function (obj, i) {
                        savedCandidates.push(obj)
                      }))
                      savedCandidates = []
                      this.loading = false
                    })
                    .catch((error) => {
                      errorMsg.message = error.error
                    })
                })
                .catch((error) => {
                  console.log(error)
                })
            })
            .catch((error) => {
              console.log(error)
            })
        })
        .catch((error) => {
          console.log(error);
        })
    })
    .catch((error) => {
      console.log(error);
    })
}

export default {
  name: "Candidates",
  components: {Warning},
  setup() {
    return {
      people,
      colleges,
      getSelectData,
      partylist,
      elections,
      positions,
      serverResponse,
      errorMsg,
      savedCandidates,
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false,
      imagePreview: null,
      name: '',
      college_init: '',
      election_id: '',
      partylist_id: '',
      position_id: '',
      image: {},
      description: '',
    }
  },
  methods: {
    fileHandle(e) {
      this.image = e.target.files[0]
      let reader = new FileReader()
      let img = this.image

      if(img['size'] > 5120000){
        alert('The file inserted is too large!')
      }
      else{
        alert('File has inserted!')
      }

      reader.readAsDataURL(this.image)
      reader.onload = (file) => {
        this.imagePreview = file.target.result
      }
    },
    createCandidate() {
      this.loading = true
      let data = new FormData()

      data.append('name', this.name)
      data.append('college_init', this.college_init)
      data.append('election_id', this.election_id)
      data.append('partylist_id', this.partylist_id)
      data.append('position_id', this.position_id)
      data.append('image', this.image)
      data.append('description', this.description)

      store.dispatch('createCandidates', data)
        .then((response) => {
          this.loading = false
          this.success = true
          serverResponse.message = response.success
        })
        .catch((error) => {
          this.loading = false
          this.error = false
          errorMsg.message = error.error
        })
    },
    deleteCandidate(id) {
      this.loading = true

      store.dispatch('deleteCandidate', id)
        .then((response) => {
          this.loading = false
          this.success = true
          serverResponse.message = response.success
        }).catch((error) => {
          this.loading = false
          this.error = true
          errorMsg.message = error.error
      })
    }
  },
  mounted() {
    this.getSelectData()
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
  background-image: url('../../assets/assets.gif');
  background-size: 50px;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 10000000;
  opacity: 0.6;
  filter: alpha(opacity=60);
}
</style>
