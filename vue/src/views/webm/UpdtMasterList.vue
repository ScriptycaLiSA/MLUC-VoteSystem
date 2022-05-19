<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl px-3 min-h-screen">
      <div class="font-bold text-5xl py-3">
        <p>MASTER LIST UPDATE</p>
      </div>
      <div
        class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-3 items-center">
        <div v-if="mstrLoad" class="flex justify-center text-black">
          LOADING...
        </div>
        <div v-else
             class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8" v-for="(data, id) in mstr_status"
             :key="id">
          <table class="min-w-full divide-y divide-gray-200 shadow-xl">
            <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-center text-xl font-medium text-gray-500 uppercase tracking-wider">
                {{ data.eventName }}:
              </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-2xl font-bold text-gray-900">{{ data.value }}</div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!--File processing area -->
      <div class="grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-2 items-center py-2">

        <Warning v-if="status">
          {{ success }}
          <span
            @click="success=''"
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
        <!--btn-->
        <div>
          <h1 class="text-2xl pr-20 py-6">Step 1:</h1>
          <button
            class="uppercase flex-auto mx-10 block text-white bg-slate-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            @click="downloadMasterListFile">Download the Master List File Here!
          </button>
          <h1 class="text-2xl pr-20 py-6">Step 2:</h1>
          <div>
            <div>
              <form @submit.prevent="updateServer" enctype="multipart/form-data">
                <div class="mb-3">
                  <input
                    class="form-control
                block
                w-full
                px-2
                py-1
                text-sm
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="formFileSm"
                    type="file"
                    v-on:change="onChange"
                  >
                </div>
                <button
                  :disabled="loadingUpdt"
                  type="submit"
                  class="uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                  <svg v-if="loadingUpdt" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                       xmlns="http://www.w3.org/2000/svg"
                       fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  update database server (system db)
                </button>
              </form>
            </div>
          </div>
          <h1 class="text-2xl pr-20 py-6">Archive Data</h1>
          <p class="text-black text-sm">After the election, please upload the file to archive the data into storage</p>
          <div>
            <div>
              <form @submit="updateServer2" enctype="multipart/form-data">
                <div class="mb-3">
                  <input
                    class="form-control
                block
                w-full
                px-2
                py-1
                text-sm
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="archiveData"
                    type="file"
                    v-on:change="onChange"
                  >
                </div>
                <button
                  :disabled="loadingUpdt"
                  type="submit"
                  class="uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                  <svg v-if="loadingUpdt" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                       xmlns="http://www.w3.org/2000/svg"
                       fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                    archive this file
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {ref} from 'vue'
import store from '../../store'
import {computed} from "vue";
import Warning from "../../components/Warning.vue";

const loadingUpdt = ref(false);
const mstrLoad = computed(() => store.state.a.tempStudentsRecordHold.loading);
let systemPushServer = [];
const bodyFormData = new FormData();
let status = ref("");

function parseFromOriginal() {
  store.dispatch('getAllRecordsSource')
    .then((response) => {
      this.loadContData2 = response.students;

      this.loadContData2.map(function (obj, i) {
        systemPushServer.push(obj);
      })
    })
    .catch((error) => {
      console.log(error);
    })
  this.loading = true;
  store.dispatch('getMstrDash')
    .then((response) => {
      this.mstr_status = response.title;
      this.loading = false;
    })
}

//making a function to compile systemPushServer into a json file
function downloadMasterListFile() {

  let json = systemPushServer;
  let fields = Object.keys(json[0])
  let replacer = function (key, value) {
    return value === null ? '' : value
  }
  let csv = json.map(function (row) {
    return fields.map(function (fieldName) {
      return JSON.stringify(row[fieldName], replacer)
    }).join(',')
  })
  csv.unshift(fields.join(','))
  csv = csv.join('\r\n');

  let hiddenElement = document.createElement('a');
  hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
  hiddenElement.target = '_blank';
  hiddenElement.download = 'downloadMasterList.csv';
  hiddenElement.click();
}

function updateServer() {
  loadingUpdt.value = true;
  let data = new FormData();
  data.append('file', this.file);

  store.dispatch('systemRecordUpdate', data)
    .then(function (res) {
      alert('The file has been uploaded')
      loadingUpdt.value = false;
      window.location.reload()
    })
    .catch((error) => {
      alert('Please check the file size of your file.')
      loadingUpdt.value = false;
    })
}

function updateServer2(ev) {
  ev.preventDefault();

  this.loading = true
  let data = new FormData();
  data.append('file', this.file);

  store.dispatch('systemRecordUpdate2', data)
    .then(function (res) {
      alert('The file has been archived!')
      window.location.reload()
    })
    .catch((error) => {
      this.loading = false
    })
}

function onChange(e) {
  this.file = e.target.files[0];
}

export default {
  name: "UpdtMasterList",
  components: {Warning},
  setup() {
    return {
      loadingUpdt,
      parseFromOriginal,
      updateServer,
      systemPushServer,
      bodyFormData,
      mstrLoad,
      downloadMasterListFile,
      onChange,
      status,
      updateServer2
    }
  },
  data() {
    return {
      loadContData2: [],
      mstr_status: [],
      name: '',
      file: '',
      loading: false,
      success: false,
      error: false,
      errorMsg: ''
    }
  },
  method: {},
  mounted() {
    this.parseFromOriginal();
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
}
</style>
