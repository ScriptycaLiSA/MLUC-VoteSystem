<template>
  <div id="axiosForm">
    <div class="loader" v-if="loading"></div>
  <div class="relative flex flex-left m-3">
    <router-link class="hover:bg-gray-400" :to="{name: 'VoterLogin'}">
      <ArrowCircleLeftIcon class="h-6 w-6"/>
      <p class="text-black"> BACK TO LOGIN</p>
    </router-link>
  </div>
  <div class="w-full ">
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
      <div v-for="(index, key) in candData" :key="key" class="mb-10 md:mb-8 bg-amber-200 rounded-xl">
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
        rounded-xl
      ">
          In Election: {{ index.elec_name }}
        </h2>

        <p class="max-w-screen-md mx-auto text-center text-gray-500 md:text-lg uppercase">
          These candidates is running for {{ index.college_init }} elections
        </p>
      <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 py-2">
        <div class="w-full bg-gray-300 rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
          <div class="w-full md:w-2/5 h-80">
            <img class="object-center object-cover w-full h-full rounded-3xl" :src="getImgInfo(candData[key].image)" alt="photo">
          </div>
          <div class="w-full md:w-3/5 text-left p-6 md:p-4 space-y-2">
            <p class="text-2xl text-white font-bold">Name: {{ index.cand_name }}</p>
            <p class="text-m text-white font-bold">College: {{index.coll_name}} | ({{ index.college_init }}) </p>
            <p class="text-base leading-relaxed text-gray-900 font-normal font-bold">Running for: {{index.pos_name}}</p>
            <p class="text-base leading-relaxed text-gray-900 font-normal font-bold">Partylist: {{index.party_name}}</p>
            <p class="text-base leading-relaxed text-gray-900 font-normal font-bold">Description:</p>
            <p class="text-base leading-relaxed text-gray-900 font-normal font-bold">{{index.description}}</p>
          </div>
        </div>
      </div>
      </div>
      <div class="items-center text-gray-900 font-extrabold text-3xl" v-if="error">BY MOMORI PUEDE NA!!!! No Voting Event as per today. Please try again later!</div>
    </section>
  </div>
  </div>
</template>
<script>
import {ArrowCircleLeftIcon} from '@heroicons/vue/outline'
import store from '../store'

let candData = []

function getCandidateInfo() {
  this.loading = true

  store.dispatch('getCandidateInfo')
    .then((response) => {this.error = false
      response.data.map((function (obj, i) {
        candData.push(obj)

      }))

    if(candData<1){this.error = true}
      this.loading = false

      candData = []
    })
    .catch((error) => {


        this.error = true
        this.loading = true

    })

}

function getImgInfo(string){


  if(candData.length <1){
    this.error = true
  }

    return "http://localhost:8000/api/image_search/" + string
  }

export default {
  name: 'Campaign',
  components: {
    ArrowCircleLeftIcon
  },
  setup() {
    return {
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
  methods: {},
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
