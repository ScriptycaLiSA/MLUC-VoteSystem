<template>
  <main>
    <div class="flex py-5 ">
      <h1 class="dont-mono font-semi-bold text-4xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">Register Voter</h1>
    </div>
    <div class="flex-1 px-24">
      <form class="w-full max-w-lg">
        <div class="flex flex-wrap -mx-4 mb-6">
          <div class="w-full md:w-1/2 flex-wrap -mx-1 px-1 mb-6 md:mb-0">
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-Id-Number" type="text" placeholder="Enter ID Number:" required>
          </div>
          <div class="w-full md:w-1/3 px-4">
            <button type="button" class="text-gray-900 bg-white w-40 border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">Find ID</button>
          </div>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-firstname" type="text" placeholder="Enter Firstname:" required>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-MI" type="text" placeholder="Enter M.I:" required>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-lastname" type="text" placeholder="Enter Lastname:" required>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="email" placeholder="Enter Email:" required>
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
  </main>
</template>

<script>
export default {
  name: "RegVoter"
}
</script>

<style scoped>

</style>
