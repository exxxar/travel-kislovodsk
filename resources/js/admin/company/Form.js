import AppForm from '../app-components/Form/AppForm';

Vue.component('company-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  '' ,
                inn:  '' ,
                law_address:  '' ,
                ogrn:  '' ,
                photo:  '' ,
                title:  '' ,
                
            }
        }
    }

});