<div class="form-group row align-items-center" :class="{'has-danger': errors.has('approved_at'), 'has-success': fields.approved_at && fields.approved_at.valid }">
    <label for="approved_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.document.columns.approved_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.approved_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('approved_at'), 'form-control-success': fields.approved_at && fields.approved_at.valid}" id="approved_at" name="approved_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('approved_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('approved_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('company_id'), 'has-success': fields.company_id && fields.company_id.valid }">
    <label for="company_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.document.columns.company_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company_id'), 'form-control-success': fields.company_id && fields.company_id.valid}" id="company_id" name="company_id" placeholder="{{ trans('admin.document.columns.company_id') }}">
        <div v-if="errors.has('company_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.document.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('path'), 'has-success': fields.path && fields.path.valid }">
    <label for="path" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.document.columns.path') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.path" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('path'), 'form-control-success': fields.path && fields.path.valid}" id="path" name="path" placeholder="{{ trans('admin.document.columns.path') }}">
        <div v-if="errors.has('path')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('path') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.document.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.document.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valid_to'), 'has-success': fields.valid_to && fields.valid_to.valid }">
    <label for="valid_to" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.document.columns.valid_to') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.valid_to" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('valid_to'), 'form-control-success': fields.valid_to && fields.valid_to.valid}" id="valid_to" name="valid_to" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('valid_to')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valid_to') }}</div>
    </div>
</div>


