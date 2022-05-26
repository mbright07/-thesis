<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subcategory[] $subCategory
 * @property-read int|null $sub_category_count
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HomeCategory
 *
 * @property int $id
 * @property string $sel_categories
 * @property int $no_of_jobs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereNoOfJobs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereSelCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeCategory whereUpdatedAt($value)
 */
	class HomeCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HomeSlider
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $salary
 * @property string $link
 * @property string $image
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomeSlider whereUpdatedAt($value)
 */
	class HomeSlider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $short_description
 * @property string $description
 * @property string $regular_salary
 * @property string|null $fix_salary
 * @property string $SKU
 * @property string $stock_status
 * @property int $featured
 * @property int $quantity
 * @property string|null $image
 * @property string|null $images
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $sub_category_id
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RecruitmentJob[] $recruitmentJobs
 * @property-read int|null $recruitment_jobs_count
 * @property-read \App\Models\Subcategory|null $subCategory
 * @method static \Database\Factories\JobFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereFixSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereRegularSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSKU($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereStockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Recruitment
 *
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $mobile
 * @property string $email
 * @property string $intro
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $file
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $processed_date
 * @property string|null $canceled_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RecruitmentJob[] $recruitmentJob
 * @property-read int|null $recruitment_job_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereCanceledDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereProcessedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Recruitment whereUserId($value)
 */
	class Recruitment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RecruitmentJob
 *
 * @property int $id
 * @property int $job_id
 * @property int $recruitment_id
 * @property string $salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $rstatus
 * @property-read \App\Models\Job $job
 * @property-read \App\Models\Recruitment $recruitment
 * @property-read \App\Models\Review|null $review
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereRecruitmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereRstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecruitmentJob whereUpdatedAt($value)
 */
	class RecruitmentJob extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $rating
 * @property string $comment
 * @property int|null $recruitment_job_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\RecruitmentJob|null $recruitmentJob
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRecruitmentJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $phone2
 * @property string $address
 * @property string $map
 * @property string $twitter
 * @property string $facebook
 * @property string $pinterest
 * @property string $instagram
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePinterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subcategory
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subcategory whereUpdatedAt($value)
 */
	class Subcategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property string $utype ADM for Admin and USR for User or Customer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUtype($value)
 */
	class User extends \Eloquent {}
}

