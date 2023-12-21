<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class User
 *
 * @property int $id
 * @property string $ten
 * @property string $password
 * @property int|null $sdt
 * @property string $hinhanh
 * @property int $trang_thai
 * @property int $phan_quyen
 * @property string $email
 * @property string $diachi1
 * @property string|null $diachi2
 * @property string|null $thong_tin
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $update_by
 * @property string|null $delete_by
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $casts = [
        'sdt' => 'int',
        'trang_thai' => 'int',
        'phan_quyen' => 'int'
    ];

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'ten',
        'password',
        'sdt',
        'hinhanh',
        'trang_thai',
        'phan_quyen',
        'email',
        'diachi1',
        'diachi2',
        'thong_tin',
        'created_by',
        'update_by',
        'delete_by'
    ];
}

