<?php
/**
 * File containing the eZ\Publish\API\Repository\Values\User\RoleAssignment class.
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\API\Repository\Values\User;

use eZ\Publish\API\Repository\Values\ValueObject;

/**
 * This value object represents an assignment od a user or user group to a role including a limitation
 *
 * @property-read \eZ\Publish\API\Repository\Values\User\Limitation\RoleLimitation $limitation the limitation of this role assignment
 * @property-read \eZ\Publish\API\Repository\Values\User\Role $role the role which is assigned to the user or user group
 */
abstract class RoleAssignment extends ValueObject
{
    /**
     * returns the limitation of the role assignment
     *
     * @return \eZ\Publish\API\Repository\Values\User\Limitation\RoleLimitation
     */
    abstract public function getRoleLimitation();

    /**
     * returns the role to which the user or user group is assigned to
     * @return \eZ\Publish\API\Repository\Values\User\Role
     */
    abstract public function getRole();
}
