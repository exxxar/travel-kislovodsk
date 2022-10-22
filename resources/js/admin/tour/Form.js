import AppForm from '../app-components/Form/AppForm';

Vue.component('tour-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                creator_id:  '' ,
                description:  '' ,
                duration:  '' ,
                duration_type_id:  '' ,
                exclude_services:  this.getLocalizedFormDefaults() ,
                images:  this.getLocalizedFormDefaults() ,
                include_services:  this.getLocalizedFormDefaults() ,
                is_active:  false ,
                is_draft:  false ,
                is_hot:  false ,
                movement_type_id:  '' ,
                payment_type_id:  '' ,
                preview_image:  '' ,
                prices:  this.getLocalizedFormDefaults() ,
                rating:  '' ,
                start_comment:  '' ,
                start_latitude:  '' ,
                start_longitude:  '' ,
                start_place:  '' ,
                title:  '' ,
                tour_object_id:  '' ,
                tour_type_id:  '' ,
                verified_at:  '' ,
                
            }
        }
    }

});