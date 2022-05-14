<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="bg-slate-100 shadow-xl min-h-screen min-w-full px-2">
      <div class="flex flex-cols font-bold text-5xl">
        <p>COLLEGES</p>
      </div>

      <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-2">
        <div class="">
          <label for="table2" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
            left to right</label>
          <label class="font-semibold text-black">PRE-REGISTERED DATA</label>
          <div id="table2" class="flex flex-col px-4">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        college
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        college initial
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        PRE-REGISTERED VOTER
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(i, k) in preRegData" :key="k"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-white">
                        {{ i.college }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        {{ i.initials }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        {{ i.prereg }}
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white-900 min-w-screen">
          <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
            left to right</label>
          <label class="font-semibold text-black">REGISTERED DATA</label>
          <div id="table" class="flex flex-col px-4">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-md sm:rounded-lg">
                  <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        college
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        college initial
                      </th>
                      <th scope="col"
                          class="py-3 px-6 text-xs font-semibold tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        REGISTERED VOTER
                      </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(collegeStats, key) in collegesData" :key="key"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-white">
                        {{ collegeStats.coll_name }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        {{ collegeStats.college_init }}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                        {{ collegeStats.registered }}
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
import ViewStats from './toolComponents/ChartDoughnut.vue'
import store from "../../store";

let collegesData = []
let preRegData = []


export default {
  name: "Colleges",
  components: {
    ViewStats
  },
  setup() {
    return {
      collegesData,
      preRegData
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false
    }
  },
  methods: {
    getColleges() {
      this.loading = true

      store.dispatch('getCollegesSorted')
        .then((response) => {
          response.success1.map(function (obj, i) {
            preRegData.push(obj)
          })
          response.success.map(function (obj, i) {
            collegesData.push(obj)
          })

          this.loading = false

          collegesData = []
          preRegData =[]
        })
    }
  },
  mounted() {
    this.getColleges()
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

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
