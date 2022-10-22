@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tour.actions.index'))

@section('body')

    <tour-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/tours') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.tour.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/tours/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.tour.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'creator_id'">{{ trans('admin.tour.columns.creator_id') }}</th>
                                        <th is='sortable' :column="'duration'">{{ trans('admin.tour.columns.duration') }}</th>
                                        <th is='sortable' :column="'duration_type_id'">{{ trans('admin.tour.columns.duration_type_id') }}</th>
                                        <th is='sortable' :column="'exclude_services'">{{ trans('admin.tour.columns.exclude_services') }}</th>
                                        <th is='sortable' :column="'id'">{{ trans('admin.tour.columns.id') }}</th>
                                        <th is='sortable' :column="'images'">{{ trans('admin.tour.columns.images') }}</th>
                                        <th is='sortable' :column="'include_services'">{{ trans('admin.tour.columns.include_services') }}</th>
                                        <th is='sortable' :column="'is_active'">{{ trans('admin.tour.columns.is_active') }}</th>
                                        <th is='sortable' :column="'is_draft'">{{ trans('admin.tour.columns.is_draft') }}</th>
                                        <th is='sortable' :column="'is_hot'">{{ trans('admin.tour.columns.is_hot') }}</th>
                                        <th is='sortable' :column="'movement_type_id'">{{ trans('admin.tour.columns.movement_type_id') }}</th>
                                        <th is='sortable' :column="'payment_type_id'">{{ trans('admin.tour.columns.payment_type_id') }}</th>
                                        <th is='sortable' :column="'preview_image'">{{ trans('admin.tour.columns.preview_image') }}</th>
                                        <th is='sortable' :column="'prices'">{{ trans('admin.tour.columns.prices') }}</th>
                                        <th is='sortable' :column="'rating'">{{ trans('admin.tour.columns.rating') }}</th>
                                        <th is='sortable' :column="'start_latitude'">{{ trans('admin.tour.columns.start_latitude') }}</th>
                                        <th is='sortable' :column="'start_longitude'">{{ trans('admin.tour.columns.start_longitude') }}</th>
                                        <th is='sortable' :column="'start_place'">{{ trans('admin.tour.columns.start_place') }}</th>
                                        <th is='sortable' :column="'title'">{{ trans('admin.tour.columns.title') }}</th>
                                        <th is='sortable' :column="'tour_object_id'">{{ trans('admin.tour.columns.tour_object_id') }}</th>
                                        <th is='sortable' :column="'tour_type_id'">{{ trans('admin.tour.columns.tour_type_id') }}</th>
                                        <th is='sortable' :column="'verified_at'">{{ trans('admin.tour.columns.verified_at') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="24">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/tours')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/tours/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.creator_id }}</td>
                                        <td>@{{ item.duration }}</td>
                                        <td>@{{ item.duration_type_id }}</td>
                                        <td>@{{ item.exclude_services }}</td>
                                        <td>@{{ item.id }}</td>
                                        <td>@{{ item.images }}</td>
                                        <td>@{{ item.include_services }}</td>
                                        <td>@{{ item.is_active }}</td>
                                        <td>@{{ item.is_draft }}</td>
                                        <td>@{{ item.is_hot }}</td>
                                        <td>@{{ item.movement_type_id }}</td>
                                        <td>@{{ item.payment_type_id }}</td>
                                        <td>@{{ item.preview_image }}</td>
                                        <td>@{{ item.prices }}</td>
                                        <td>@{{ item.rating }}</td>
                                        <td>@{{ item.start_latitude }}</td>
                                        <td>@{{ item.start_longitude }}</td>
                                        <td>@{{ item.start_place }}</td>
                                        <td>@{{ item.title }}</td>
                                        <td>@{{ item.tour_object_id }}</td>
                                        <td>@{{ item.tour_type_id }}</td>
                                        <td>@{{ item.verified_at | datetime }}</td>
                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/tours/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.tour.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </tour-listing>

@endsection