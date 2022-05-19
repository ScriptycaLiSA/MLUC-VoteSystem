<template>
  <DoughnutChart :chart-data="data" :options="options"/>
</template>
<script>
import {ref,computed} from 'vue'
import {DoughnutChart} from 'vue-chart-3'
import {Chart, DoughnutController, ArcElement} from 'chart.js'
import store from '../../../store'

Chart.register(DoughnutController, ArcElement)
let dataValues = ref([])
let candidates = ref([])

let data = computed(() => ({
  labels: candidates.value,

  datasets: [
    {
      label: 'voter_counts',
      data: dataValues.value,
      backgroundColor: ['#859900','#d33682','#cb4b16']
    }
  ]
}))

let options = ref({
  plugins: {
    title: {
      text: 'Votes of Candidates'
    }
  }
})

function getChartData(){
  store.dispatch('renderChartLayout',)
    .then((response)=>{
      console.log(response)
    })
}

export default{
  name: 'DashboardChartDoughNut',
  components: {DoughnutChart},
  setup(){
    return{
      dataValues,
      data,
      candidates,
      options,
      getChartData
    }
  },
  mounted(){

  }
}
</script>
<style scoped>

</style>
