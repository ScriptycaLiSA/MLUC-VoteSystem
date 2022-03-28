<template>
  <div class="bg-slate-100 shadow-xl px-3 min-h-screen">
    <div class="font-bold text-5xl py-3">
      <p>MASTER LIST UPDATE</p>
    </div>
    <div
      class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-3 items-center">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8" v-for="data in loadContData2"
           :key="loadContData2.id">
        <table class="min-w-full divide-y divide-gray-200 shadow-xl">
          <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-center text-xl font-medium text-gray-500 uppercase tracking-wider">
              {{ data.idNum }}
            </th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-2xl font-bold text-gray-900">{{ data.fname }} {{ data.lname }}</div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
      </div>
      <div class="grid grid-cols-1 items-center py-2">
        <div class="flex flex-cols">
          <form @submit="updateServer">
            <button
              type="submit"
              class="uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5
            update database server (system db)
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import {ref} from 'vue'
import store from '../../store'

const loadingUpdt = ref(false);

function parseFromOriginal() {
  store.dispatch('getAllRecordsSource')
    .then((response) => {
      systemPushServer.idNum = response.students_info.idNum;
      systemPushServer.fname = response.students_info.fname;
      systemPushServer.lname = response.students_info.lname;
      systemPushServer.college = response.students_info.college;
      this.loadContData2 = response.students_info;
    })
    .catch((error) => {
      console.log(error);
    })
}

let systemPushServer = {
  'idNum': '',
  'fname': '',
  'lname': '',
  'college': '',
}

function loadDataForLetVar(ev){
  ev.preventDefault();

  store.dispatch('getAllRecordsSource')
    .then((response)=>{
      systemPushServer.idNum = response.students_info.idNum;
      systemPushServer.fname = response.students_info.fname;
      systemPushServer.lname = response.students_info.lname;
      systemPushServer.college = response.students_info.college;
    })
    .catch((error)=>{
      console.log(error);
    })
}

function updateServer(ev) {
  ev.preventDefault();

  store.dispatch('systemRecordUpdate', systemPushServer)
    .then((response)=>{
      console.log(response);
    })
    .catch((err)=>{
      console.log(err);
    })
}

export default {
  name: "UpdtMasterList",
  setup() {
    return {
      loadingUpdt,
      parseFromOriginal,
      updateServer,
      loadDataForLetVar
    }
  },
  data() {
    return {
      loadContData2: []
    }
  },
  method: {},
  mounted() {
    this.parseFromOriginal();
    this.loadDataForLetVar();
  }
}
</script>

<style scoped>

</style>
