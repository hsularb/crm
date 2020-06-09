<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_statuses';

    protected $fillable = ['name'];

    public function project()
    {
        return $this->hasMany(Project::class);
    }

}
