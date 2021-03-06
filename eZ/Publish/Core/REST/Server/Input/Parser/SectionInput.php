<?php
/**
 * File containing the Parser class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Input\Parser;
use eZ\Publish\Core\REST\Common\Input\ParsingDispatcher;
use eZ\Publish\Core\REST\Common\UrlHandler;
use eZ\Publish\API\Repository\SectionService;
use eZ\Publish\Core\REST\Common\Exceptions;

/**
 * Base class for input parser
 */
class SectionInput extends Base
{
    /**
     * Section service
     *
     * @var \eZ\Publish\API\Repository\SectionService
     */
    protected $sectionService;

    /**
     * Construct from section service
     *
     * @param \eZ\Publish\Core\REST\Common\UrlHandler $urlHandler
     * @param \eZ\Publish\API\Repository\SectionService $sectionService
     */
    public function __construct( UrlHandler $urlHandler, SectionService $sectionService )
    {
        parent::__construct( $urlHandler );
        $this->sectionService = $sectionService;
    }

    /**
     * Parse input structure
     *
     * @param array $data
     * @param \eZ\Publish\Core\REST\Common\Input\ParsingDispatcher $parsingDispatcher
     * @return \eZ\Publish\API\Repository\Values\Content\SectionCreateStruct
     */
    public function parse( array $data, ParsingDispatcher $parsingDispatcher )
    {
        if ( !array_key_exists( 'name', $data ) )
        {
            throw new Exceptions\Parser( "Missing 'name' attribute for SectionInput." );
        }
        if ( !array_key_exists( 'identifier', $data ) )
        {
            throw new Exceptions\Parser( "Missing 'identifier' attribute for SectionInput." );
        }

        $sectionCreate = $this->sectionService->newSectionCreateStruct();
        $sectionCreate->name = $data['name'];
        $sectionCreate->identifier = $data['identifier'];

        return $sectionCreate;
    }
}

