<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'booking' => [
        'title' => 'Bookings',

        'actions' => [
            'index' => 'Bookings',
            'create' => 'New Booking',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'additional_services' => 'Additional services',
            'email' => 'Email',
            'fname' => 'Fname',
            'payed_at' => 'Payed at',
            'phone' => 'Phone',
            'selected_prices' => 'Selected prices',
            'sname' => 'Sname',
            'start_at' => 'Start at',
            'tname' => 'Tname',
            'tour_id' => 'Tour',
            'user_id' => 'User',
            
        ],
    ],

    'company' => [
        'title' => 'Companies',

        'actions' => [
            'index' => 'Companies',
            'create' => 'New Company',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'inn' => 'Inn',
            'law_address' => 'Law address',
            'ogrn' => 'Ogrn',
            'photo' => 'Photo',
            'title' => 'Title',
            
        ],
    ],

    'dictionary' => [
        'title' => 'Dictionaries',

        'actions' => [
            'index' => 'Dictionaries',
            'create' => 'New Dictionary',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'dictionary_type_id' => 'Dictionary type',
            'title' => 'Title',
            
        ],
    ],

    'dictionary-type' => [
        'title' => 'Dictionary Types',

        'actions' => [
            'index' => 'Dictionary Types',
            'create' => 'New Dictionary Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            
        ],
    ],

    'document' => [
        'title' => 'Documents',

        'actions' => [
            'index' => 'Documents',
            'create' => 'New Document',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'approved_at' => 'Approved at',
            'company_id' => 'Company',
            'description' => 'Description',
            'path' => 'Path',
            'title' => 'Title',
            'valid_to' => 'Valid to',
            
        ],
    ],

    'favorite' => [
        'title' => 'Favorites',

        'actions' => [
            'index' => 'Favorites',
            'create' => 'New Favorite',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'tour_id' => 'Tour',
            'user_id' => 'User',
            
        ],
    ],

    'message' => [
        'title' => 'Messages',

        'actions' => [
            'index' => 'Messages',
            'create' => 'New Message',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'content' => 'Content',
            'read_at' => 'Read at',
            'tour_guide_id' => 'Tour guide',
            'transaction_id' => 'Transaction',
            'user_id' => 'User',
            
        ],
    ],

    'profile' => [
        'title' => 'Profiles',

        'actions' => [
            'index' => 'Profiles',
            'create' => 'New Profile',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'fname' => 'Fname',
            'photo' => 'Photo',
            'sname' => 'Sname',
            'tname' => 'Tname',
            
        ],
    ],

    'review' => [
        'title' => 'Reviews',

        'actions' => [
            'index' => 'Reviews',
            'create' => 'New Review',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'comment' => 'Comment',
            'images' => 'Images',
            'rating' => 'Rating',
            'tour_guide_id' => 'Tour guide',
            'tour_id' => 'Tour',
            'user_id' => 'User',
            
        ],
    ],

    'schedule' => [
        'title' => 'Schedules',

        'actions' => [
            'index' => 'Schedules',
            'create' => 'New Schedule',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'start_at' => 'Start at',
            'tour_id' => 'Tour',
            
        ],
    ],

    'tour' => [
        'title' => 'Tours',

        'actions' => [
            'index' => 'Tours',
            'create' => 'New Tour',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'creator_id' => 'Creator',
            'description' => 'Description',
            'duration' => 'Duration',
            'duration_type_id' => 'Duration type',
            'exclude_services' => 'Exclude services',
            'images' => 'Images',
            'include_services' => 'Include services',
            'is_active' => 'Is active',
            'is_draft' => 'Is draft',
            'is_hot' => 'Is hot',
            'movement_type_id' => 'Movement type',
            'payment_type_id' => 'Payment type',
            'preview_image' => 'Preview image',
            'prices' => 'Prices',
            'rating' => 'Rating',
            'start_comment' => 'Start comment',
            'start_latitude' => 'Start latitude',
            'start_longitude' => 'Start longitude',
            'start_place' => 'Start place',
            'title' => 'Title',
            'tour_object_id' => 'Tour object',
            'tour_type_id' => 'Tour type',
            'verified_at' => 'Verified at',
            
        ],
    ],

    'tourist-agency' => [
        'title' => 'Tourist Agencies',

        'actions' => [
            'index' => 'Tourist Agencies',
            'create' => 'New Tourist Agency',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'phone' => 'Phone',
            'title' => 'Title',
            
        ],
    ],

    'tourist-group' => [
        'title' => 'Tourist Groups',

        'actions' => [
            'index' => 'Tourist Groups',
            'create' => 'New Tourist Group',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'additional_info' => 'Additional info',
            'areas_of_rf' => 'Areas of rf',
            'charge_batteries' => 'Charge batteries',
            'children_ages' => 'Children ages',
            'children_count' => 'Children count',
            'dangerous_route_section' => 'Dangerous route section',
            'date_and_method_communication_sessions' => 'Date and method communication sessions',
            'date_and_method_informing' => 'Date and method informing',
            'difficulty_category' => 'Difficulty category',
            'emergency_exit_routest' => 'Emergency exit routest',
            'final_destination_point' => 'Final destination point',
            'first_aid_equipment' => 'First aid equipment',
            'foreigners_count' => 'Foreigners count',
            'foreigners_countries' => 'Foreigners countries',
            'insurance' => 'Insurance',
            'loding_points' => 'Loding points',
            'medical_professionals' => 'Medical professionals',
            'mobile_devices' => 'Mobile devices',
            'radio_station' => 'Radio station',
            'registration_at' => 'Registration at',
            'return_at' => 'Return at',
            'route_distance' => 'Route distance',
            'satelite_phone' => 'Satelite phone',
            'start_at' => 'Start at',
            'start_point' => 'Start point',
            'summary_members_count' => 'Summary members count',
            'tourist_agency_id' => 'Tourist agency',
            'tourist_guide_id' => 'Tourist guide',
            
        ],
    ],

    'tourist-guide' => [
        'title' => 'Tourist Guides',

        'actions' => [
            'index' => 'Tourist Guides',
            'create' => 'New Tourist Guide',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'address' => 'Address',
            'birthday' => 'Birthday',
            'home_phone' => 'Home phone',
            'mobile_phone' => 'Mobile phone',
            'name' => 'Name',
            'office_phone' => 'Office phone',
            'relative_contact_information' => 'Relative contact information',
            'sname' => 'Sname',
            'tname' => 'Tname',
            
        ],
    ],

    'tourist-member' => [
        'title' => 'Tourist Members',

        'actions' => [
            'index' => 'Tourist Members',
            'create' => 'New Tourist Member',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'address' => 'Address',
            'birthday' => 'Birthday',
            'full_name' => 'Full name',
            'phone' => 'Phone',
            'tourist_group_id' => 'Tourist group',
            
        ],
    ],

    'tour-object' => [
        'title' => 'Tour Objects',

        'actions' => [
            'index' => 'Tour Objects',
            'create' => 'New Tour Object',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'address' => 'Address',
            'comment' => 'Comment',
            'creator_id' => 'Creator',
            'description' => 'Description',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'photos' => 'Photos',
            'title' => 'Title',
            'tour_guide_id' => 'Tour guide',
            
        ],
    ],

    'transaction' => [
        'title' => 'Transactions',

        'actions' => [
            'index' => 'Transactions',
            'create' => 'New Transaction',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'amount' => 'Amount',
            'booking_id' => 'Booking',
            'description' => 'Description',
            'status_type_id' => 'Status type',
            'user_id' => 'User',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];