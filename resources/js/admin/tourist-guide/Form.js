import AppForm from '../app-components/Form/AppForm';

Vue.component('tourist-guide-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                address:  '' ,
                birthday:  '' ,
                home_phone:  '' ,
                mobile_phone:  '' ,
                name:  '' ,
                office_phone:  '' ,
                relative_contact_information:  this.getLocalizedFormDefaults() ,
                sname:  '' ,
                tname:  '' ,
                
            }
        }
    }

});