<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'avatar',
        'avatar_temporary',
        'bio',
        'location',
        'website',
        'github',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
        'job_title',
        'company',
        'education',
        'branding_color',
        'branding_color_dark',
        'is_banned',
        'is_first_login',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function getRandomAvatarColorSet(): array
    {
        $colorSets = [
            ['bg' => 'E91E63', 'text' => 'FFFFFF'], // Pink
            ['bg' => '9C27B0', 'text' => 'FFFFFF'], // Purple
            ['bg' => '3F51B5', 'text' => 'FFFFFF'], // Indigo
            ['bg' => '2196F3', 'text' => 'FFFFFF'], // Blue
            ['bg' => '03A9F4', 'text' => 'FFFFFF'], // Light Blue
            ['bg' => '00BCD4', 'text' => 'FFFFFF'], // Cyan
            ['bg' => '009688', 'text' => 'FFFFFF'], // Teal
            ['bg' => '4CAF50', 'text' => 'FFFFFF'], // Green
            ['bg' => '8BC34A', 'text' => '000000'], // Light Green
            ['bg' => 'CDDC39', 'text' => '000000'], // Lime
            ['bg' => 'FFEB3B', 'text' => '000000'], // Yellow
            ['bg' => 'FFC107', 'text' => '000000'], // Amber
            ['bg' => 'FF9800', 'text' => 'FFFFFF'], // Orange
            ['bg' => 'FF5722', 'text' => 'FFFFFF'], // Deep Orange
            ['bg' => 'F44336', 'text' => 'FFFFFF'], // Red
            ['bg' => 'E64A19', 'text' => 'FFFFFF'], // Dark Orange
            ['bg' => 'D32F2F', 'text' => 'FFFFFF'], // Dark Red
            ['bg' => 'C2185B', 'text' => 'FFFFFF'], // Dark Pink
        ];

        return $colorSets[array_rand($colorSets)];
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            if (empty($user->avatar) && empty($user->avatar_temporary)) {
                $colors = self::getRandomAvatarColorSet();
                $name = urlencode($user->name ?? $user->username ?? 'User');

                $user->avatar_temporary = "https://ui-avatars.com/api/?name={$name}&background={$colors['bg']}&color={$colors['text']}";
            }
        });
    }



    public function ban()
    {
        $this->is_banned = true;
        $this->save();
    }

    public function unban()
    {
        $this->is_banned = false;
        $this->save();
    }

    public function isBanned()
    {
        return $this->is_banned;
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isPremium()
    {
        return $this->role === 'premium';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function isFollowing(User $user): bool
    {
        return $this->following()->where('follower_id', $user->id)->exists();
    }

    public function isFollowedBy(User $user): bool
    {
        return $this->followers()->where('user_id', $user->id)->exists();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function followedTags()
    {
        return $this->belongsToMany(Tag::class)->withPivot('action')->wherePivot('action', 'follow');
    }

    public function hiddenTags()
    {
        return $this->belongsToMany(Tag::class)->withPivot('action')->wherePivot('action', 'hide');
    }


    public function isFollowedTag(Tag $tag): bool
    {
        return $this->followedTags()->where('tag_id', $tag->id)->exists();
    }

    public function isHiddenTag(Tag $tag): bool
    {
        return $this->hiddenTags()->where('tag_id', $tag->id)->exists();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function postReactions()
    {
        return $this->hasMany(PostReaction::class);
    }


}
