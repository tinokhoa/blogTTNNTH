<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Batdongsan
 * 
 * @property int $id
 * @property string $ten_bds
 * @property string|null $tieu_de
 * @property int $id_loaidanhmuc
 * @property Carbon|null $ngay_batdau
 * @property Carbon|null $ngay_ketthuc
 * @property int $dientich
 * @property int $gia
 * @property string $hinhanh
 * @property string|null $created_by
 * @property Carbon $created_at
 * @property string|null $update_by
 * @property string|null $delete_by
 * 
 * @property LoaiDanhmuc $loai_danhmuc
 * @property Collection|ChitietBatdongsan[] $chitiet_batdongsans
 *
 * @package App\Models
 */
class Batdongsan extends Model
{
	protected $table = 'batdongsan';
	public $timestamps = false;

	protected $casts = [
		'id_loaidanhmuc' => 'int',
		'ngay_batdau' => 'datetime',
		'ngay_ketthuc' => 'datetime',
		'dientich' => 'int',
		'gia' => 'int'
	];

	protected $fillable = [
		'ten_bds',
		'tieu_de',
		'id_loaidanhmuc',
		'ngay_batdau',
		'ngay_ketthuc',
		'dientich',
		'gia',
		'hinhanh',
		'created_by',
		'update_by',
		'delete_by'
	];

	public function loai_danhmuc()
	{
		return $this->belongsTo(LoaiDanhmuc::class, 'id_loaidanhmuc');
	}

	public function chitiet_batdongsans()
	{
		return $this->hasMany(ChitietBatdongsan::class, 'id_bds');
	}
}
