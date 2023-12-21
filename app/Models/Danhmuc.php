<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Danhmuc
 * 
 * @property int $id
 * @property string $ten_danhmuc
 * @property string|null $tieu_de
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * 
 * @property Collection|LoaiDanhmuc[] $loai_danhmucs
 *
 * @package App\Models
 */
class Danhmuc extends Model
{
	protected $table = 'danhmuc';
	public $timestamps = false;

	protected $fillable = [
		'ten_danhmuc',
		'tieu_de',
		'created_by',
		'updated_by'
	];

	public function loai_danhmucs()
	{
		return $this->hasMany(LoaiDanhmuc::class, 'id_danhmuc');
	}
}
