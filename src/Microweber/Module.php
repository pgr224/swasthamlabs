<?php

class Module extends BaseModel
{
    public $table = 'modules';

    // called once when Post is first used
    public static function boot()
    {
        // there is some logic in this method, so don't forget this!
        parent::boot();
    }

    public function notifications()
    {
        return $this->morphMany('Notifications', 'rel');
    }
}
