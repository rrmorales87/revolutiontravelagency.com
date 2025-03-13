<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import { Chart } from 'highcharts-vue';
import { onMounted, ref } from "vue";
import { defineProps } from 'vue';
const props = defineProps(['chartLine']);
console.log("CHART",props.chartLine);
const serieLine = ref([]);
onMounted(()=>{
  serieLine.value = props.chartLine.map(v=>[v.day,v.total]);
  chartOptions.value.series = [{data:serieLine.value}];
  console.log(chartOptions.value);
})
const chartOptions = ref({
          chart: {
                type: 'line'
            },
            title: {
                text: 'Reservations'
            },
            xAxis: {
            title: {
                text: 'Date'
            },
            tickInterval: 1
            },
            yAxis: {
              title: {
                  text: 'Values'
              },
              tickInterval: 1
          },
          series: [{
            data:serieLine.value// sample data
          }]
      })
const chartOptionsPie = {
          chart: {
                type: 'pie'
            },
            title: {
                text: 'Fruit Consumption'
            },
            series: [{
              type:'pie',
              data:[['Samsung', 23],
              ['Apple', 18],
              
              ['Oppo*', 9],
              ['Vivo', 8],
              ['Others', 30]]
            }
              
            ]
      }
</script>

<template>
  <AdminLayout>
   <AdminHeaderContent :title="$t('Dashboard')"/>
      <div class="grid grid-cols-2 gap-5 p-5">
        <highcharts :options="chartOptions"></highcharts>
        <highcharts :options="chartOptionsPie"></highcharts>
      </div>

  </AdminLayout>
</template>

<style scoped lang="scss">

</style>