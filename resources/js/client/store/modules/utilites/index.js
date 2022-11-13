import axios from "axios";

export default {
    async makeAxiosFactory(link,method = 'GET', data = null){
        switch(method.toUpperCase()) {
            default:
            case 'GET':
                return await axios.get(link);
            case 'POST':
                return await axios.post(link, data)
            case 'PUT':
                return await axios.put(link, data)
            case 'DELETE':
                return await axios.delete(link)
        }
    }
}
