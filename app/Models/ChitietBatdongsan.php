<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChitietBatdongsan
 * 
 * @property int $id
 * @property string|null $noidung
 * @property int $id_bds
 * @property int $gia_dukien
 * @property int $id_chudautu
 * @property string $diadiem
 * @property string|null $created_by
 * @property Carbon $created_at
 * @property string|null $update_by
 * @property int $phongngu
 * @property int $nhavesinh
 * @property int $dientich_nha
 * @property int $ham_dexe
 * @property int $sotang
 * @property int $dientich_dat
 * @property int $id_huyen
 * @property string|null $anhchitiet
 * 
 * @property ChuDautu $chu_dautu
 * @property Batdongsan $batdongsan
 * @property Huyen $huyen
 *
 * @package App\Models
 */
class ChitietBatdongsan extends Model
{
	protected $table = 'chitiet_batdongsan';
	public $timestamps = false;

	protected $casts = [
		'id_bds' => 'int',
		'gia_dukien' => 'int',
		'id_chudautu' => 'int',
		'phongngu' => 'int',
		'nhavesinh' => 'int',
		'dientich_nha' => 'int',
		'ham_dexe' => 'int',
		'sotang' => 'int',
		'dientich_dat' => 'int',
		'id_huyen' => 'int'
	];

	protected $fillable = [
		'noidung',
		'id_bds',
		'gia_dukien',
		'id_chudautu',
		'diadiem',
		'created_by',
		'update_by',
		'phongngu',
		'nhavesinh',
		'dientich_nha',
		'ham_dexe',
		'sotang',
		'dientich_dat',
		'id_huyen',
		'anhchitiet'
	];

	public function chu_dautu()
	{
		return $this->belongsTo(ChuDautu::class, 'id_chudautu');
	}

	public function batdongsan()
	{
		return $this->belongsTo(Batdongsan::class, 'id_bds');
	}

	public function huyen()
	{
		return $this->belongsTo(Huyen::class, 'id_huyen');
	}
}
