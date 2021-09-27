<?php

namespace App\Models;

use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'email', 'password', 'first_name', 'last_name', 'image',
        'country_code', 'display_country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    /**
     * @var string
     */
    protected $guard_name = 'api';

    public function organizations()
    {
        return $this->belongsToMany(Office::class)
            ->withPivot('role_id')
            ->withTimestamps();
    }

    public function expertises()
    {
        return $this->belongsToMany(Expertise::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)
            ->whereNull('team_user.deleted_at')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function teamsUser()
    {
        return $this->hasMany(TeamUser::class);
    }

    public function myTeams()
    {
        return $this->hasMany(Team::class, 'teamlead_id');
    }

    public function applications()
    {
        return $this->hasMany(TeamApplication::class);
    }

    public function invites()
    {
        return $this->hasMany(TeamInvite::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function reviewer()
    {
        return $this->morphOne(Reviewer::class, 'reviewerable');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function details()
    {
        return $this->hasOne(UserDetails::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class)
            ->whereNull('event_user.deleted_at');
    }

    public function eventsUser()
    {
        return $this->hasMany(EventUser::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function chatEventUsers()
    {
        return $this->hasMany(ChatEventUser::class);
    }

    public function getImageUrlAttribute()
    {
        return empty($this->image) ? '' :
            cdnAsset($this->image);
    }

    /**
     * @return bool
     */
    public function acceptedPPAndTOS(): bool
    {
        if (!isset($this->agreed_with_tos)) {
            $user = app(UserRepository::class)->setAttributesFromUserDetails($this->getModel(), [
                'agreed_with_tos', 'agreed_with_pp',
            ]);

            $this->setModel($user);
        }

        return $this->agreed_with_tos && $this->agreed_with_pp;
    }

    public function getMyTeamsAttribute()
    {
        $teams = Cache::tags(['usersTeams'])->remember(
            UserRepository::getCacheKeyUserMyTeams($this->id),
            config('cache.ttl'),
            function () {
                return $this->myTeams()->get();
            });
        $this->setRelation('myTeams', $teams);

        return $teams;
    }

}
