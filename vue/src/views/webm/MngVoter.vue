<template>
  <div class="bg-slate-100 shadow-xl min-h-full">
    <div class="flex py-5 px-5 ">
      <h1 class="font-bold text-5xl py-3 items-left">Manage Voter</h1>
    </div>
    <form class="px-2 py-2" @submit="searchStudent">

      <div class="grid grid-cols-2 gap-2">
        <input v-model="searchId.idNum" id="idNum" name="idNum" type="number" required=""
               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
               placeholder="Enter ID"/>
        <button type="submit"
                :disabled="loading"
                class="text-gray-900 bg-white w-40 border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">
          <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          Find & Show ID
        </button>
      </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-1 2xl:grid-cols-2">
      <form class="px-2 py-2">
        <div class="">
          <input
            v-model="fillFields.fname"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-firstname" type="text" placeholder="Enter Firstname (disabled auto-fill by API):" required
            disabled>
          <input
            v-model="fillFields.lname"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-first-lastname" type="text" placeholder="Enter Lastname (disabled auto-fill by API):" required
            disabled>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="email" placeholder="Enter Email:" required>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
            Select College:
          </label>
          <select
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-College">
            <option disabled>----Choose a college----</option>
            <option>College of Information Technology</option>
            <option>College of Technical Education</option>
            <option>College of Technology</option>
            <option>College of Engineering</option>
            <option>College of Management</option>
            <option>Institute of Criminal Justice Education</option>
            <option>College of Arts And Sciences</option>
            <option>College of Arts And Law</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

          </div>
        </div>
        <div class="">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Enter Password:
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            id="grid-password" type="password" placeholder="Enter Password:">
        </div>

        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-3 items-left">
          <div class="">
            <button type="button"
                    class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
              Register voter
            </button>
          </div>
          <div class="">
            <button type="button"
                    class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 mr-2 mb-2">
              Update
            </button>
          </div>
          <div class="">
            <button type="button"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
              Delete
            </button>
          </div>
        </div>
      </form>

      <div>
        <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
          left to right</label>
        <div id="table" class="flex flex-col mx-2">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                  <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                      VOTER
                    </th>
                    <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                      COLLEGE
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

                  <tr v-for="(table, index) in students" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ table.fname }} {{ table.lname }}
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      {{ table.college}}
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                      {{ table.email }}
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
  </div>
</template>

<script>
import store from "../../store";
import {ref} from 'vue'
import {computed} from "vue";

const loading = ref(false);

const searchId = {
  idNum: '',
}

const fillFields = {
  fname: '',
  lname: '',
}

function searchStudent(ev) {
  ev.preventDefault();

  loading.value = true;

  store.dispatch('loadStudentSearch', searchId)
    .then((response)=>{
      loading.value = false;
      fillFields.fname = response.studentId.fname;
      fillFields.lname = response.studentId.lname;
    })
    .catch(()=>{
      loading.value = false;
    })
}

export default{
  name: 'RegVoter',
  setup(){
    return {
      loading,
      searchId,
      fillFields,
      searchStudent
    }
  },
  data(){
    return{
      students: []
    }
  },
  methods: {
    getTableData(){
      store.dispatch('getRegisteredVoters')
      .then((response)=>{
        this.students = response.students;
      })
      .catch((error)=>{
        console.log(error);
      })
    }
  },
  mounted() {
    this.getTableData();
  }
}
</script>

<style scoped>

</style>
