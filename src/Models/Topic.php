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

    public function categories()
    {
        return $this->belongsToMany('BlueFactory\QAModelIntegration\Models\TopicCategory', 'topics_to_topic_categories', 'topic_id', 'topic_category_id');
    }
}
