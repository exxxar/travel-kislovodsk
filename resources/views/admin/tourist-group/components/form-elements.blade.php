<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">@{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">@{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('areas_of_rf_{{ $locale }}'), 'has-success': fields.areas_of_rf_{{ $locale }} && fields.areas_of_rf_{{ $locale }}.valid }">
                <label for="areas_of_rf_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.areas_of_rf') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.areas_of_rf.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('areas_of_rf_{{ $locale }}'), 'form-control-success': fields.areas_of_rf_{{ $locale }} && fields.areas_of_rf_{{ $locale }}.valid }" id="areas_of_rf_{{ $locale }}" name="areas_of_rf_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.areas_of_rf') }}">
                    <div v-if="errors.has('areas_of_rf_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('areas_of_rf_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('charge_batteries_{{ $locale }}'), 'has-success': fields.charge_batteries_{{ $locale }} && fields.charge_batteries_{{ $locale }}.valid }">
                <label for="charge_batteries_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.charge_batteries') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.charge_batteries.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('charge_batteries_{{ $locale }}'), 'form-control-success': fields.charge_batteries_{{ $locale }} && fields.charge_batteries_{{ $locale }}.valid }" id="charge_batteries_{{ $locale }}" name="charge_batteries_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.charge_batteries') }}">
                    <div v-if="errors.has('charge_batteries_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('charge_batteries_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('children_ages_{{ $locale }}'), 'has-success': fields.children_ages_{{ $locale }} && fields.children_ages_{{ $locale }}.valid }">
                <label for="children_ages_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.children_ages') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.children_ages.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('children_ages_{{ $locale }}'), 'form-control-success': fields.children_ages_{{ $locale }} && fields.children_ages_{{ $locale }}.valid }" id="children_ages_{{ $locale }}" name="children_ages_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.children_ages') }}">
                    <div v-if="errors.has('children_ages_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('children_ages_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('dangerous_route_section_{{ $locale }}'), 'has-success': fields.dangerous_route_section_{{ $locale }} && fields.dangerous_route_section_{{ $locale }}.valid }">
                <label for="dangerous_route_section_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.dangerous_route_section') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.dangerous_route_section.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dangerous_route_section_{{ $locale }}'), 'form-control-success': fields.dangerous_route_section_{{ $locale }} && fields.dangerous_route_section_{{ $locale }}.valid }" id="dangerous_route_section_{{ $locale }}" name="dangerous_route_section_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.dangerous_route_section') }}">
                    <div v-if="errors.has('dangerous_route_section_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('dangerous_route_section_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_and_method_communication_sessions_{{ $locale }}'), 'has-success': fields.date_and_method_communication_sessions_{{ $locale }} && fields.date_and_method_communication_sessions_{{ $locale }}.valid }">
                <label for="date_and_method_communication_sessions_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.date_and_method_communication_sessions') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.date_and_method_communication_sessions.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('date_and_method_communication_sessions_{{ $locale }}'), 'form-control-success': fields.date_and_method_communication_sessions_{{ $locale }} && fields.date_and_method_communication_sessions_{{ $locale }}.valid }" id="date_and_method_communication_sessions_{{ $locale }}" name="date_and_method_communication_sessions_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.date_and_method_communication_sessions') }}">
                    <div v-if="errors.has('date_and_method_communication_sessions_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('date_and_method_communication_sessions_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_and_method_informing_{{ $locale }}'), 'has-success': fields.date_and_method_informing_{{ $locale }} && fields.date_and_method_informing_{{ $locale }}.valid }">
                <label for="date_and_method_informing_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.date_and_method_informing') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.date_and_method_informing.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('date_and_method_informing_{{ $locale }}'), 'form-control-success': fields.date_and_method_informing_{{ $locale }} && fields.date_and_method_informing_{{ $locale }}.valid }" id="date_and_method_informing_{{ $locale }}" name="date_and_method_informing_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.date_and_method_informing') }}">
                    <div v-if="errors.has('date_and_method_informing_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('date_and_method_informing_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('difficulty_category_{{ $locale }}'), 'has-success': fields.difficulty_category_{{ $locale }} && fields.difficulty_category_{{ $locale }}.valid }">
                <label for="difficulty_category_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.difficulty_category') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.difficulty_category.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('difficulty_category_{{ $locale }}'), 'form-control-success': fields.difficulty_category_{{ $locale }} && fields.difficulty_category_{{ $locale }}.valid }" id="difficulty_category_{{ $locale }}" name="difficulty_category_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.difficulty_category') }}">
                    <div v-if="errors.has('difficulty_category_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('difficulty_category_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('emergency_exit_routest_{{ $locale }}'), 'has-success': fields.emergency_exit_routest_{{ $locale }} && fields.emergency_exit_routest_{{ $locale }}.valid }">
                <label for="emergency_exit_routest_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.emergency_exit_routest') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.emergency_exit_routest.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('emergency_exit_routest_{{ $locale }}'), 'form-control-success': fields.emergency_exit_routest_{{ $locale }} && fields.emergency_exit_routest_{{ $locale }}.valid }" id="emergency_exit_routest_{{ $locale }}" name="emergency_exit_routest_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.emergency_exit_routest') }}">
                    <div v-if="errors.has('emergency_exit_routest_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('emergency_exit_routest_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_aid_equipment_{{ $locale }}'), 'has-success': fields.first_aid_equipment_{{ $locale }} && fields.first_aid_equipment_{{ $locale }}.valid }">
                <label for="first_aid_equipment_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.first_aid_equipment') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.first_aid_equipment.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_aid_equipment_{{ $locale }}'), 'form-control-success': fields.first_aid_equipment_{{ $locale }} && fields.first_aid_equipment_{{ $locale }}.valid }" id="first_aid_equipment_{{ $locale }}" name="first_aid_equipment_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.first_aid_equipment') }}">
                    <div v-if="errors.has('first_aid_equipment_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('first_aid_equipment_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('foreigners_countries_{{ $locale }}'), 'has-success': fields.foreigners_countries_{{ $locale }} && fields.foreigners_countries_{{ $locale }}.valid }">
                <label for="foreigners_countries_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.foreigners_countries') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.foreigners_countries.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('foreigners_countries_{{ $locale }}'), 'form-control-success': fields.foreigners_countries_{{ $locale }} && fields.foreigners_countries_{{ $locale }}.valid }" id="foreigners_countries_{{ $locale }}" name="foreigners_countries_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.foreigners_countries') }}">
                    <div v-if="errors.has('foreigners_countries_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('foreigners_countries_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('insurance_{{ $locale }}'), 'has-success': fields.insurance_{{ $locale }} && fields.insurance_{{ $locale }}.valid }">
                <label for="insurance_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.insurance') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.insurance.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insurance_{{ $locale }}'), 'form-control-success': fields.insurance_{{ $locale }} && fields.insurance_{{ $locale }}.valid }" id="insurance_{{ $locale }}" name="insurance_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.insurance') }}">
                    <div v-if="errors.has('insurance_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('insurance_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('loding_points_{{ $locale }}'), 'has-success': fields.loding_points_{{ $locale }} && fields.loding_points_{{ $locale }}.valid }">
                <label for="loding_points_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.loding_points') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.loding_points.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('loding_points_{{ $locale }}'), 'form-control-success': fields.loding_points_{{ $locale }} && fields.loding_points_{{ $locale }}.valid }" id="loding_points_{{ $locale }}" name="loding_points_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.loding_points') }}">
                    <div v-if="errors.has('loding_points_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('loding_points_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('medical_professionals_{{ $locale }}'), 'has-success': fields.medical_professionals_{{ $locale }} && fields.medical_professionals_{{ $locale }}.valid }">
                <label for="medical_professionals_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.medical_professionals') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.medical_professionals.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('medical_professionals_{{ $locale }}'), 'form-control-success': fields.medical_professionals_{{ $locale }} && fields.medical_professionals_{{ $locale }}.valid }" id="medical_professionals_{{ $locale }}" name="medical_professionals_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.medical_professionals') }}">
                    <div v-if="errors.has('medical_professionals_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('medical_professionals_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('mobile_devices_{{ $locale }}'), 'has-success': fields.mobile_devices_{{ $locale }} && fields.mobile_devices_{{ $locale }}.valid }">
                <label for="mobile_devices_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.mobile_devices') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.mobile_devices.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mobile_devices_{{ $locale }}'), 'form-control-success': fields.mobile_devices_{{ $locale }} && fields.mobile_devices_{{ $locale }}.valid }" id="mobile_devices_{{ $locale }}" name="mobile_devices_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.mobile_devices') }}">
                    <div v-if="errors.has('mobile_devices_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('mobile_devices_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('radio_station_{{ $locale }}'), 'has-success': fields.radio_station_{{ $locale }} && fields.radio_station_{{ $locale }}.valid }">
                <label for="radio_station_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-group.columns.radio_station') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.radio_station.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('radio_station_{{ $locale }}'), 'form-control-success': fields.radio_station_{{ $locale }} && fields.radio_station_{{ $locale }}.valid }" id="radio_station_{{ $locale }}" name="radio_station_{{ $locale }}" placeholder="{{ trans('admin.tourist-group.columns.radio_station') }}">
                    <div v-if="errors.has('radio_station_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('radio_station_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('additional_info'), 'has-success': fields.additional_info && fields.additional_info.valid }">
    <label for="additional_info" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.additional_info') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.additional_info" v-validate="''" id="additional_info" name="additional_info"></textarea>
        </div>
        <div v-if="errors.has('additional_info')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('additional_info') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('children_count'), 'has-success': fields.children_count && fields.children_count.valid }">
    <label for="children_count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.children_count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.children_count" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('children_count'), 'form-control-success': fields.children_count && fields.children_count.valid}" id="children_count" name="children_count" placeholder="{{ trans('admin.tourist-group.columns.children_count') }}">
        <div v-if="errors.has('children_count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('children_count') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('final_destination_point'), 'has-success': fields.final_destination_point && fields.final_destination_point.valid }">
    <label for="final_destination_point" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.final_destination_point') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.final_destination_point" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('final_destination_point'), 'form-control-success': fields.final_destination_point && fields.final_destination_point.valid}" id="final_destination_point" name="final_destination_point" placeholder="{{ trans('admin.tourist-group.columns.final_destination_point') }}">
        <div v-if="errors.has('final_destination_point')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('final_destination_point') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('foreigners_count'), 'has-success': fields.foreigners_count && fields.foreigners_count.valid }">
    <label for="foreigners_count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.foreigners_count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.foreigners_count" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('foreigners_count'), 'form-control-success': fields.foreigners_count && fields.foreigners_count.valid}" id="foreigners_count" name="foreigners_count" placeholder="{{ trans('admin.tourist-group.columns.foreigners_count') }}">
        <div v-if="errors.has('foreigners_count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('foreigners_count') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('registration_at'), 'has-success': fields.registration_at && fields.registration_at.valid }">
    <label for="registration_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.registration_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.registration_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('registration_at'), 'form-control-success': fields.registration_at && fields.registration_at.valid}" id="registration_at" name="registration_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('registration_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('registration_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('return_at'), 'has-success': fields.return_at && fields.return_at.valid }">
    <label for="return_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.return_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.return_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('return_at'), 'form-control-success': fields.return_at && fields.return_at.valid}" id="return_at" name="return_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('return_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('return_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('route_distance'), 'has-success': fields.route_distance && fields.route_distance.valid }">
    <label for="route_distance" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.route_distance') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.route_distance" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('route_distance'), 'form-control-success': fields.route_distance && fields.route_distance.valid}" id="route_distance" name="route_distance" placeholder="{{ trans('admin.tourist-group.columns.route_distance') }}">
        <div v-if="errors.has('route_distance')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('route_distance') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('satelite_phone'), 'has-success': fields.satelite_phone && fields.satelite_phone.valid }">
    <label for="satelite_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.satelite_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.satelite_phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('satelite_phone'), 'form-control-success': fields.satelite_phone && fields.satelite_phone.valid}" id="satelite_phone" name="satelite_phone" placeholder="{{ trans('admin.tourist-group.columns.satelite_phone') }}">
        <div v-if="errors.has('satelite_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('satelite_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_at'), 'has-success': fields.start_at && fields.start_at.valid }">
    <label for="start_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.start_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_at'), 'form-control-success': fields.start_at && fields.start_at.valid}" id="start_at" name="start_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_point'), 'has-success': fields.start_point && fields.start_point.valid }">
    <label for="start_point" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.start_point') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_point" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_point'), 'form-control-success': fields.start_point && fields.start_point.valid}" id="start_point" name="start_point" placeholder="{{ trans('admin.tourist-group.columns.start_point') }}">
        <div v-if="errors.has('start_point')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_point') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('summary_members_count'), 'has-success': fields.summary_members_count && fields.summary_members_count.valid }">
    <label for="summary_members_count" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.summary_members_count') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.summary_members_count" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('summary_members_count'), 'form-control-success': fields.summary_members_count && fields.summary_members_count.valid}" id="summary_members_count" name="summary_members_count" placeholder="{{ trans('admin.tourist-group.columns.summary_members_count') }}">
        <div v-if="errors.has('summary_members_count')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('summary_members_count') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tourist_agency_id'), 'has-success': fields.tourist_agency_id && fields.tourist_agency_id.valid }">
    <label for="tourist_agency_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.tourist_agency_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tourist_agency_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tourist_agency_id'), 'form-control-success': fields.tourist_agency_id && fields.tourist_agency_id.valid}" id="tourist_agency_id" name="tourist_agency_id" placeholder="{{ trans('admin.tourist-group.columns.tourist_agency_id') }}">
        <div v-if="errors.has('tourist_agency_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tourist_agency_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tourist_guide_id'), 'has-success': fields.tourist_guide_id && fields.tourist_guide_id.valid }">
    <label for="tourist_guide_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-group.columns.tourist_guide_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tourist_guide_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tourist_guide_id'), 'form-control-success': fields.tourist_guide_id && fields.tourist_guide_id.valid}" id="tourist_guide_id" name="tourist_guide_id" placeholder="{{ trans('admin.tourist-group.columns.tourist_guide_id') }}">
        <div v-if="errors.has('tourist_guide_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tourist_guide_id') }}</div>
    </div>
</div>


