<?php
/**
 * File containing the Content class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\SPI\Persistence;

/**
 * Content value object, bound to a version.
 * This object aggregates the following:
 *  - Version metadata
 *  - Content metadata
 *  - Relations
 *  - Fields
 *  - Locations
 */
class Content extends ValueObject
{
    /**
     * VersionInfo object for this content's version.
     *
     * @var \eZ\Publish\SPI\Persistence\Content\VersionInfo
     */
    public $versionInfo;

    /**
     * ContentInfo object for this content.
     *
     * @var \eZ\Publish\SPI\Persistence\Content\ContentInfo
     */
    public $contentInfo;

    /**
     * Relation objects for this content.
     *
     * @var \eZ\Publish\SPI\Persistence\Content\Relation
     */
    public $relations;

    /**
     * Field objects for this content.
     *
     * @var \eZ\Publish\SPI\Persistence\Content\Field[]
     */
    public $fields;

    /**
     * @var \eZ\Publish\SPI\Persistence\Content\Location[]
     */
    public $locations = array();
}
