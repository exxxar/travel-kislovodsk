import AppForm from '../app-components/Form/AppForm';

Vue.component('dictionary-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                dictionary_type_id:  '' ,
                title:  '' ,
                
            }
        }
    }

});