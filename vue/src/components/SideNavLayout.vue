<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="flex min-h-screen">
      <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
           class="fixed z-20 inset-0 bg-slate-200 opacity-50 transition-opacity lg:hidden"></div>
      <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
           class="fixed flex-none z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-slate-200 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">

        <div class="flex flex-row items-center justify-center mt-10">
          <div class="flex items-left">
            <div class="mt-8 text-center">
              <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="admin"
                   class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28" loading="eager">
              <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ user.name }}</h5>
              <span class="hidden text-gray-400 lg:block uppercase">{{ user.role }}</span>
              <span class="hidden text-gray-400 lg:block lowercase">{{ user.email }}</span>
            </div>
          </div>
        </div>

        <div class="items-left mt-2 md:items-right lg:items:right">
          <nav class="mt-10">
            <router-link :to="{name: 'Dashboard'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
              <span class="mx-3">Dashboard</span>
            </router-link>

            <div v-if="user.role === 'superadmin'">
              <router-link :to="{name: 'RegVoter'}"
                           class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
                <span class="mx-3">Manage Voter</span>
              </router-link>
            </div>

            <router-link :to="{name: 'CreateElec'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
              <span class="mx-3">Create Elections</span>
            </router-link>

            <router-link :to="{name: 'Colleges'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
              <span class="mx-3">Colleges</span>
            </router-link>

            <router-link :to="{name: 'MngCandidates'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
              <span class="mx-3">Manage Candidates</span>
            </router-link>

            <router-link :to="{name: 'MngPosition'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
              <span class="mx-3">Manage Position</span>
            </router-link>

            <router-link :to="{name: 'MngPartylist'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
              <span class="mx-3">Manage Partylist</span>
            </router-link>
          </nav>
        </div>
        <div class="flex items-center justify-right mt-2">
          <div v-if="user.role === 'superadmin'">
            <nav class="mt-6">
              <router-link :to="{name: 'UpdtMasterList'}"
                           class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
                <span class="mx-1">Update Master List</span>
              </router-link>
            </nav>
          </div>
        </div>
        <div
          class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-slate-600 to-cyan-400">
          <button @click="logout" class="px-4 py-3 flex items-center space-x-4 rounded-md text-white group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="group-hover:text-gray-700">Logout</span>
          </button>
        </div>
      </div>
      <div class="xl:mx-6 xl:my-6">
        <Warning v-if="error">
          {{ errorMsg }}
        </Warning>
        <!-- children view from /router/index.js -->
        <router-view v-slot="{ Component }">
          <transition name="fade" mode="out-in">
            <component :is="Component"/>
          </transition>
        </router-view>
      </div>
    </div>
  </div>
</template>

<script>
import store from '../store'
import router from "../router";
import Warning from "./Warning.vue";

let errorMsg = ''

function getMyImg(string) {
  return "http://localhost:8000/api/image_search/" + string
}

function getAdminData() {
  this.loading = true;
  store.dispatch('getSession')
    .then((response) => {
      this.user.name = response.name;
      this.user.role = response.role;
      this.user.email = response.email;
      this.user.image = response.image
      this.loading = false;
    })
    .catch((error) => {
      errorMsg = error.error
      this.loading = false;
      this.error = true;
    })
}

function logout() {
  this.loading = true

  store.dispatch('logout')
    .then(() => {
      router.push({
        name: 'AdminLogin'
      });

      alert('Successfully logged out!')
      this.loading = false
    });
}

export default {
  name: 'SideNavLayout',
  components: {
    Warning,
  },
  setup() {
    return {
      errorMsg,
      getAdminData,
      logout,
      getMyImg
    }
  },
  data() {
    return {
      user: [],
      loading: false,
      success: false,
      error: false,
    }
  },
  mounted() {
    this.getAdminData()
  }
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
  filter: alpha(opacity=60);
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}


.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
