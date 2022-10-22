import AppForm from '../app-components/Form/AppForm';

Vue.component('document-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                approved_at:  '' ,
                company_id:  '' ,
                description:  '' ,
                path:  '' ,
                title:  '' ,
                valid_to:  '' ,
                
            }
        }
    }

});