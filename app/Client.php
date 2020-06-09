<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['name','company','email','phone','website','address','status_id'];

    public function status()
    {
        return $this->belongsTo(ClientStatus::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
