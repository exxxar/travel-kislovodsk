import AppForm from '../app-components/Form/AppForm';

Vue.component('dictionary-type-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                
            }
        }
    }

});