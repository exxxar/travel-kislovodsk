@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tourist-group.actions.index'))

@section('body')

    <tourist-group-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/tourist-groups') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.tourist-group.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/tourist-groups/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.tourist-group.actions.create') }}</a>
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

                                        <th is='sortable' :column="'areas_of_rf'">{{ trans('admin.tourist-group.columns.areas_of_rf') }}</th>
                                        <th is='sortable' :column="'charge_batteries'">{{ trans('admin.tourist-group.columns.charge_batteries') }}</th>
                                        <th is='sortable' :column="'children_ages'">{{ trans('admin.tourist-group.columns.children_ages') }}</th>
                                        <th is='sortable' :column="'children_count'">{{ trans('admin.tourist-group.columns.children_count') }}</th>
                                        <th is='sortable' :column="'dangerous_route_section'">{{ trans('admin.tourist-group.columns.dangerous_route_section') }}</th>
                                        <th is='sortable' :column="'date_and_method_communication_sessions'">{{ trans('admin.tourist-group.columns.date_and_method_communication_sessions') }}</th>
                                        <th is='sortable' :column="'date_and_method_informing'">{{ trans('admin.tourist-group.columns.date_and_method_informing') }}</th>
                                        <th is='sortable' :column="'difficulty_category'">{{ trans('admin.tourist-group.columns.difficulty_category') }}</th>
                                        <th is='sortable' :column="'emergency_exit_routest'">{{ trans('admin.tourist-group.columns.emergency_exit_routest') }}</th>
                                        <th is='sortable' :column="'final_destination_point'">{{ trans('admin.tourist-group.columns.final_destination_point') }}</th>
                                        <th is='sortable' :column="'first_aid_equipment'">{{ trans('admin.tourist-group.columns.first_aid_equipment') }}</th>
                                        <th is='sortable' :column="'foreigners_count'">{{ trans('admin.tourist-group.columns.foreigners_count') }}</th>
                                        <th is='sortable' :column="'foreigners_countries'">{{ trans('admin.tourist-group.columns.foreigners_countries') }}</th>
                                        <th is='sortable' :column="'id'">{{ trans('admin.tourist-group.columns.id') }}</th>
                                        <th is='sortable' :column="'insurance'">{{ trans('admin.tourist-group.columns.insurance') }}</th>
                                        <th is='sortable' :column="'loding_points'">{{ trans('admin.tourist-group.columns.loding_points') }}</th>
                                        <th is='sortable' :column="'medical_professionals'">{{ trans('admin.tourist-group.columns.medical_professionals') }}</th>
                                        <th is='sortable' :column="'mobile_devices'">{{ trans('admin.tourist-group.columns.mobile_devices') }}</th>
                                        <th is='sortable' :column="'radio_station'">{{ trans('admin.tourist-group.columns.radio_station') }}</th>
                                        <th is='sortable' :column="'registration_at'">{{ trans('admin.tourist-group.columns.registration_at') }}</th>
                                        <th is='sortable' :column="'return_at'">{{ trans('admin.tourist-group.columns.return_at') }}</th>
                                        <th is='sortable' :column="'route_distance'">{{ trans('admin.tourist-group.columns.route_distance') }}</th>
                                        <th is='sortable' :column="'satelite_phone'">{{ trans('admin.tourist-group.columns.satelite_phone') }}</th>
                                        <th is='sortable' :column="'start_at'">{{ trans('admin.tourist-group.columns.start_at') }}</th>
                                        <th is='sortable' :column="'start_point'">{{ trans('admin.tourist-group.columns.start_point') }}</th>
                                        <th is='sortable' :column="'summary_members_count'">{{ trans('admin.tourist-group.columns.summary_members_count') }}</th>
                                        <th is='sortable' :column="'tourist_agency_id'">{{ trans('admin.tourist-group.columns.tourist_agency_id') }}</th>
                                        <th is='sortable' :column="'tourist_guide_id'">{{ trans('admin.tourist-group.columns.tourist_guide_id') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="30">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/tourist-groups')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/tourist-groups/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
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

                                    <td>@{{ item.areas_of_rf }}</td>
                                        <td>@{{ item.charge_batteries }}</td>
                                        <td>@{{ item.children_ages }}</td>
                                        <td>@{{ item.children_count }}</td>
                                        <td>@{{ item.dangerous_route_section }}</td>
                                        <td>@{{ item.date_and_method_communication_sessions }}</td>
                                        <td>@{{ item.date_and_method_informing }}</td>
                                        <td>@{{ item.difficulty_category }}</td>
                                        <td>@{{ item.emergency_exit_routest }}</td>
                                        <td>@{{ item.final_destination_point }}</td>
                                        <td>@{{ item.first_aid_equipment }}</td>
                                        <td>@{{ item.foreigners_count }}</td>
                                        <td>@{{ item.foreigners_countries }}</td>
                                        <td>@{{ item.id }}</td>
                                        <td>@{{ item.insurance }}</td>
                                        <td>@{{ item.loding_points }}</td>
                                        <td>@{{ item.medical_professionals }}</td>
                                        <td>@{{ item.mobile_devices }}</td>
                                        <td>@{{ item.radio_station }}</td>
                                        <td>@{{ item.registration_at | datetime }}</td>
                                        <td>@{{ item.return_at | datetime }}</td>
                                        <td>@{{ item.route_distance }}</td>
                                        <td>@{{ item.satelite_phone }}</td>
                                        <td>@{{ item.start_at | datetime }}</td>
                                        <td>@{{ item.start_point }}</td>
                                        <td>@{{ item.summary_members_count }}</td>
                                        <td>@{{ item.tourist_agency_id }}</td>
                                        <td>@{{ item.tourist_guide_id }}</td>
                                        
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
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/tourist-groups/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.tourist-group.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </tourist-group-listing>

@endsection