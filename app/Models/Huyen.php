<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Huyen
 *
 * @property int $id
 * @property string $ten_huyen
 * @property int $id_tinh
 * @property Carbon $created_at
 *
 * @property Tinh $tinh
 * @property Collection|ChitietBatdongsan[] $chitiet_batdongsans
 * @property Collection|Duan[] $duans
 *
 * @package App\Models
 */
class Huyen extends Model
{
	protected $table = 'huyen';
	public $timestamps = false;

	protected $casts = [
		'id_tinh' => 'int'
	];

	protected $fillable = [
		'ten_huyen',
		'id_tinh'
	];

    public function tinhs()
    {
        return $this->hasMany(Tinh::class);
    }

	public function chitiet_batdongsans()
	{
		return $this->hasMany(ChitietBatdongsan::class, 'id_huyen');
	}

	public function duans()
	{
		return $this->hasMany(Duan::class, 'id_huyen');
	}
}
