import axios from "axios";

export default {
    async makeAxiosFactory(link,method = 'GET', data = null){
        let result;
        switch(method.toUpperCase()) {
            default:
            case 'GET':
                result =  await axios.get(link);
                break;
            case 'POST':
                result =  await axios.post(link, data)
                break;
            case 'PUT':
                result =  await axios.put(link, data)
                break;
            case 'DELETE':
                result =  await axios.delete(link)
                break;
        }

        return result;
    }
}
