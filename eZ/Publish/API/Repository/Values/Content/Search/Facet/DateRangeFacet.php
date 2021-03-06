<?php
/**
 * File containing the eZ\Publish\API\Repository\Values\Content\Search\Facet\DateRangeFacet class.
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace eZ\Publish\API\Repository\Values\Content\Search\Facet;

use eZ\Publish\API\Repository\Values\Content\Search\Facet;


/**
 * This calss represents a date range facet holding counts for content in the built date ranges.
 */
class DateRangeFacet extends Facet {

    /**
     * The date invervals with statitical data
     *
     * @var \eZ\Publish\API\Repository\Values\Content\Search\Facet\RangeFacetEntry
     */
    public $entries;
}