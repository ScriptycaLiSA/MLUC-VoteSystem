<template>
  <div class="bg-slate-100 shadow-xl min-h-full px-10">
    <div class="flex py-5 px-5">
      <h1 class="font-bold text-5xl py-3 items-left">VOTES</h1>
    </div>
    <div class="flex">
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
    </div>

    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8" v-for="data in dataTable" :key="data.id">
        <table class="min-w-full divide-y divide-gray-200 shadow-xl">
          <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-center text-xl font-medium text-gray-500 uppercase tracking-wider">
              {{ data.head }}
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

  </div>
</template>

<script>
const dataTable = [
  {
    id: '1',
    head: 'TOTAL REGISTERED STUDENT VOTERS',
    counts: '458',
  },
  {
    id: '2',
    head: 'STUDENTS WHO DID NOTE VOTE YET',
    counts: '78',
  },
  {
    id: '3',
    head: 'STUDENTS WHO VOTED',
    counts: '445',
  },
]

export default {
  name: "Votes",
  setup() {
    return {
      dataTable
    }
  }
}
</script>

<style scoped>

</style>
