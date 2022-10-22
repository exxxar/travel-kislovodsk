import AppForm from '../app-components/Form/AppForm';

Vue.component('tour-object-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                address:  '' ,
                comment:  '' ,
                creator_id:  '' ,
                description:  '' ,
                latitude:  '' ,
                longitude:  '' ,
                photos:  this.getLocalizedFormDefaults() ,
                title:  '' ,
                tour_guide_id:  '' ,
                
            }
        }
    }

});