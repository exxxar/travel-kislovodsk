import AppForm from '../app-components/Form/AppForm';

Vue.component('message-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                content:  this.getLocalizedFormDefaults() ,
                read_at:  '' ,
                tour_guide_id:  '' ,
                transaction_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});