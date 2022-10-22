<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('inn'), 'has-success': fields.inn && fields.inn.valid }">
    <label for="inn" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.inn') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.inn" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('inn'), 'form-control-success': fields.inn && fields.inn.valid}" id="inn" name="inn" placeholder="{{ trans('admin.company.columns.inn') }}">
        <div v-if="errors.has('inn')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('inn') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('law_address'), 'has-success': fields.law_address && fields.law_address.valid }">
    <label for="law_address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.law_address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.law_address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('law_address'), 'form-control-success': fields.law_address && fields.law_address.valid}" id="law_address" name="law_address" placeholder="{{ trans('admin.company.columns.law_address') }}">
        <div v-if="errors.has('law_address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('law_address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ogrn'), 'has-success': fields.ogrn && fields.ogrn.valid }">
    <label for="ogrn" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.ogrn') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ogrn" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ogrn'), 'form-control-success': fields.ogrn && fields.ogrn.valid}" id="ogrn" name="ogrn" placeholder="{{ trans('admin.company.columns.ogrn') }}">
        <div v-if="errors.has('ogrn')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ogrn') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('photo'), 'has-success': fields.photo && fields.photo.valid }">
    <label for="photo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.photo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.photo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('photo'), 'form-control-success': fields.photo && fields.photo.valid}" id="photo" name="photo" placeholder="{{ trans('admin.company.columns.photo') }}">
        <div v-if="errors.has('photo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('photo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.company.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.company.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>


