<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['name','description','start_date','budget','client_id','status_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
