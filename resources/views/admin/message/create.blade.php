@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.message.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <message-form
            :action="'{{ url('admin/messages') }}'"
            :locales="{{ json_encode($locales) }}"
            :send-empty-locales="false"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.message.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.message.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </message-form>

        </div>

        </div>

    
@endsection