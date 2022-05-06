<template>
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-24 w-auto" src="https://www.dmmmsu.edu.ph/wp-content/uploads/2019/06/DMMMSU-Logo-Final.png"
             alt="Workflow"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">VOTER ACCOUNT UTILITY</h2>
      </div>
      <form class="mt-8 space-y-6 gap-2" @submit="register">
        <input type="hidden" name="remember" value="true"/>
        <div class="rounded-md shadow-sm -space-y-px grid gap-2">
          <div>
            <label for="id_num" class="sr-only">ID Number:</label>
            <input  id="id_num" name="ID_num" type="number" autoComplete="email" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="ID Number:"/>
          </div>
          <div>
            <label for="In_Email" class="sr-only">Email:</label>
            <input id="In_Email" name="Email" type="email" autoComplete="current-email" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Email:"/>
          </div>
          <div>
            <label for="Ent_Pass" class="sr-only">Password:</label>
            <input id="Ent_Pass" name="password" type="password" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Password:"/>
            <div class="mb-2"></div>
            <select class="appearance-none rounded-none relative block w-full  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    id="grid-elections">
              <option value="" class="">-- Select College --</option>
              <option>

              </option>
            </select>
          </div>
        </div>
        <div>
          <button type="submit"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
            Register Account
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "VoterCreate"
}
</script>

<style scoped>

</style>
