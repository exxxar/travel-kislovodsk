import AppForm from '../app-components/Form/AppForm';

Vue.component('tourist-group-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                additional_info:  '' ,
                areas_of_rf:  this.getLocalizedFormDefaults() ,
                charge_batteries:  this.getLocalizedFormDefaults() ,
                children_ages:  this.getLocalizedFormDefaults() ,
                children_count:  '' ,
                dangerous_route_section:  this.getLocalizedFormDefaults() ,
                date_and_method_communication_sessions:  this.getLocalizedFormDefaults() ,
                date_and_method_informing:  this.getLocalizedFormDefaults() ,
                difficulty_category:  this.getLocalizedFormDefaults() ,
                emergency_exit_routest:  this.getLocalizedFormDefaults() ,
                final_destination_point:  '' ,
                first_aid_equipment:  this.getLocalizedFormDefaults() ,
                foreigners_count:  '' ,
                foreigners_countries:  this.getLocalizedFormDefaults() ,
                insurance:  this.getLocalizedFormDefaults() ,
                loding_points:  this.getLocalizedFormDefaults() ,
                medical_professionals:  this.getLocalizedFormDefaults() ,
                mobile_devices:  this.getLocalizedFormDefaults() ,
                radio_station:  this.getLocalizedFormDefaults() ,
                registration_at:  '' ,
                return_at:  '' ,
                route_distance:  '' ,
                satelite_phone:  '' ,
                start_at:  '' ,
                start_point:  '' ,
                summary_members_count:  '' ,
                tourist_agency_id:  '' ,
                tourist_guide_id:  '' ,
                
            }
        }
    }

});