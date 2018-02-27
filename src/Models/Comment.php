<?php

namespace BlueFactory\QAModelIntegration\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'topic_comments';

    public function topic()
    {
        return $this->belongsTo('BlueFactory\QAModelIntegration\Models\Topic');
    }

    public function author()
    {
        return $this->morphTo();
    }

    public function replyTo()
    {
        return $this->morphTo();
    }
}
