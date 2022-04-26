<template>
  <div class="bg-slate-100 shadow-xl px-3 min-w-full min-h-full grid grid-cols-1 2xl:grid-cols-2">
    <div class="bg-slate-100 shadow-xl px-12">
      <div class="py-5 ">
        <h1 class="font-bold text-5xl py-3">Manage Candidates</h1>
      </div>
      <form class="w-full max-w-lg">
        <div class="flex justify-center">
          <div class="mb-3 w-96">
            <label for="formFileLg" class="form-label inline-block mb-2 text-gray-700">Input Candidate image</label>
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
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
            College:
          </label>
          <select v-model="people.college"
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
            v-model="people.partylist"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-party">
            <option disabled value="" class="uppercase">-- SELECT PARTYLIST --</option>

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
            id="grid-Position">
            <option>SBO Mayor</option>
            <option>SBO Vice-Mayor</option>
            <option>Secretary</option>
            <option>Treasurer</option>
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
              Register voter
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
    <div>
      <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table left
        to right</label>
      <div id="table" class="flex flex-col mx-2">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
              <table class="min-w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                  <th scope="col"
                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    candidate
                  </th>
                  <th scope="col"
                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    ID
                  </th>
                  <th scope="col"
                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Date created
                  </th>
                  <th scope="col"
                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    email
                  </th>
                  <th scope="col" class="relative py-3 px-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="person in people" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ person.name }}
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ person.id }}
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ person.college }}
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    {{ person.email }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
</template>

<script>
import {ref} from 'vue'
import store from "../../store";

let colleges = [];
let partylist = [];
const people = {
  name: '',
  college: '',
  email: '',
  partylist: '',
  image: ''
}

function getSelectData() {
  store.dispatch('getCollegesData')
    .then((response) => {
      response.success.map(function (obj, i) {
        colleges.push(obj);
      })
    })
    .catch((error) => {
      console.log(error);
    })
  store.dispatch('getPartylistData')
    .then((response) => {
      response.success.map(function (obj, i) {
        partylist.push(obj);
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
      partylist
    }
  },
  method: {},
  mounted() {
    this.getSelectData();
  },
}
</script>

<style scoped>

</style>
