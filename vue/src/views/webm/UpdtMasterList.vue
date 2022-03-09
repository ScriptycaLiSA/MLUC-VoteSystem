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
        <div class="grid grid-cols-2 items-center bg-amber-50 shadow-xl">
          <div class="flex-grow px-5 uppercase">
            <p>getting data from server</p>
          </div>
          <div class="">
            <img class="animate-spin h-10 w-10 px-2 py-2" src="https://www.svgrepo.com/show/376217/spinner.svg" alt="stevensupot"/>
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
