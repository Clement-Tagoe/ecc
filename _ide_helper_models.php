<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agency whereUpdatedAt($value)
 */
	class Agency extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $number
 * @property string $shift
 * @property string $start_time
 * @property string $end_time
 * @property int $user_id
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereShift($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CallLog whereUserId($value)
 */
	class CallLog extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $reporting_time
 * @property string $reporting_date
 * @property int $agency_id
 * @property int $region_id
 * @property string $location
 * @property string $contact
 * @property string $description
 * @property string $action_taken
 * @property string $feedback
 * @property int $user_id
 * @property string $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereActionTaken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereAgencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereReportingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereReportingTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmergencyCase whereUserId($value)
 */
	class EmergencyCase extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role $role
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

