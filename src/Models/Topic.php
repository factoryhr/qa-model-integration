<?php

namespace BlueFactory\QAModelIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    public function morphable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->hasMany('BlueFactory\QAModelIntegration\Models\Comment');
    }
}
