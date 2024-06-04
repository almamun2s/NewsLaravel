<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Showing profile picture
     */
    public function getImg()
    {
        if ($this->photo != null) {
            return url('uploads/admin_images/' . $this->photo);
        } else {
            return url('uploads/no_profile_pic.png');
        }
    }

    public function news()
    {
        return $this->hasMany(NewsPost::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(NewsComment::class, 'user_id', 'id');
    }

    public static function getPermissionGroup()
    {
        return DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
    }
    public static function getPermissionByGroup(string $gropupName)
    {
        return DB::table('permissions')->select('name', 'id')->where('group_name', $gropupName)->get();
    }
    
    public static function roleHasPermissions($role, $permissions): bool
    {
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                return false;
            }
        }
        return true;
    }
}
