<template>
  <main>
    <div class="flex py-2 ">
      <h1 class="dont-mono font-semi-bold text-4xl font-normal leading-normal mt-0 mb-2 text-blueGray-800">Create Candidate</h1>
    </div>
    <div class="flex-1 px-24">
      <form class="w-full max-w-lg">
        <div class="flex-wrap -mx-2 mb-2">
          <div class="max-w-2xl">
            <div class="m-1">
              <div class="flex items-center justify-center w-full">
                <label
                  class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                  <div class="flex flex-col items-center justify-center pt-7">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                      Upload Image</p>
                  </div>
                  <input type="file" class="opacity-0" />
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap -mx-4 mb-6">
          <div class="w-full md:w-1/2 flex-wrap px-0.1 ">
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-Id-Number" type="text" placeholder="Enter ID Number:" required>
          </div>
          <div class="w-full md:w-1/3 px-4">
            <button type="button" class="text-gray-900 bg-white w-40 border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-800">Find ID</button>
          </div>
          <div class="w-full md:w-1/2 px-0.1">
            <input class="appearance-none block min-w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-firstname" type="text" placeholder="Enter Firstname:" required>
          </div>
          <div class="w-full md:w-1/2 px-0.5">
            <input class="appearance-none block min-w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-MI" type="text" placeholder="Enter M.I:" required>
          </div>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-lastname" type="text" placeholder="Enter Lastname:" required>
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
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-Position">
            Running Position
          </label>
          <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-grey-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-Position">
            <option>SBO Mayor</option>
            <option>SBO Vice-Mayor</option>
            <option>Secretary</option>
            <option>Treasurer</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

          </div>
          <div class="flex justify-center w-full ">
            <div class=" mb-4 md:w-96">
              <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="Portfolio" rows="3" placeholder="Your Portfolio"></textarea>
            </div>
          </div>
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
  name: "Candidates"
}
</script>

<style scoped>

</style>
