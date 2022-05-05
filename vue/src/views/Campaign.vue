<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
    <div class="relative flex flex-left m-3">
      <router-link class="hover:bg-gray-400" :to="{name: 'VoterLogin'}">
        <ArrowCircleLeftIcon class="h-6 w-6"/>
        <p class="text-black"> BACK TO LOGIN</p>
      </router-link>
    </div>
    <div v-for="(index, key) in candHeader" :key="key" class="max-w-screen-xl px-4 mx-auto md:px-8 mb-2">
      <div class="mb-10 md:mb-16 bg-amber-200">
        <h2
          class="
        mb-4
        text-2xl
        font-bold
        text-center text-gray-800
        lg:text-3xl
        md:mb-6
        bg-gray-200
        uppercase
      ">
          Election name: {{ index.elec_name }}
        </h2>

        <p class="max-w-screen-md mx-auto text-center text-gray-500 md:text-lg uppercase">
          These candidates is running for {{ index.college_init }} elections
        </p>
      </div>

      <div class="grid gap-8 md:grid-cols-3">
        <div v-for="(i, keyCnt) of candData" :key="keyCnt">
          <div class="p-4 shadow" v-if="candData[keyCnt].election_id === candHeader[key].id">
            <div class="h-48 mb-2 overflow-hidden rounded-lg shadow-lg md:h-80">
              <img
                :src="getImgInfo(candData[keyCnt].image)"
                alt="Image"
                class="object-cover object-center w-full h-full"
              />
            </div>

            <div class="flex flex-col items-center justify-center">

              <div class="font-bold text-indigo-500 md:text-lg">
                <label class="block text-m font-bold">
                  Name: {{ i.cand_name }}
                </label>
              </div>
              <div class="hidden">{{i.image}}</div>
              <div class="font-bold text-black-500 md:text-lg">
                <label class="block text-sm font-bold">
                  College: {{ i.college_init }} | Running for: {{ i.pos_name }}
                </label>
              </div>
              <p class="mb-3 text-sm text-gray-500 md:text-base md:mb-4">
                Description: {{ i.description }}
              </p>


              <div class="flex">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {ArrowCircleLeftIcon} from '@heroicons/vue/outline'
import store from '../store'

let candHeader = []
let candData = []

function getCandidateInfo(imgCnt) {
  this.loading = true

  store.dispatch('getCandidateInfo')
    .then((response) => {
      response.title.map((function (obj, i) {
        candHeader.push(obj)
      }))
      response.data.map((function (obj, i) {
        candData.push(obj)
      }))
      this.loading = false

      candHeader = []
      candData = []
    })
    .catch((error) => {
      this.error = true
    })

}

function getImgInfo(string){
  console.log(string)
  return "http://localhost:8000/api/image_search/"+string
}

export default {
  name: 'Campaign',
  components: {
    ArrowCircleLeftIcon
  },
  setup() {
    return {
      candHeader,
      candData,
      getCandidateInfo,
      getImgInfo
    }
  },
  data() {
    return {
      loading: false,
      success: false,
      error: false,
      images: [],
      imagePreview: null,
    }
  },
  method: {},
  mounted() {
    this.getCandidateInfo()
    this.getImgInfo()
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
</style>
