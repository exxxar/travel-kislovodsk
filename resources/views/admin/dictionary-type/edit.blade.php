@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.dictionary-type.actions.edit', ['name' => $dictionaryType->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <dictionary-type-form
                :action="'{{ $dictionaryType->resource_url }}'"
                :data="{{ $dictionaryType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.dictionary-type.actions.edit', ['name' => $dictionaryType->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.dictionary-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </dictionary-type-form>

        </div>
    
</div>

@endsection