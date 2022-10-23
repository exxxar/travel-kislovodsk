import AppForm from '../app-components/Form/AppForm';

Vue.component('favorite-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tour_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});