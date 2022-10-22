import AppForm from '../app-components/Form/AppForm';

Vue.component('tourist-member-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                address:  '' ,
                birthday:  '' ,
                full_name:  '' ,
                phone:  '' ,
                tourist_group_id:  '' ,
                
            }
        }
    }

});