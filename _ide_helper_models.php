<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Domain\Router\Models{
/**
 * App\Domain\Router\Models\Router
 *
 * @property int $id
 * @property string $name
 * @property string $host
 * @property int $port
 * @property string $user
 * @property \App\Domain\Router\Enums\Platform $platform
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Router newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Router newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Router query()
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Router whereUser($value)
 */
	class Router extends \Eloquent {}
}

namespace App\Domain\User\Models{
/**
 * App\Domain\User\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

