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
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('images_{{ $locale }}'), 'has-success': fields.images_{{ $locale }} && fields.images_{{ $locale }}.valid }">
                <label for="images_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.review.columns.images') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.images.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('images_{{ $locale }}'), 'form-control-success': fields.images_{{ $locale }} && fields.images_{{ $locale }}.valid }" id="images_{{ $locale }}" name="images_{{ $locale }}" placeholder="{{ trans('admin.review.columns.images') }}">
                    <div v-if="errors.has('images_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('images_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('comment'), 'has-success': fields.comment && fields.comment.valid }">
    <label for="comment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.review.columns.comment') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.comment" v-validate="'required'" id="comment" name="comment"></textarea>
        </div>
        <div v-if="errors.has('comment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('comment') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rating'), 'has-success': fields.rating && fields.rating.valid }">
    <label for="rating" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.review.columns.rating') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rating" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rating'), 'form-control-success': fields.rating && fields.rating.valid}" id="rating" name="rating" placeholder="{{ trans('admin.review.columns.rating') }}">
        <div v-if="errors.has('rating')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rating') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tour_guide_id'), 'has-success': fields.tour_guide_id && fields.tour_guide_id.valid }">
    <label for="tour_guide_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.review.columns.tour_guide_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tour_guide_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tour_guide_id'), 'form-control-success': fields.tour_guide_id && fields.tour_guide_id.valid}" id="tour_guide_id" name="tour_guide_id" placeholder="{{ trans('admin.review.columns.tour_guide_id') }}">
        <div v-if="errors.has('tour_guide_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tour_guide_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tour_id'), 'has-success': fields.tour_id && fields.tour_id.valid }">
    <label for="tour_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.review.columns.tour_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tour_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tour_id'), 'form-control-success': fields.tour_id && fields.tour_id.valid}" id="tour_id" name="tour_id" placeholder="{{ trans('admin.review.columns.tour_id') }}">
        <div v-if="errors.has('tour_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tour_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.review.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.review.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


