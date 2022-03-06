<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid as RamseyUuid;

trait Uuid
{
    public static function boot(): void
    {
        parent::boot();

        static::creating(function($object) {
            $object->id = RamseyUuid::uuid4()->toString();
        });
    }
}
