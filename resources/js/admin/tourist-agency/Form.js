import AppForm from '../app-components/Form/AppForm';

Vue.component('tourist-agency-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                phone:  '' ,
                title:  '' ,
                
            }
        }
    }

});