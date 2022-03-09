<template>
  <div class="bg-slate-100 shadow-xl min-h-screen min-w-full px-2">
    <div class="flex flex-cols font-bold text-5xl">
      <p>COLLEGES</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-2">
      <div class="bg-white-900 min-w-screen">
        <label for="table" class="font-semibold text-black md:hidden lg:hidden xl:hidden 2xl:hidden">Slide the table
          left to right</label>
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

                  <tr v-for="collegeStats in colleges" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-white">
                      {{ collegeStats.name }}
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-500 text-gray-900 whitespace-nowrap dark:text-gray-400">
                      {{ collegeStats.init }}
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

      <div class="px-2 py-2">
        <ViewStats/>
      </div>
    </div>
  </div>
</template>

<script>
import ViewStats from './toolComponents/ChartDoughnut.vue'

const colleges = [
  {
    name: 'College of Information Technology',
    init: 'CIT',
    registered: '12',
  },
  {
    name: 'College of Technical Education',
    init: 'CTED',
    registered: '132',
  },
  {
    name: 'College of Technology',
    init: 'COT',
    registered: '134',
  },
  {
    name: 'College of Engineering',
    init: 'COE',
    registered: '21',
  },
  {
    name: 'College of Management',
    init: 'COM',
    registered: '53',
  },
  {
    name: 'Institute of Criminal Justice Education',
    init: 'ICJE',
    registered: '43',
  },
  {
    name: 'College of Arts And Sciences',
    init: 'CAS',
    registered: '13',
  },
  {
    name: 'College of Arts And Law',
    init: 'CLAW',
    registered: '34',
  }]

export default {
  name: "Colleges",
  components: {
    ViewStats
  },
  setup() {
    return {
      colleges
    }
  }
}
</script>

<style scoped>

</style>
