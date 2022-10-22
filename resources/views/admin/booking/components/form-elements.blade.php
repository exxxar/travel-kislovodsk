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
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('additional_services_{{ $locale }}'), 'has-success': fields.additional_services_{{ $locale }} && fields.additional_services_{{ $locale }}.valid }">
                <label for="additional_services_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.booking.columns.additional_services') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.additional_services.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('additional_services_{{ $locale }}'), 'form-control-success': fields.additional_services_{{ $locale }} && fields.additional_services_{{ $locale }}.valid }" id="additional_services_{{ $locale }}" name="additional_services_{{ $locale }}" placeholder="{{ trans('admin.booking.columns.additional_services') }}">
                    <div v-if="errors.has('additional_services_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('additional_services_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('selected_prices_{{ $locale }}'), 'has-success': fields.selected_prices_{{ $locale }} && fields.selected_prices_{{ $locale }}.valid }">
                <label for="selected_prices_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.booking.columns.selected_prices') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.selected_prices.{{ $locale }}" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('selected_prices_{{ $locale }}'), 'form-control-success': fields.selected_prices_{{ $locale }} && fields.selected_prices_{{ $locale }}.valid }" id="selected_prices_{{ $locale }}" name="selected_prices_{{ $locale }}" placeholder="{{ trans('admin.booking.columns.selected_prices') }}">
                    <div v-if="errors.has('selected_prices_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('selected_prices_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.booking.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fname'), 'has-success': fields.fname && fields.fname.valid }">
    <label for="fname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.fname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fname'), 'form-control-success': fields.fname && fields.fname.valid}" id="fname" name="fname" placeholder="{{ trans('admin.booking.columns.fname') }}">
        <div v-if="errors.has('fname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('payed_at'), 'has-success': fields.payed_at && fields.payed_at.valid }">
    <label for="payed_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.payed_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.payed_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('payed_at'), 'form-control-success': fields.payed_at && fields.payed_at.valid}" id="payed_at" name="payed_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('payed_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('payed_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.booking.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sname'), 'has-success': fields.sname && fields.sname.valid }">
    <label for="sname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.sname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sname" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sname'), 'form-control-success': fields.sname && fields.sname.valid}" id="sname" name="sname" placeholder="{{ trans('admin.booking.columns.sname') }}">
        <div v-if="errors.has('sname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_at'), 'has-success': fields.start_at && fields.start_at.valid }">
    <label for="start_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.start_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('start_at'), 'form-control-success': fields.start_at && fields.start_at.valid}" id="start_at" name="start_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('start_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tname'), 'has-success': fields.tname && fields.tname.valid }">
    <label for="tname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.tname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tname'), 'form-control-success': fields.tname && fields.tname.valid}" id="tname" name="tname" placeholder="{{ trans('admin.booking.columns.tname') }}">
        <div v-if="errors.has('tname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tour_id'), 'has-success': fields.tour_id && fields.tour_id.valid }">
    <label for="tour_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.tour_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tour_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tour_id'), 'form-control-success': fields.tour_id && fields.tour_id.valid}" id="tour_id" name="tour_id" placeholder="{{ trans('admin.booking.columns.tour_id') }}">
        <div v-if="errors.has('tour_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tour_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.booking.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.booking.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


