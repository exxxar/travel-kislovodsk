@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.schedule.actions.edit', ['name' => $schedule->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <schedule-form
                :action="'{{ $schedule->resource_url }}'"
                :data="{{ $schedule->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.schedule.actions.edit', ['name' => $schedule->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.schedule.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </schedule-form>

        </div>
    
</div>

@endsection