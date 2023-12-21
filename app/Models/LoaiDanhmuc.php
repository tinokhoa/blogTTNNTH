<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LoaiDanhmuc
 * 
 * @property int $id
 * @property string $ten_loai
 * @property int $id_danhmuc
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $update_by
 * @property string|null $delete_by
 * 
 * @property Danhmuc $danhmuc
 * @property Collection|Batdongsan[] $batdongsans
 * @property Collection|Duan[] $duans
 *
 * @package App\Models
 */
class LoaiDanhmuc extends Model
{
	protected $table = 'loai_danhmuc';
	public $timestamps = false;

	protected $casts = [
		'id_danhmuc' => 'int'
	];

	protected $fillable = [
		'ten_loai',
		'id_danhmuc',
		'created_by',
		'update_by',
		'delete_by'
	];

	public function danhmuc()
	{
		return $this->belongsTo(Danhmuc::class, 'id_danhmuc');
	}

	public function batdongsans()
	{
		return $this->hasMany(Batdongsan::class, 'id_loaidanhmuc');
	}

	public function duans()
	{
		return $this->hasMany(Duan::class, 'id_loaidanhmuc');
	}
}
