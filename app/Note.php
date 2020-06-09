<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable = ['note','project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
