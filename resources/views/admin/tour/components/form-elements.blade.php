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
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('exclude_services_{{ $locale }}'), 'has-success': fields.exclude_services_{{ $locale }} && fields.exclude_services_{{ $locale }}.valid }">
                <label for="exclude_services_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tour.columns.exclude_services') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.exclude_services.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('exclude_services_{{ $locale }}'), 'form-control-success': fields.exclude_services_{{ $locale }} && fields.exclude_services_{{ $locale }}.valid }" id="exclude_services_{{ $locale }}" name="exclude_services_{{ $locale }}" placeholder="{{ trans('admin.tour.columns.exclude_services') }}">
                    <div v-if="errors.has('exclude_services_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('exclude_services_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('images_{{ $locale }}'), 'has-success': fields.images_{{ $locale }} && fields.images_{{ $locale }}.valid }">
                <label for="images_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tour.columns.images') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.images.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('images_{{ $locale }}'), 'form-control-success': fields.images_{{ $locale }} && fields.images_{{ $locale }}.valid }" id="images_{{ $locale }}" name="images_{{ $locale }}" placeholder="{{ trans('admin.tour.columns.images') }}">
                    <div v-if="errors.has('images_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('images_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('include_services_{{ $locale }}'), 'has-success': fields.include_services_{{ $locale }} && fields.include_services_{{ $locale }}.valid }">
                <label for="include_services_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tour.columns.include_services') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.include_services.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('include_services_{{ $locale }}'), 'form-control-success': fields.include_services_{{ $locale }} && fields.include_services_{{ $locale }}.valid }" id="include_services_{{ $locale }}" name="include_services_{{ $locale }}" placeholder="{{ trans('admin.tour.columns.include_services') }}">
                    <div v-if="errors.has('include_services_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('include_services_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    @foreach($locales as $locale)
        <div class="col-md" v-show="shouldShowLangGroup('{{ $locale }}')" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('prices_{{ $locale }}'), 'has-success': fields.prices_{{ $locale }} && fields.prices_{{ $locale }}.valid }">
                <label for="prices_{{ $locale }}" class="col-md-2 col-form-label text-md-right">{{ trans('admin.tour.columns.prices') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.prices.{{ $locale }}" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('prices_{{ $locale }}'), 'form-control-success': fields.prices_{{ $locale }} && fields.prices_{{ $locale }}.valid }" id="prices_{{ $locale }}" name="prices_{{ $locale }}" placeholder="{{ trans('admin.tour.columns.prices') }}">
                    <div v-if="errors.has('prices_{{ $locale }}')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('prices_{{ $locale }}') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('creator_id'), 'has-success': fields.creator_id && fields.creator_id.valid }">
    <label for="creator_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.creator_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.creator_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('creator_id'), 'form-control-success': fields.creator_id && fields.creator_id.valid}" id="creator_id" name="creator_id" placeholder="{{ trans('admin.tour.columns.creator_id') }}">
        <div v-if="errors.has('creator_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('creator_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('duration'), 'has-success': fields.duration && fields.duration.valid }">
    <label for="duration" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.duration') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.duration" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('duration'), 'form-control-success': fields.duration && fields.duration.valid}" id="duration" name="duration" placeholder="{{ trans('admin.tour.columns.duration') }}">
        <div v-if="errors.has('duration')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('duration') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('duration_type_id'), 'has-success': fields.duration_type_id && fields.duration_type_id.valid }">
    <label for="duration_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.duration_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.duration_type_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('duration_type_id'), 'form-control-success': fields.duration_type_id && fields.duration_type_id.valid}" id="duration_type_id" name="duration_type_id" placeholder="{{ trans('admin.tour.columns.duration_type_id') }}">
        <div v-if="errors.has('duration_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('duration_type_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_active'), 'has-success': fields.is_active && fields.is_active.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_active" type="checkbox" v-model="form.is_active" v-validate="''" data-vv-name="is_active"  name="is_active_fake_element">
        <label class="form-check-label" for="is_active">
            {{ trans('admin.tour.columns.is_active') }}
        </label>
        <input type="hidden" name="is_active" :value="form.is_active">
        <div v-if="errors.has('is_active')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_active') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_draft'), 'has-success': fields.is_draft && fields.is_draft.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_draft" type="checkbox" v-model="form.is_draft" v-validate="''" data-vv-name="is_draft"  name="is_draft_fake_element">
        <label class="form-check-label" for="is_draft">
            {{ trans('admin.tour.columns.is_draft') }}
        </label>
        <input type="hidden" name="is_draft" :value="form.is_draft">
        <div v-if="errors.has('is_draft')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_draft') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('is_hot'), 'has-success': fields.is_hot && fields.is_hot.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_hot" type="checkbox" v-model="form.is_hot" v-validate="''" data-vv-name="is_hot"  name="is_hot_fake_element">
        <label class="form-check-label" for="is_hot">
            {{ trans('admin.tour.columns.is_hot') }}
        </label>
        <input type="hidden" name="is_hot" :value="form.is_hot">
        <div v-if="errors.has('is_hot')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_hot') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('movement_type_id'), 'has-success': fields.movement_type_id && fields.movement_type_id.valid }">
    <label for="movement_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.movement_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.movement_type_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('movement_type_id'), 'form-control-success': fields.movement_type_id && fields.movement_type_id.valid}" id="movement_type_id" name="movement_type_id" placeholder="{{ trans('admin.tour.columns.movement_type_id') }}">
        <div v-if="errors.has('movement_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('movement_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('payment_type_id'), 'has-success': fields.payment_type_id && fields.payment_type_id.valid }">
    <label for="payment_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.payment_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.payment_type_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('payment_type_id'), 'form-control-success': fields.payment_type_id && fields.payment_type_id.valid}" id="payment_type_id" name="payment_type_id" placeholder="{{ trans('admin.tour.columns.payment_type_id') }}">
        <div v-if="errors.has('payment_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('payment_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('preview_image'), 'has-success': fields.preview_image && fields.preview_image.valid }">
    <label for="preview_image" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.preview_image') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.preview_image" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('preview_image'), 'form-control-success': fields.preview_image && fields.preview_image.valid}" id="preview_image" name="preview_image" placeholder="{{ trans('admin.tour.columns.preview_image') }}">
        <div v-if="errors.has('preview_image')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('preview_image') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rating'), 'has-success': fields.rating && fields.rating.valid }">
    <label for="rating" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.rating') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rating" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rating'), 'form-control-success': fields.rating && fields.rating.valid}" id="rating" name="rating" placeholder="{{ trans('admin.tour.columns.rating') }}">
        <div v-if="errors.has('rating')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rating') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_comment'), 'has-success': fields.start_comment && fields.start_comment.valid }">
    <label for="start_comment" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.start_comment') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.start_comment" v-validate="''" id="start_comment" name="start_comment"></textarea>
        </div>
        <div v-if="errors.has('start_comment')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_comment') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_latitude'), 'has-success': fields.start_latitude && fields.start_latitude.valid }">
    <label for="start_latitude" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.start_latitude') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_latitude" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_latitude'), 'form-control-success': fields.start_latitude && fields.start_latitude.valid}" id="start_latitude" name="start_latitude" placeholder="{{ trans('admin.tour.columns.start_latitude') }}">
        <div v-if="errors.has('start_latitude')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_latitude') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_longitude'), 'has-success': fields.start_longitude && fields.start_longitude.valid }">
    <label for="start_longitude" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.start_longitude') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_longitude" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_longitude'), 'form-control-success': fields.start_longitude && fields.start_longitude.valid}" id="start_longitude" name="start_longitude" placeholder="{{ trans('admin.tour.columns.start_longitude') }}">
        <div v-if="errors.has('start_longitude')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_longitude') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_place'), 'has-success': fields.start_place && fields.start_place.valid }">
    <label for="start_place" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.start_place') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_place" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_place'), 'form-control-success': fields.start_place && fields.start_place.valid}" id="start_place" name="start_place" placeholder="{{ trans('admin.tour.columns.start_place') }}">
        <div v-if="errors.has('start_place')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_place') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.tour.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tour_object_id'), 'has-success': fields.tour_object_id && fields.tour_object_id.valid }">
    <label for="tour_object_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.tour_object_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tour_object_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tour_object_id'), 'form-control-success': fields.tour_object_id && fields.tour_object_id.valid}" id="tour_object_id" name="tour_object_id" placeholder="{{ trans('admin.tour.columns.tour_object_id') }}">
        <div v-if="errors.has('tour_object_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tour_object_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tour_type_id'), 'has-success': fields.tour_type_id && fields.tour_type_id.valid }">
    <label for="tour_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.tour_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tour_type_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tour_type_id'), 'form-control-success': fields.tour_type_id && fields.tour_type_id.valid}" id="tour_type_id" name="tour_type_id" placeholder="{{ trans('admin.tour.columns.tour_type_id') }}">
        <div v-if="errors.has('tour_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tour_type_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('verified_at'), 'has-success': fields.verified_at && fields.verified_at.valid }">
    <label for="verified_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tour.columns.verified_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.verified_at" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('verified_at'), 'form-control-success': fields.verified_at && fields.verified_at.valid}" id="verified_at" name="verified_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('verified_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('verified_at') }}</div>
    </div>
</div>


