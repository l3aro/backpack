<?php

namespace Modules\Core\Enums;

final class UserTypeEnum extends BaseEnum
{
    const ADMIN = 1;
    const USER = 0;

    public function __construct()
    {
        parent::__construct();
        $this->labels = [
            self::ADMIN => __('Admin'),
            self::USER => __('User'),
        ];
    }
}
