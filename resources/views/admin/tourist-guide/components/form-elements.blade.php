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
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('relative_contact_information_{{ $locale }}'), 'has-success': fields.relative_contact_information_{{ $locale }} && fields.relative_contact_information_{{ $locale }}.valid }">
                <label for="relative_contact_information_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tourist-guide.columns.relative_contact_information') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.relative_contact_information.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('relative_contact_information_{{ $locale }}'), 'form-control-success': fields.relative_contact_information_{{ $locale }} && fields.relative_contact_information_{{ $locale }}.valid }" id="relative_contact_information_{{ $locale }}" name="relative_contact_information_{{ $locale }}" placeholder="{{ trans('admin.tourist-guide.columns.relative_contact_information') }}">
                    <div v-if="errors.has('relative_contact_information_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('relative_contact_information_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.tourist-guide.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthday'), 'has-success': fields.birthday && fields.birthday.valid }">
    <label for="birthday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.birthday') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthday" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthday'), 'form-control-success': fields.birthday && fields.birthday.valid}" id="birthday" name="birthday" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('home_phone'), 'has-success': fields.home_phone && fields.home_phone.valid }">
    <label for="home_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.home_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.home_phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('home_phone'), 'form-control-success': fields.home_phone && fields.home_phone.valid}" id="home_phone" name="home_phone" placeholder="{{ trans('admin.tourist-guide.columns.home_phone') }}">
        <div v-if="errors.has('home_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('home_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mobile_phone'), 'has-success': fields.mobile_phone && fields.mobile_phone.valid }">
    <label for="mobile_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.mobile_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mobile_phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mobile_phone'), 'form-control-success': fields.mobile_phone && fields.mobile_phone.valid}" id="mobile_phone" name="mobile_phone" placeholder="{{ trans('admin.tourist-guide.columns.mobile_phone') }}">
        <div v-if="errors.has('mobile_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mobile_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.tourist-guide.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('office_phone'), 'has-success': fields.office_phone && fields.office_phone.valid }">
    <label for="office_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.office_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.office_phone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('office_phone'), 'form-control-success': fields.office_phone && fields.office_phone.valid}" id="office_phone" name="office_phone" placeholder="{{ trans('admin.tourist-guide.columns.office_phone') }}">
        <div v-if="errors.has('office_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('office_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sname'), 'has-success': fields.sname && fields.sname.valid }">
    <label for="sname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.sname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sname" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sname'), 'form-control-success': fields.sname && fields.sname.valid}" id="sname" name="sname" placeholder="{{ trans('admin.tourist-guide.columns.sname') }}">
        <div v-if="errors.has('sname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tname'), 'has-success': fields.tname && fields.tname.valid }">
    <label for="tname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-guide.columns.tname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tname'), 'form-control-success': fields.tname && fields.tname.valid}" id="tname" name="tname" placeholder="{{ trans('admin.tourist-guide.columns.tname') }}">
        <div v-if="errors.has('tname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tname') }}</div>
    </div>
</div>


