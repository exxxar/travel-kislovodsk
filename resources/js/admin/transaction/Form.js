import AppForm from '../app-components/Form/AppForm';

Vue.component('transaction-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                amount:  '' ,
                booking_id:  '' ,
                description:  '' ,
                status_type_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});