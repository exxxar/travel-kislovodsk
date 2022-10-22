@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tourist-member.actions.edit', ['name' => $touristMember->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tourist-member-form
                :action="'{{ $touristMember->resource_url }}'"
                :data="{{ $touristMember->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tourist-member.actions.edit', ['name' => $touristMember->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tourist-member.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tourist-member-form>

        </div>
    
</div>

@endsection