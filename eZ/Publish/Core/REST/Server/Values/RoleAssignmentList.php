<?php
/**
 * File containing the RoleAssignmentList class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Values;

/**
 * Role assignment list view model
 */
class RoleAssignmentList
{
    /**
     * Role assignments
     *
     * @var array
     */
    public $roleAssignments;

    /**
     * User or user group ID to which the roles are assigned
     *
     * @var mixed
     */
    public $id;

    /**
     * Indicator if the role assignment is for user group
     *
     * @var bool
     */
    public $isGroupAssignment;

    /**
     * Construct
     *
     * @param array $roleAssignments
     * @param mixed $id
     * @param bool $isGroupAssignment
     */
    public function __construct( array $roleAssignments, $id, $isGroupAssignment = false )
    {
        $this->roleAssignments = $roleAssignments;
        $this->id = $id;
        $this->isGroupAssignment = $isGroupAssignment;
    }
}

