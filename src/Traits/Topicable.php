<?php

namespace BlueFactory\QAModelIntegration\Traits;

trait Topicable
{
	public function topics()
	{
		return $this->morphMany(\BlueFactory\QAModelIntegration\Models\Topic::class, 'morphable');
	}
}