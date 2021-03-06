<?php
/**
 * File containing a test class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Tests\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Tests\Output\ValueObjectVisitorBaseTest;

use eZ\Publish\Core\REST\Server\Output\ValueObjectVisitor;
use eZ\Publish\Core\Repository\Values\Content;
use eZ\Publish\Core\REST\Common;

class RelationTest extends ValueObjectVisitorBaseTest
{
    /**
     * Test the Relation visitor
     *
     * @return string
     */
    public function testVisit()
    {
        $visitor   = $this->getRelationVisitor();
        $generator = $this->getGenerator();

        $generator->startDocument( null );

        $section = new Content\Relation( array(
            'id'         => 23,
            'sourceContentInfo' => new Content\ContentInfo( array(
                'id' => 1,
            ) ),
            'destinationContentInfo' => new Content\ContentInfo( array(
                'id' => 2,
            ) ),
            'type' => Content\Relation::COMMON
        ) );

        $visitor->visit(
            $this->getVisitorMock(),
            $generator,
            $section
        );

        $result = $generator->endDocument( null );

        $this->assertNotNull( $result );

        return $result;
    }

    /**
     * Test if result contains Relation element
     *
     * @param string $result
     * @depends testVisit
     */
    public function testResultContainsRelationElement( $result )
    {
        $this->assertTag(
            array(
                'tag'      => 'Relation',
                'children' => array(
                    'less_than'    => 4,
                    'greater_than' => 2,
                )
            ),
            $result,
            'Invalid <Relation> element.',
            false
        );
    }

    /**
     * Test if result contains Relation element attributes
     *
     * @param string $result
     * @depends testVisit
     */
    public function testResultContainsRelationAttributes( $result )
    {
        $this->assertTag(
            array(
                'tag'      => 'Relation',
                'attributes' => array(
                    'media-type' => 'application/vnd.ez.api.Relation+xml',
                    'href'       => '/content/objects/1/relations/23',
                )
            ),
            $result,
            'Invalid <Relation> attributes.',
            false
        );
    }

    /**
     * @param string $result
     * @depends testVisit
     */
    public function testResultContainsSourceContentElement( $result )
    {
        $this->assertTag(
            array(
                'tag'      => 'SourceContent',
                'attributes' => array(
                    'media-type' => 'application/vnd.ez.api.ContentInfo+xml',
                    'href'       => '/content/objects/1',
                )
            ),
            $result,
            'Invalid or non-existing <Relation> SourceContent element.',
            false
        );
    }

    /**
     * @param string $result
     * @depends testVisit
     */
    public function testResultContainsDestinationContentElement( $result )
    {
        $this->assertTag(
            array(
                'tag'      => 'DestinationContent',
                'attributes' => array(
                    'media-type' => 'application/vnd.ez.api.ContentInfo+xml',
                    'href'       => '/content/objects/2',
                )
            ),
            $result,
            'Invalid or non-existing <Relation> DestinationContent element.',
            false
        );
    }

    /**
     * @param string $result
     * @depends testVisit
     */
    public function testResultContainsRelationTypeElement( $result )
    {
        $this->assertTag(
            array(
                'tag'      => 'RelationType',
                'content'  => 'COMMON',
            ),
            $result,
            'Invalid or non-existing <Relation> RelationType value element.',
            false
        );
    }

    /**
     * Get the Relation visitor
     *
     * @return \eZ\Publish\Core\REST\Server\Output\ValueObjectVisitor\Relation
     */
    protected function getRelationVisitor()
    {
        return new ValueObjectVisitor\Relation(
            new Common\UrlHandler\eZPublish()
        );
    }
}
