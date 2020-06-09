<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientStatus extends Model
{
	protected $table = 'client_statuses';

	protected $fillable = ['name'];

	public function client()
    {
        return $this->hasMany(Client::class);
    }
}
