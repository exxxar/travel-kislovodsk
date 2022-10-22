@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.favorite.actions.edit', ['name' => $favorite->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <favorite-form
                :action="'{{ $favorite->resource_url }}'"
                :data="{{ $favorite->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.favorite.actions.edit', ['name' => $favorite->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.favorite.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </favorite-form>

        </div>
    
</div>

@endsection