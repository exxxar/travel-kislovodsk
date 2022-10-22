<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-member.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.tourist-member.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('birthday'), 'has-success': fields.birthday && fields.birthday.valid }">
    <label for="birthday" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-member.columns.birthday') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthday" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthday'), 'form-control-success': fields.birthday && fields.birthday.valid}" id="birthday" name="birthday" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('birthday')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthday') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('full_name'), 'has-success': fields.full_name && fields.full_name.valid }">
    <label for="full_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-member.columns.full_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.full_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('full_name'), 'form-control-success': fields.full_name && fields.full_name.valid}" id="full_name" name="full_name" placeholder="{{ trans('admin.tourist-member.columns.full_name') }}">
        <div v-if="errors.has('full_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('full_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone'), 'has-success': fields.phone && fields.phone.valid }">
    <label for="phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-member.columns.phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone'), 'form-control-success': fields.phone && fields.phone.valid}" id="phone" name="phone" placeholder="{{ trans('admin.tourist-member.columns.phone') }}">
        <div v-if="errors.has('phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tourist_group_id'), 'has-success': fields.tourist_group_id && fields.tourist_group_id.valid }">
    <label for="tourist_group_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tourist-member.columns.tourist_group_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tourist_group_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tourist_group_id'), 'form-control-success': fields.tourist_group_id && fields.tourist_group_id.valid}" id="tourist_group_id" name="tourist_group_id" placeholder="{{ trans('admin.tourist-member.columns.tourist_group_id') }}">
        <div v-if="errors.has('tourist_group_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tourist_group_id') }}</div>
    </div>
</div>


