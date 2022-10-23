<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Booking::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'fname' => $faker->sentence,
        'payed_at' => $faker->dateTime,
        'phone' => $faker->sentence,
        'sname' => $faker->sentence,
        'start_at' => $faker->dateTime,
        'tname' => $faker->sentence,
        'tour_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        'additional_services' => ['en' => $faker->sentence],
        'selected_prices' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Company::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'description' => $faker->text(),
        'inn' => $faker->sentence,
        'law_address' => $faker->sentence,
        'ogrn' => $faker->sentence,
        'photo' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dictionary::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'dictionary_type_id' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DictionaryType::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Document::class, static function (Faker\Generator $faker) {
    return [
        'approved_at' => $faker->dateTime,
        'company_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'description' => $faker->text(),
        'path' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'valid_to' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Favorite::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'tour_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Message::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'read_at' => $faker->dateTime,
        'tour_guide_id' => $faker->sentence,
        'transaction_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        'content' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Profile::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'fname' => $faker->sentence,
        'photo' => $faker->sentence,
        'sname' => $faker->sentence,
        'tname' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Review::class, static function (Faker\Generator $faker) {
    return [
        'comment' => $faker->text(),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'rating' => $faker->randomFloat,
        'tour_guide_id' => $faker->sentence,
        'tour_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        'images' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Schedule::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'start_at' => $faker->dateTime,
        'tour_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Tour::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'creator_id' => $faker->sentence,
        'deleted_at' => null,
        'description' => $faker->text(),
        'duration' => $faker->sentence,
        'duration_type_id' => $faker->sentence,
        'is_active' => $faker->boolean(),
        'is_draft' => $faker->boolean(),
        'is_hot' => $faker->boolean(),
        'movement_type_id' => $faker->sentence,
        'payment_type_id' => $faker->sentence,
        'preview_image' => $faker->sentence,
        'rating' => $faker->randomFloat,
        'start_comment' => $faker->text(),
        'start_latitude' => $faker->randomFloat,
        'start_longitude' => $faker->randomFloat,
        'start_place' => $faker->sentence,
        'title' => $faker->sentence,
        'tour_object_id' => $faker->sentence,
        'tour_type_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'verified_at' => $faker->dateTime,
        
        'exclude_services' => ['en' => $faker->sentence],
        'images' => ['en' => $faker->sentence],
        'include_services' => ['en' => $faker->sentence],
        'prices' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TouristAgency::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'phone' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TouristGroup::class, static function (Faker\Generator $faker) {
    return [
        'additional_info' => $faker->text(),
        'children_count' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'final_destination_point' => $faker->sentence,
        'foreigners_count' => $faker->randomNumber(5),
        'registration_at' => $faker->dateTime,
        'return_at' => $faker->dateTime,
        'route_distance' => $faker->randomFloat,
        'satelite_phone' => $faker->sentence,
        'start_at' => $faker->dateTime,
        'start_point' => $faker->sentence,
        'summary_members_count' => $faker->randomNumber(5),
        'tourist_agency_id' => $faker->sentence,
        'tourist_guide_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'areas_of_rf' => ['en' => $faker->sentence],
        'charge_batteries' => ['en' => $faker->sentence],
        'children_ages' => ['en' => $faker->sentence],
        'dangerous_route_section' => ['en' => $faker->sentence],
        'date_and_method_communication_sessions' => ['en' => $faker->sentence],
        'date_and_method_informing' => ['en' => $faker->sentence],
        'difficulty_category' => ['en' => $faker->sentence],
        'emergency_exit_routest' => ['en' => $faker->sentence],
        'first_aid_equipment' => ['en' => $faker->sentence],
        'foreigners_countries' => ['en' => $faker->sentence],
        'insurance' => ['en' => $faker->sentence],
        'loding_points' => ['en' => $faker->sentence],
        'medical_professionals' => ['en' => $faker->sentence],
        'mobile_devices' => ['en' => $faker->sentence],
        'radio_station' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TouristGuide::class, static function (Faker\Generator $faker) {
    return [
        'address' => $faker->sentence,
        'birthday' => $faker->date(),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'home_phone' => $faker->sentence,
        'mobile_phone' => $faker->sentence,
        'name' => $faker->firstName,
        'office_phone' => $faker->sentence,
        'sname' => $faker->sentence,
        'tname' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'relative_contact_information' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TouristMember::class, static function (Faker\Generator $faker) {
    return [
        'address' => $faker->sentence,
        'birthday' => $faker->date(),
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'full_name' => $faker->sentence,
        'phone' => $faker->sentence,
        'tourist_group_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TourObject::class, static function (Faker\Generator $faker) {
    return [
        'address' => $faker->sentence,
        'comment' => $faker->text(),
        'created_at' => $faker->dateTime,
        'creator_id' => $faker->sentence,
        'deleted_at' => null,
        'description' => $faker->text(),
        'latitude' => $faker->randomFloat,
        'longitude' => $faker->randomFloat,
        'title' => $faker->sentence,
        'tour_guide_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        'photos' => ['en' => $faker->sentence],
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Transaction::class, static function (Faker\Generator $faker) {
    return [
        'amount' => $faker->randomFloat,
        'booking_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'description' => $faker->text(),
        'status_type_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
