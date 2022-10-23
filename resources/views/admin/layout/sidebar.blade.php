<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/bookings') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.booking.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/companies') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.company.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/dictionaries') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.dictionary.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/dictionary-types') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.dictionary-type.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/documents') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.document.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/favorites') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.favorite.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/messages') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.message.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/profiles') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.profile.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/reviews') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.review.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/schedules') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.schedule.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tours') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.tour.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tourist-agencies') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.tourist-agency.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tourist-groups') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.tourist-group.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tourist-guides') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.tourist-guide.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tourist-members') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.tourist-member.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tour-objects') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.tour-object.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/transactions') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.transaction.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
