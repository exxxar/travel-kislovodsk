@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tour-object.actions.edit', ['name' => $tourObject->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tour-object-form
                :action="'{{ $tourObject->resource_url }}'"
                :data="{{ $tourObject->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tour-object.actions.edit', ['name' => $tourObject->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tour-object.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tour-object-form>

        </div>
    
</div>

@endsection