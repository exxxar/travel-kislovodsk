@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tourist-agency.actions.edit', ['name' => $touristAgency->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tourist-agency-form
                :action="'{{ $touristAgency->resource_url }}'"
                :data="{{ $touristAgency->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tourist-agency.actions.edit', ['name' => $touristAgency->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tourist-agency.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tourist-agency-form>

        </div>
    
</div>

@endsection