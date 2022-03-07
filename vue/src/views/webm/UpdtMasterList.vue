<template>
  <div class="bg-slate-100 shadow-xl px-3 min-h-screen">
    <div class="font-bold text-5xl py-3">
      <p>MASTER LIST UPDATE</p>
    </div>

    <suspense>
      <template #default>
        <DataParse/>
      </template>
      <template #fallback>
        <div class="bg-amber-50 shadow-xl flex flex-cols flex text-2xl px-5 uppercase grid grid-cols-1">
          getting data from server
          <div class="-items-center">
            <img class="animate-spin h-20 w-20 px-2 py-2" src="https://www.svgrepo.com/show/73917/spin.svg"/>
          </div>
        </div>
      </template>
    </suspense>
  </div>
</template>

<script>
import DataParse from './apiCalls/MasterLoad.vue'

export default {
  name: "UpdtMasterList",
  components: {
    DataParse
  }
}
</script>

<style scoped>

</style>
