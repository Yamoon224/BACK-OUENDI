<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Credit
 * 
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property string|null $status
 * @property Carbon|null $approval_at
 * @property Carbon|null $rejection_at
 * @property Carbon|null $request_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Credit extends Model
{
	use SoftDeletes;

	protected $casts = [
		'user_id' => 'int',
		'amount' => 'float',
		'approval_at' => 'datetime',
		'rejection_at' => 'datetime',
		'request_at' => 'datetime'
	];

	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
