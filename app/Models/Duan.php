<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Duan
 * 
 * @property int $id
 * @property string $ten_duan
 * @property int $gia_dukien
 * @property Carbon $create_at
 * @property string|null $create_by
 * @property string $phap_ly
 * @property int $id_chudautu
 * @property int $id_huyen
 * @property int $id_loaidanhmuc
 * @property string $diadiem
 * @property string $anh_bia
 * @property Carbon|null $ngay_khoicong
 * @property Carbon|null $ngay_moban
 * @property string|null $hinh_anh
 * @property string|null $noidung
 * 
 * @property ChuDautu $chu_dautu
 * @property Huyen $huyen
 * @property LoaiDanhmuc $loai_danhmuc
 *
 * @package App\Models
 */
class Duan extends Model
{
	protected $table = 'duan';
	public $timestamps = false;

	protected $casts = [
		'gia_dukien' => 'int',
		'create_at' => 'datetime',
		'id_chudautu' => 'int',
		'id_huyen' => 'int',
		'id_loaidanhmuc' => 'int',
		'ngay_khoicong' => 'datetime',
		'ngay_moban' => 'datetime'
	];

	protected $fillable = [
		'ten_duan',
		'gia_dukien',
		'create_at',
		'create_by',
		'phap_ly',
		'id_chudautu',
		'id_huyen',
		'id_loaidanhmuc',
		'diadiem',
		'anh_bia',
		'ngay_khoicong',
		'ngay_moban',
		'hinh_anh',
		'noidung'
	];

	public function chu_dautu()
	{
		return $this->belongsTo(ChuDautu::class, 'id_chudautu');
	}

	public function huyen()
	{
		return $this->belongsTo(Huyen::class, 'id_huyen');
	}

	public function loai_danhmuc()
	{
		return $this->belongsTo(LoaiDanhmuc::class, 'id_loaidanhmuc');
	}
}
