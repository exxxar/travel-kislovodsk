@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.booking.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <booking-form
            :action="'{{ url('admin/bookings') }}'"
            :locales="{{ json_encode($locales) }}"
            :send-empty-locales="false"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.booking.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.booking.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </booking-form>

        </div>

        </div>

    
@endsection