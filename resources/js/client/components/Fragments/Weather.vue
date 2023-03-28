<template>
    <table
        v-if="table.length>0"
        class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">Время</th>
            <th scope="col">Характер погоды</th>
            <th scope="col">Температура<br>воздуха, °С</th>
            <th scope="col">Атмосферное<br>давление</th>
            <th scope="col">Ветер</th>
            <th scope="col">Осадки, мм</th>
            <th scope="col">Температура<br>по ощущениям, °С</th>
            <th scope="col">Температура<br>по ощущениям<br>на солнце, °С</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(item, index) in table">
            <td v-html="item.day[0].section.date"></td>
            <td>
               <ul>
                   <li v-for="day in item.day">{{day.time}}</li>
               </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.weather_type"></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.temperature"></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.pressure"></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.wind"></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.precipitation"></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.effective_temperature"></li>
                </ul>
            </td>
            <td>
                <ul>
                    <li v-for="day in item.day" v-html="day.section.effective_temperature"></li>
                </ul>
            </td>
        </tr>


        </tbody>
    </table>
    <p v-else>К сожалению нам не удалось установить погоду в данной локации :(</p>
</template>
<script>
export default  {
    props:["regionId"],
    data(){
      return {
          table:[],
      }
    },
    mounted() {
        this.getWeatherByRegionId()
    },
    methods:{
        getWeatherByRegionId(){
            this.$store.dispatch("getWeatherByRegionId", this.regionId).then(resp=>{
                this.table = resp
            }).catch(err=>{

            })
        }
    }
}
</script>
