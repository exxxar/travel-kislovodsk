<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dictionary_type_id'), 'has-success': fields.dictionary_type_id && fields.dictionary_type_id.valid }">
    <label for="dictionary_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dictionary.columns.dictionary_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.dictionary_type_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dictionary_type_id'), 'form-control-success': fields.dictionary_type_id && fields.dictionary_type_id.valid}" id="dictionary_type_id" name="dictionary_type_id" placeholder="{{ trans('admin.dictionary.columns.dictionary_type_id') }}">
        <div v-if="errors.has('dictionary_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dictionary_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dictionary.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.dictionary.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>


