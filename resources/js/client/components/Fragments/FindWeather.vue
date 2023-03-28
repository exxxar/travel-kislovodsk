<template>
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-3">
                <input type="text"
                       v-model="location"
                       class="form-control"
                       placeholder="Название локации" aria-label="Название локации"
                       aria-describedby="button-weather-search">
                <button
                    @click="findLocation"
                    class="btn btn-outline-secondary"
                        type="button"
                        id="button-weather-search">Найти</button>
            </div>
        </div>
        <div class="col-12" v-if="weather_locations.length>0">
            <div class="list-group">
                <a href="#select-weather"
                   @click="setLocation(item)"
                   v-for="item in weather_locations"
                   class="list-group-item list-group-item-action">{{item.title || 'Не указан'}}</a>
            </div>
        </div>
        <div class="col-12">
            <weather-component
                v-if="pogoda_klimat_id"
                :region-id="pogoda_klimat_id"/>
            <p v-else>Сперва укажите локацию</p>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        search: {
            type: String,
            default: null
        },

    },
    data(){
        return {
            weather_locations: [],
            location: null,
            pogoda_klimat_id:null
        }
    },
    watch:{
      'location':function (oldVal, newVal){
          this.findLocation()
      }
    },
    mounted() {
      if (this.search)
          this.location = this.search
    },
    methods: {
        findLocation() {
            this.weather_locations = []
            this.$store.dispatch("findWeatherLocation", this.location).then(resp => {
                this.weather_locations = resp
            }).catch(err => {
                this.weather_locations = []
            })

        },
        setLocation(item) {
            let id = item.id || null
            let location = item.title || null

            this.pogoda_klimat_id = null
            this.location = location
            setTimeout(() => {
                this.pogoda_klimat_id= id
            }, 1000)

        },
    }
}
</script>
