<template>
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img src="https://www.dmmmsu.edu.ph/wp-content/uploads/2020/01/DMMMSU-Logo-white-small.png" alt="dmmmsu_logo"
             class="mx-auto h-40 w-auto">
      </div>
     <Warning v-if="errorMsg">
       {{errorMsg}}
       <span
         @click="errorMsg=''"
         class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
         <svg
           xmlns="http://www.w3.org/2000/svg"
           class="h-6 w-6"
           fill="none"
           viewBox="0 0 24 24"
           stroke="currentColor"
           >
           <path
             stroke-linecap="round"
             stroke-linejoin="round"
             stroke-width="2"
             d="M6 18L18 6M6 6l12 12"/>
         </svg>
       </span>
     </Warning>
      <div class="max-w-sm mx-auto md:max-w-lg rounded-lg shadow-slate-700 shadow-2xl md:h-80 px-14">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">DMMMSU Voting Portal</h2>
        <p class="mt-6 text-center text-md font-normal text-gray-900">Signing in as Administrator</p>

        <form class="mt-8 space-y-6" @submit.prevent="adminLogin">
          <input type="hidden" name="remember" value="true"/>
          <div class="rounded-md shadow-sm -space-y-px">
            <div>
              <label for="email" class="sr-only">Username</label>
              <input v-model="acctLogin.email" id="email" name="email" type="email" autocomplete="email" required=""
                     class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                     placeholder="Email"/>
            </div>
            <div>
              <label for="password" class="sr-only">Password</label>
              <input v-model="acctLogin.password" id="password" name="password" type="password"
                     autocomplete="current-password" required=""
                     class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                     placeholder="Password"/>
            </div>
          </div>

          <div>
            <button
              :disabled="loading"
              type="submit"
              class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              :class="{'cursor-not-allowed': loading, 'hover:bg-indigo-500': loading}">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                   stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
              </svg>
            </span>
              <svg v-if="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                   fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              Sign in
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="my-4">
    <p>Signing in but not working?
      <router-link :to="{name: 'VoterLogin'}" class="font-medium text-black font-bold hover:text-blue-500">Click
        here
      </router-link>
      to redirect in Voter's Login
    </p>
  </div>
</template>
<script setup>
import store from '../store'
import {useRouter} from 'vue-router';
import {ref} from 'vue';
import Warning from "../components/Warning.vue";

const router = useRouter();

const acctLogin = {
  email: '',
  password: ''
}

const loading = ref(false);
let errorMsg = ref("");

function adminLogin(ev) {
  ev.preventDefault();

  loading.value = true;

  store.dispatch('login', acctLogin)
    .then(() => {
      alert('You have successfully logged in. Redirecting...')
      loading.value = false;
      router.push({
        name: 'Dashboard'
      });
    })
    .catch((err) => {
      loading.value = false;
      if (err.response.status === 422) {
        errorMsg.value = err.response.data.errors
      }
    })
}
</script>

<style scoped>

</style>
