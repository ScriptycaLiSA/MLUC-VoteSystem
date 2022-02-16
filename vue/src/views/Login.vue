<template><div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img src="https://www.dmmmsu.edu.ph/wp-content/uploads/2019/06/DMMMSU-Logo-Final.png" alt="dmmmsu_logo" class="mx-auto h-40 w-auto">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">IMLUC VOTANTE</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        {{ ' ' }}

      </p>
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
      <input type="hidden" name="remember" value="true" />
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Student ID</label>
          <input id="email-address" name="email" type="email" autocomplete="email" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="ID Number" />
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password" />
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
          <select class="rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:drop-shadow-lg focus:outline-none appearance-none ">
            <option>Choose Account Type</option>
            <option>Voter</option>
            <option>Admin</option>
          </select>
        </div>

      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
            </span>
          Sign in
        </button>
      </div>
      <div class="">
        <p>Checking Elections?
          <router-link :to="{name: 'Campaign'}" class="font-medium text-black font-bold hover:text-blue-500">Click here</router-link> to go on Campaign Page
        </p>
      </div>
    </form>
  </div>
</div>
</template>

<script>
  export default {
    name: "Login"
  }
</script>

<style scoped>

</style>
