<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tinh
 * 
 * @property int $id
 * @property string $ten_tinh
 * @property Carbon $created_at
 * 
 * @property Collection|Huyen[] $huyens
 *
 * @package App\Models
 */
class Tinh extends Model
{
	protected $table = 'tinh';
	public $timestamps = false;

	protected $fillable = [
		'ten_tinh'
	];

	public function huyens()
	{
		return $this->hasMany(Huyen::class, 'id_tinh');
	}
}
