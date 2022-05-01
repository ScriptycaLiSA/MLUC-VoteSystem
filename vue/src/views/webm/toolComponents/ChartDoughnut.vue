<template>
  <DoughnutChart :chart-data="data" :options="options"/>
</template>
<script setup>
import {ref, computed} from 'vue'
import {DoughnutChart} from 'vue-chart-3'
import {Chart, DoughnutController, ArcElement} from 'chart.js'

Chart.register(DoughnutController, ArcElement)
const dataValues = ref([
 20,25,35
])

const data = computed(() => ({
  labels: ['jansen','gago','supot'],

  datasets: [
    {
      label: 'voter_counts',
      data: dataValues.value,
      backgroundColor: ['#859900','#d33682','#cb4b16']
    }
  ]
}))

const options = ref({
  plugins: {
    title: {
      text: 'Jansen'
    }
  }
})

</script>
<style scoped>

</style>
