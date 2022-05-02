<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl px-3 min-w-full min-h-full grid grid-cols-1 2xl:grid-cols-2">
      <div class="bg-slate-100 shadow-xl px-12">
        <div class="py-5 ">
          <h1 class="font-bold text-5xl py-3">Manage Candidates</h1>
        </div>
        <form class="w-full max-w-lg">
          <div class="flex justify-center">
            <div class="mb-3 w-96">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="formFileLg">
                Image file upload:
              </label>
              <input class="form-control block w-full px-2 py-1.5 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileLg" type="file">
            </div>
          </div>

          <div class="flex flex-wrap -mx-4 mb-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
              Name:
            </label>
            <input
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-first-lastname" type="text" placeholder="Full Name (First Name, Middle Initial, Last Name)"
              required>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-elections">
              Election:
            </label>
            <select v-model="people.election_id"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-elections">
              <option disabled value="" class="uppercase">-- SELECT ELECTION --</option>
              <option v-for="(infoCol, index) in elections" :key="index" v-bind:value="infoCol.id">
                {{ infoCol.name }}
              </option>
            </select>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
              College:
            </label>
            <select v-model="people.college_init"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-College">
              <option disabled value="" class="uppercase">-- SELECT COLLEGE --</option>
              <option v-for="(infoCol, index) in colleges" :key="index" v-bind:value="infoCol.initials">
                {{ infoCol.name }}
              </option>
            </select>
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-party">
              Partylist:
            </label>
            <select
              v-model="people.partylist_id"
              class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
              id="grid-party">
              <option disabled value="" class="uppercase">-- SELECT PARTYLIST (Optional) --</option>
              <option v-for="(infoCol, index) in partylist" :key="index" v-bind:value="infoCol.id">
                {{ infoCol.name }}
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
              v-model="people.position_id">
              <option disabled value="" class="uppercase">-- SELECT POSITION --</option>

              <option v-for="(infoCol, index) in positions" :key="index" v-bind:value="infoCol.id">
                {{ infoCol.name }}
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
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="Portfolio" rows="3" placeholder="Why do you want to run for this position"></textarea>
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-0.1">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <button type="button"
                      class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                Register
              </button>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <button type="button"
                      class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 mr-2 mb-2">
                Update
              </button>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
              <button type="button"
                      class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Delete
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import {ref} from 'vue'
import store from "../../store";

let colleges = [];
let partylist = [];
let elections = [];
let positions = [];

const people = {
  name: '',
  college_init: '',
  election_id: '',
  partylist_id: '',
  position_id: '',
  image: '',
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
                  this.loading = false;
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
  setup() {
    return {
      people,
      colleges,
      getSelectData,
      partylist,
      elections,
      positions
    }
  },
  method: {},
  mounted() {
    this.getSelectData()
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false
    }
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
