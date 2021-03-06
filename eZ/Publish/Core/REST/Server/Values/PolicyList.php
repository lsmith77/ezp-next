<?php
/**
 * File containing the PolicyList class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Values;

/**
 * Policy list view model
 */
class PolicyList
{
    /**
     * Role ID
     *
     * @var mixed
     */
    public $roleId;

    /**
     * Policies
     *
     * @var array
     */
    public $policies;

    /**
     * Construct
     *
     * @param array $policies
     * @param mixed $roleId
     */
    public function __construct( array $policies, $roleId = null )
    {
        $this->policies = $policies;
        $this->roleId = $roleId;
    }
}

