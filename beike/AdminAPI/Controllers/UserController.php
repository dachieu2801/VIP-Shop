<?php


namespace Beike\AdminAPI\Controllers;

class UserController
{
    public function me()
    {
        return registry('admin_user');
    }
}
