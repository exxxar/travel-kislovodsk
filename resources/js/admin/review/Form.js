import AppForm from '../app-components/Form/AppForm';

Vue.component('review-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                comment:  '' ,
                images:  this.getLocalizedFormDefaults() ,
                rating:  '' ,
                tour_guide_id:  '' ,
                tour_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});