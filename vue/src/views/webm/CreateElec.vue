<template>
  <main class=" px-3 min-h-screen ">
    <div class="font-bold text-5xl py-4">
      <p>CREATE ELECTIONS</p>
    </div>

    <div class="py-4 px-4 min-w-screen">
      <form class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-4 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-TElction">
            Election Title:
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-TElction" type="text" placeholder="Enter Title:" required>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-College">
            Select College:
          </label>
          <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-College">
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
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-NumPos">
            Enter Number of Positions:
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-NumPos" type="number" placeholder="Positions:" required>
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-NamePos">
            Select Positions:
          </label>
          <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-NamePos">
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
        <div class="flex flex-wrap -mx-4 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Enter Password:
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-password" type="password" placeholder="EnterPassword:">
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <button type="button" class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
              Register voter
            </button>
          </div>
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <button type="button" class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 mr-2 mb-2">
              Update
            </button>
          </div>
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
          </div>
        </div>
      </form>
    </div>

    <div>
      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
              <table class="min-w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Name
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Color
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Category
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Price
                  </th>
                  <th scope="col" class="relative py-3 px-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
                </thead>
                <tbody>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Sliver
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Laptop
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    $2999
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  </td>
                </tr>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple Imac 27"
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    White
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Desktop Pc
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    $1999
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                  </td>
                </tr>

                <tr class="bg-white dark:bg-gray-800">
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple Magic Mouse 2
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    White
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    Accessories
                  </td>
                  <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                    $99
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

  </main>
</template>

<script>
export default {
  name: "CreateElec"
}
</script>

<style scoped>

</style>
