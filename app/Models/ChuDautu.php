<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChuDautu
 * 
 * @property int $id
 * @property string $ten
 * @property int $hinhanh
 * @property string $diachi
 * @property string|null $thongtin
 * @property int $trangthai
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $update_by
 * 
 * @property Collection|ChitietBatdongsan[] $chitiet_batdongsans
 * @property Collection|Duan[] $duans
 *
 * @package App\Models
 */
class ChuDautu extends Model
{
	protected $table = 'chu_dautu';
	public $timestamps = false;

	protected $casts = [
		'hinhanh' => 'int',
		'trangthai' => 'int'
	];

	protected $fillable = [
		'ten',
		'hinhanh',
		'diachi',
		'thongtin',
		'trangthai',
		'created_by',
		'update_by'
	];

	public function chitiet_batdongsans()
	{
		return $this->hasMany(ChitietBatdongsan::class, 'id_chudautu');
	}

	public function duans()
	{
		return $this->hasMany(Duan::class, 'id_chudautu');
	}
}
