@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.transaction.actions.edit', ['name' => $transaction->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <transaction-form
                :action="'{{ $transaction->resource_url }}'"
                :data="{{ $transaction->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.transaction.actions.edit', ['name' => $transaction->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.transaction.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </transaction-form>

        </div>
    
</div>

@endsection