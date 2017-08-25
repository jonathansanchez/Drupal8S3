<?php

namespace Drupal\author\Domain\Author;

class Status
{
    const ACTIVED = 1;
    const DEACTIVATED = 0;

    private $status;

    public static function active()
    {
        return new self(self::ACTIVED);
    }

    public static function deactivate()
    {
        return new self(self::DEACTIVATED);
    }

    private function __construct($aStatus)
    {
        $this->status = $aStatus;
    }

    public function equalsTo(self $aStatus)
    {
        return $this->status === $aStatus->status;
    }
}