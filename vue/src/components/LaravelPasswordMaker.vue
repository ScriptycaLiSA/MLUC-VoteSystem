<template>
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
            <label for="first-name" class="sr-only">Email address</label>
            <input v-model="userRegister.fname" id="first-name" name="first-name" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="First Name"/>
          </div>
          <div>
            <label for="last-name" class="sr-only">Email address</label>
            <input v-model="userRegister.lname" id="last-name" name="last-name" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Last Name"/>
          </div>
          <div>
            <label for="imageUrl" class="sr-only">Email address</label>
            <input v-model="userRegister.imageUrl" id="imageUrl" name="imageUrl" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Image URL"/>
          </div>
          <div>
            <label for="role" class="sr-only">Email address</label>
            <input v-model="userRegister.role" id="role" name="role" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Role"/>
          </div>
          <div>
            <label for="organization" class="sr-only">Email address</label>
            <input v-model="userRegister.organization" id="organization" name="organization" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Organization"/>
          </div>
          <div>
            <label for="can-mng-students" class="sr-only">Email address</label>
            <input v-model="userRegister.canMngStd" id="can-mng-students" name="can-mng-students" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Can Manage Students? true and false answers only (admin permissions)"/>
          </div>
          <div>
            <label for="can-mng-candidates" class="sr-only">Email address</label>
            <input v-model="userRegister.canMngCand" id="can-mng-candidates" name="can-mng-students" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Can Manage Candidates? true and false answers only (admin permissions)"/>
          </div>
          <div>
            <label for="can-mng-real-time" class="sr-only">Email address</label>
            <input v-model="userRegister.canMngRtt" id="can-mng-real-time" name="can-mng-real-time" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Can Manage Real Time Tally? true and false answers only (admin permissions)"/>
          </div>
          <div>
            <label for="can-view-voters-turn-out" class="sr-only">Email address</label>
            <input v-model="userRegister.canVvto" id="can-view-voters-turn-out" name="can-view-voters-turn-out" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Can View Voters Turn Out? true and false answers only (admin permissions)"/>
          </div>
          <div>
            <label for="real-time-notif" class="sr-only">Email address</label>
            <input v-model="userRegister.canMngRtmt" id="real-time-notif" name="real-time-notif" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Real Time Notification? true and false answers only (admin permissions)"/>
          </div>
          <div>
            <label for="can-mng-users" class="sr-only">Email address</label>
            <input v-model="userRegister.canMngUsers" id="can-mng-users" name="can-mng-users" type="text" autoComplete="none" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Can Manage Users? true and false answers only (admin permissions)"/>
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
</template>

<script setup>
import {LockClosedIcon} from '@heroicons/vue/solid'
import store from '../store'
import {useRouter} from 'vue-router';

const router = useRouter();

const userRegister  = {
  fname: '',
  lname: '',
  imageUrl: '',
  email: '',
  password: '',
  role: '',
  organization: '',
  canMngStd: '',
  canMngCand: '',
  canMngRtt: '',
  canVvto: '',
  canMngRtmt: '',
  canMngUsers: '',
}

function register(ev){
  ev.preventDefault();

  store.dispatch('register', userRegister);
}

</script>
