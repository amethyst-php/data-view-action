<?php

namespace Amethyst\Authorizers;

use Railken\Lem\Authorizer;
use Railken\Lem\Tokens;

class DataViewActionAuthorizer extends Authorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'data-view-action.create',
        Tokens::PERMISSION_UPDATE => 'data-view-action.update',
        Tokens::PERMISSION_SHOW   => 'data-view-action.show',
        Tokens::PERMISSION_REMOVE => 'data-view-action.remove',
    ];
}
