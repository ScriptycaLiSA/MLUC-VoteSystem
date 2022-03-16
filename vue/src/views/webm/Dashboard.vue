<template>
  <div class="bg-slate-100 shadow-xl min-h-screen">
    <div class="flex font-bold pl-2 text-5xl">
      <p>DASHBOARD</p>
    </div>

    <div class="grid grid-cols-1 2xl:grid-cols-2 px-2 py-4">
      <div class="bg-slate-100 px-2">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex items-right"
               for="selectCollege">
          Select College:
        </label>
        <div class="items-right">
          <select
            class="border border-gray-300 rounded-full text-gray-600 h-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
            id="selectCollege">
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
        </div>

        <label class="mt-10 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 flex items-right"
               for="dataTable">
          showing the data voting results from current voting event:
        </label>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-2">
          <div id="dataTable" class="flex w-full mb-8 overflow-hidden rounded-lg shadow-xl my-4">
            <div class="w-full overflow-x-auto">
              <table class="w-full flex-auto">
                <thead>
                <tr
                  class="text-xs font-medium tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-gray-600">
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Position?</th>
                  <th class="px-4 py-3">Vote counts</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full"
                             src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260"
                             alt="" loading="lazy"/>
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold text-black">Sufyan</p>
                        <p class="text-xs text-gray-600">Developer</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs border">
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> position_name </span>
                  </td>
                  <td class="px-4 py-3 text-sm border font-bold text-2xl">64</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-1 md:grid-cols-1 items-center">
          <div class="flex flex-cols">
            <button
              class="flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="button" data-modal-toggle="defaultModal">
              PRINT RESULTS
            </button>
            <button
              class="flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="button" data-modal-toggle="defaultModal">
              SEND THE RESULTS
            </button>
          </div>
        </div>
      </div>
      <!-- chart here -->
      <div class="py-4">
        <ViewStats/>
      </div>
    </div>
  </div>
</template>

<script>
import DashModal from './toolComponents/dashModal.vue';
import ViewStats from "./toolComponents/ChartDoughnut.vue";

export default {
  name: "Dashboard",
  components: {
    DashModal,
    ViewStats
  }
}
</script>

<style scoped>

</style>
