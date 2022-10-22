<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fname'), 'has-success': fields.fname && fields.fname.valid }">
    <label for="fname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.profile.columns.fname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.fname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('fname'), 'form-control-success': fields.fname && fields.fname.valid}" id="fname" name="fname" placeholder="{{ trans('admin.profile.columns.fname') }}">
        <div v-if="errors.has('fname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('photo'), 'has-success': fields.photo && fields.photo.valid }">
    <label for="photo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.profile.columns.photo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.photo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('photo'), 'form-control-success': fields.photo && fields.photo.valid}" id="photo" name="photo" placeholder="{{ trans('admin.profile.columns.photo') }}">
        <div v-if="errors.has('photo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('photo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sname'), 'has-success': fields.sname && fields.sname.valid }">
    <label for="sname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.profile.columns.sname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sname" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sname'), 'form-control-success': fields.sname && fields.sname.valid}" id="sname" name="sname" placeholder="{{ trans('admin.profile.columns.sname') }}">
        <div v-if="errors.has('sname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sname') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tname'), 'has-success': fields.tname && fields.tname.valid }">
    <label for="tname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.profile.columns.tname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tname'), 'form-control-success': fields.tname && fields.tname.valid}" id="tname" name="tname" placeholder="{{ trans('admin.profile.columns.tname') }}">
        <div v-if="errors.has('tname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tname') }}</div>
    </div>
</div>


