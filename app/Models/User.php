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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',  // thêm username vào đây
        'email',
        'password',
    ];

    // Định nghĩa khóa chính cho đăng nhập
    public function getAuthIdentifierName()
    {
        return 'username'; // Sử dụng username thay cho email
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
        // Cấu hình kiểu dữ liệu cho các thuộc tính
        protected $casts = [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
}