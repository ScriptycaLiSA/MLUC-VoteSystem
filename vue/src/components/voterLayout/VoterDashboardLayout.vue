<template>
  <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="https://www.dmmmsu.edu.ph/wp-content/uploads/2020/01/DMMMSU-Logo-white-small.png"
                 alt="DMMMSULogo"/>
          </div>
          <div class="hidden md:block">

          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <Menu as="div" class="ml-3 relative">
              <div>
                <MenuButton
                  class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                  <span class="sr-only">Open user menu</span>
                </MenuButton>
              </div>
              <transition enter-active-class="transition ease-out duration-100"
                          enter-from-class="transform opacity-0 scale-95"
                          enter-to-class="transform opacity-100 scale-100"
                          leave-active-class="transition ease-in duration-75"
                          leave-from-class="transform opacity-100 scale-100"
                          leave-to-class="transform opacity-0 scale-95">
                <MenuItems
                  class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <MenuItem v-slot="{ active }">
                    <a @click="logout()" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Logout</a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
        <div class="-mr-2 lg:hidden xl:hidden 2xl:hidden">
          <!-- Mobile menu button -->
          <DisclosureButton
            class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">Open main menu</span>
            <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true"/>
            <XIcon v-else class="block h-6 w-6" aria-hidden="true"/>
          </DisclosureButton>
        </div>
      </div>
    </div>

    <DisclosurePanel class="lg:hidden xl:hidden 2xl:hidden">
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <router-link v-for="item in navigation" :key="item.name" as="a" :to="item.to"
                     active-class="bg-gray-900 text-white"
                     :class="[this.$route.name === item.to.name ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']">
          {{ item.name }}
        </router-link>
      </div>
      <div class="pt-4 pb-3 border-t border-gray-700">
        <div class="flex items-center px-5">
          <div class="flex-auto grow-0">
          </div>
          <div class="flex-auto">
            <div class="text-base font-medium leading-none text-white">{{user.idNum}}</div>
            <div class="text-sm font-medium leading-none text-gray-400">{{user.fname}} {{user.lname}}</div>
            <div class="text-sm font-medium leading-none text-gray-400">{{user.email}}</div>
          </div>
        </div>
        <DisclosureButton
          as="a"
          @click="logout()"
          class="
            block
            px-3
            py-2
            rounded-md
            text-base
            font-medium
            text-gray-400
            hover:text-white hover:bg-gray-400 cursor-pointer
          ">Log-out
        </DisclosureButton>
      </div>
    </DisclosurePanel>
  </Disclosure>
  <!-- sidenavlayout -->
  <VoterSideNavLayout/>
</template>

<script>

import {Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {BellIcon, LogoutIcon, MenuIcon, XIcon} from '@heroicons/vue/outline'
import {useStore} from 'vuex'
import {computed} from 'vue'
import {useRouter} from 'vue-router';
import VoterSideNavLayout from "./VoterSideNavLayout.vue";
import store from '../../store'
import router from "../../router";

function getVoterData() {
  this.loading = true

  store.dispatch('getVoterSession')
    .then((response) => {
      this.user.fname = response.fname
      this.user.lname = response.lname
      this.user.idNum = response.idNum
      this.user.email = response.email
      this.user.college = response.college_init

      this.loading = false
    }).catch((error) => {
  })
}

const navigation = [
  {name: 'Leaderboard', to: {name: 'VoterLeaderboardTally'}, current: false}
]

function logout() {
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
  name: 'VoterDashboardLayout',
  components: {
    Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems,
    BellIcon, LogoutIcon, MenuIcon, XIcon,
    computed,
    VoterSideNavLayout,
    store
  },
  setup(){
    return{
      getVoterData,
      logout,
      navigation
    }
  },
  data(){
    return{
      user: []
    }
  },
  mounted(){
    this.getVoterData()
  }
}
</script>

<style scoped>

</style>
