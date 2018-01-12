<?php

namespace BlueFactory\QAModelIntegration\Traits;

trait TopicsAndComments
{
	public function topics()
	{
		return $this->morphMany(\BlueFactory\QAModelIntegration\Models\Topic::class, 'author');
	}

	public function comments()
	{
		return $this->morphMany(\BlueFactory\QAModelIntegration\Models\Comment::class, 'author');
	}
}