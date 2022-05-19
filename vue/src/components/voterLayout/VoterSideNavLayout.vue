<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="flex min-h-screen">
      <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
           class="fixed z-20 inset-0 bg-slate-200 opacity-50 transition-opacity lg:hidden"></div>
      <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
           class="fixed flex-none z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-slate-100 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">

        <div class="flex flex-row items-center justify-center mt-10">
          <div class="flex items-left">
            <div class="mt-8 text-center">
              <img src="https://www.dmmmsu.edu.ph/wp-content/uploads/2020/01/DMMMSU-Logo-white-small.png" alt=""
                   class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
              <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">{{ user.lname }}, {{ user.fname }} {{user.mname}}</h5>
              <span class="hidden text-gray-400 lg:block uppercase">{{ user.idNum }} | {{ user.college }}</span>
            </div>
          </div>
        </div>

        <div class="items-left mt-2 md:items-right lg:items:right">
          <nav class="mt-10">
            <router-link :to="{name: 'VoterLeaderboardTally'}"
                         class="relative px-4 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-[#1da1f2]">
              <span class="mx-3">Leaderboard</span>
            </router-link>
            <a @click="voterLogout" class="relative px-8 py-3 mx-2 my-2 flex items-center space-x-4 rounded-xl text-white bg-[#1da1f2]">
              <span class="text-white">Logout</span>
            </a>
          </nav>
        </div>
      </div>
      <div class="xl:mx-6 xl:my-6 2xl:md-8">
        <Warning v-if="error">
          {{ errorMsg.message }}
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
import Warning from "../Warning.vue";
import store from "../../store";
import router from "../../router";

let errorMsg = {
  message: ''
}

function getVoterData() {
  this.loading = true

  store.dispatch('getVoterSession')
    .then((response) => {
      this.user.fname = response.fname
      this.user.lname = response.lname
      this.user.mname = response.mname
      this.user.idNum = response.idNum
      this.user.college = response.college_init

      this.loading = false
    }).catch((error) => {
  })
}

function voterLogout() {
  this.loading = true

  store.dispatch('voterLogout')
    .then(() => {
      alert('You have successfully logged out. Redirecting...')
      this.loading = false

      router.push({
        name: 'VoterLogin'
      })
    }).catch((error) => {
    alert(error.error)
  })
}

export default {
  name: 'VoterSideNavLayout',
  components: {
    Warning,
  },
  setup() {
    return {
      getVoterData,
      voterLogout,
      errorMsg
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
  methods: {},
  mounted() {
    this.getVoterData()
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
  background-image: url('../../assets/assets.gif');
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
