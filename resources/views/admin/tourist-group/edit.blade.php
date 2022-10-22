@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tourist-group.actions.edit', ['name' => $touristGroup->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tourist-group-form
                :action="'{{ $touristGroup->resource_url }}'"
                :data="{{ $touristGroup->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tourist-group.actions.edit', ['name' => $touristGroup->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tourist-group.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tourist-group-form>

        </div>
    
</div>

@endsection