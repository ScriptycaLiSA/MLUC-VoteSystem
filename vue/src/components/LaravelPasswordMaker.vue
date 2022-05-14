<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://www.dmmmsu.edu.ph/wp-content/uploads/2019/06/DMMMSU-Logo-Final.png"
             alt="Workflow"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">TOOL FOR ACCOUNT CREATION</h2>
      </div>
      <form class="mt-8 space-y-6 gap-2" @submit="register">
        <input type="hidden" name="remember" value="true"/>
        <div class="rounded-md shadow-sm -space-y-px grid gap-2">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input v-model="userRegister.email" id="email-address" name="email" type="email" autoComplete="email" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Email address"/>
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input v-model="userRegister.password" id="password" name="password" type="password" autoComplete="current-password" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Password"/>
          </div>
          <div>
            <label for="last-name" class="sr-only">Email address</label>
            <input v-model="userRegister.name" id="last-name" name="last-name" type="text" autoComplete="none" required=""
                   class="uppercase appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Full Name"/>
          </div>

          <div>
            <label for="role" class="sr-only">Email address</label>
            <input v-model="userRegister.role" id="role" name="role" type="text" autoComplete="none" required=""
                   class="lowercase appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Please type 'superadmin' or 'admin'"/>
          </div>
        </div>
        <div>
          <button type="submit"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
            CREATE
          </button>
        </div>
      </form>
    </div>
  </div>
  </div>
</template>

<script setup>
import {LockClosedIcon} from '@heroicons/vue/solid'
import store from '../store'
import {useRouter} from 'vue-router';
import {ref} from 'vue'

const router = useRouter();
const loading = ref(false)

const userRegister  = {
  name: '',
  email: '',
  password: '',
  role: '',
}

function register(ev){
  ev.preventDefault();
  loading.value = true

  store.dispatch('register', userRegister)
    .then((response)=>{
      alert(response.success)
      loading.value = false
    }).catch((error)=>{
      alert('Something went wrong. Please try again later!')
  });
}

</script>

<style scoped>
#axiosForm { /* Components Root Element ID */
  position: relative;
}

.loader { /* Loader Div Class */
  position: absolute;
  top: 0px;
  right: 0px;
  width: 100%;
  height: 100%;
  background-color: #eceaea;
  background-image: url('../assets/assets.gif');
  background-size: 50px;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 10000000;
  opacity: 0.6;
}
</style>
