import AppForm from '../app-components/Form/AppForm';

Vue.component('booking-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                additional_services:  this.getLocalizedFormDefaults() ,
                email:  '' ,
                fname:  '' ,
                payed_at:  '' ,
                phone:  '' ,
                selected_prices:  this.getLocalizedFormDefaults() ,
                sname:  '' ,
                start_at:  '' ,
                tname:  '' ,
                tour_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});