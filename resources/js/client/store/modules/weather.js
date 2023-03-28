import axios from 'axios';
import util from "./utilites";

const BASE_WEATHER_LINK = '/api/weather'

let state = {

}

const getters = {

}

const actions = {
    async getAllWeatherLocations(context){
        let link = BASE_WEATHER_LINK+"/locations"
        let method = 'GET'

        let _axios = util.makeAxiosFactory(link, method)

        return _axios.then((response) => {
            let dataObject = response.data
            return Promise.resolve(dataObject)
        }).catch(err => {
            return Promise.reject(err)
        })
    },
    async findWeatherLocation(context, location){
        let link = BASE_WEATHER_LINK+"/location"
        let method = 'POST'
        let data = {
            location: location
        }

        let _axios = util.makeAxiosFactory(link, method, data)

        return _axios.then((response) => {
            let dataObject = response.data
            return Promise.resolve(dataObject)
        }).catch(err => {
            return Promise.reject(err)
        })
    },
    async getWeatherByRegionId(context, regionId){
        let link = BASE_WEATHER_LINK+`/${regionId}`
        let method = 'GET'

        let _axios = util.makeAxiosFactory(link, method)

        return _axios.then((response) => {
            let dataObject = response.data
            return Promise.resolve(dataObject)
        }).catch(err => {
            return Promise.reject(err)
        })
    },

}

const mutations = {

}

const weatherModule = {
    state,
    mutations,
    actions,
    getters
}
export default weatherModule;
