<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class LogReport 
{
    protected $bundle;
    protected $metadata;

    public function getBundle() {
        return $this->bundle;
    }

    public function setBundle($bundle) {
        $this->bundle = $bundle;
        return $this;
    }

    public function getMetadata() {
        return $this->metadata;
    }

    public function setMetadata($metadata) {
        $this->metadata = $metadata;
        return $this;
    }
}
