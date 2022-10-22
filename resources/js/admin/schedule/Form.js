import AppForm from '../app-components/Form/AppForm';

Vue.component('schedule-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                start_at:  '' ,
                tour_id:  '' ,
                
            }
        }
    }

});