<?php

namespace BlueFactory\QAModelIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    protected $table = 'topic_categories';

    protected $fillable = ['title', 'topic_category_id', 'level'];

    public function topic()
    {
        return $this->belongsToMany('BlueFactory\QAModelIntegration\Models\Topic', 'topics_to_topic_categories', 'topic_category_id', 'topic_id');
    }

    public function parent()
    {
        return $this->belongsTo('BlueFactory\QAModelIntegration\Models\TopicCategory', 'topic_category_id');
    }

    public function children()
    {
        return $this->hasMany('BlueFactory\QAModelIntegration\Models\TopicCategory', 'topic_category_id');
    }

    public function scopeLoadChildren($builder)
    {
        return $builder->with('parent.parent.parent.parent');
    }

    public function scopeLoadParents($builder)
    {
        return $builder->with('children.children.children.children');
    }
}
