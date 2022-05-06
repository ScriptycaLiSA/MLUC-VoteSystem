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
              <img src="https://upload.wikimedia.org/wikipedia/en/d/d2/La_Union_State_University.png" alt=""
                   class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
              <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">%VoterName%</h5>
              <span class="hidden text-gray-400 lg:block uppercase">%V_Id%</span>
              <span class="hidden text-gray-400 lg:block lowercase">%email%</span>
            </div>
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
      <div class="xl:mx-6 xl:my-6 2xl:md-8">
        <Warning v-if="error">
          {{errorMsg}}
        </Warning>
        <!-- children view from /router/index.js -->
        <router-view v-slot="{ Component }">
          <transition name="fade" mode="out-in">
            <component :is="Component" />
          </transition>
        </router-view>
      </div>
    </div>
  </div>
</template>
<script>
import Warning from "../Warning.vue";
let errorMsg = []
export default{
  name:'VoterSdeNavLayout',
  components: {
    Warning,
    errorMsg
  },
  data(){
    return{
      error : false,
      loading : false
    }
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
