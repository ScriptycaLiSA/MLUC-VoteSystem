<template>
  <div
    class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-3 items-center">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8" v-for="data in loadContData2"
         :key="loadContData2.name">
      <table class="min-w-full divide-y divide-gray-200 shadow-xl">
        <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-center text-xl font-medium text-gray-500 uppercase tracking-wider">
            {{ data.name }}
          </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-2xl font-bold text-gray-900">{{ data.counts }}</div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="grid grid-cols-2 sm:grid-cols-1 md:grid-cols-1 items-center py-2">
    <div class="flex flex-cols">
      <button
        class="uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button" data-modal-toggle="defaultModal">
        refresh button
      </button>
      <button
        class="uppercase flex-auto mx-10 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button" data-modal-toggle="defaultModal">
        update server
      </button>
    </div>
  </div>
</template>
<script>
import {ref} from 'vue'
import ViewStat from '../toolComponents/ChartDoughnut.vue'

const loadContData = async () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve([
        {
          name: 'total data loaded',
          counts: '515'
        },
        {
          name: 'registered voters',
          counts: '782'
        },
        {
          name: 'not yet registered students',
          counts: '568'
        },
        {
          name: 'IQ ni Jansen',
          counts: 0
        }
      ])
    }, 2000)
  })
}

export default {
  components: {
    ViewStat
  },
  async setup() {
    const loadContData2 = ref(await loadContData())

    return {
      loadContData2,
    }
  },
}
</script>
<style scoped>

</style>
