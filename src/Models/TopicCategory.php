<?php

namespace BlueFactory\QAModelIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    protected $table = 'topic_categories';

    protected $fillable = ['title', 'topic_category_id', 'level', 'root_category_id'];

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

    public function scopeLoadParents($builder)
    {
        return $builder->with('parent.parent.parent.parent');
    }

    public function scopeLoadChildren($builder)
    {
        return $builder->with('children.children.children.children');
    }

    public function scopeNotDescendantOf($builder, $id, $level)
    {
        return $builder->where(function($q) use ($id, $level) {
            return $q->whereNull('topic_categories.root_category_id')
                    ->orWhere(function($q1) use ($id) {
                        return $q1->whereNotNull('topic_categories.root_category_id')
                                ->where('topic_categories.root_category_id', '!=', $id);
                    })
                    ->orWhere(function($q1) use ($id, $level) {
                        return $q1->whereNotNull('topic_categories.root_category_id')
                                ->where('topic_categories.root_category_id', $id)
                                ->where('topic_categories.level', '<=', $level);
                    });
        });
    }
}
