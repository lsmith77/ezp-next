<?php
/**
 * File containing the ObjectStateGroup ValueObjectVisitor class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Output\ValueObjectVisitor;

use eZ\Publish\Core\REST\Common\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Output\Generator;
use eZ\Publish\Core\REST\Common\Output\Visitor;

/**
 * ObjectStateGroup value object visitor
 */
class ObjectStateGroup extends ValueObjectVisitor
{
    /**
     * Visit struct returned by controllers
     *
     * @param \eZ\Publish\Core\REST\Common\Output\Visitor $visitor
     * @param \eZ\Publish\Core\REST\Common\Output\Generator $generator
     * @param mixed $data
     */
    public function visit( Visitor $visitor, Generator $generator, $data )
    {
        $generator->startObjectElement( 'ObjectStateGroup' );
        $visitor->setHeader( 'Content-Type', $generator->getMediaType( 'ObjectStateGroup' ) );

        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'objectstategroup', array( 'objectstategroup' => $data->id ) )
        );
        $generator->endAttribute( 'href' );

        $generator->startValueElement( 'identifier', $data->identifier );
        $generator->endValueElement( 'identifier' );

        $generator->startValueElement( 'defaultLanguageCode', $data->defaultLanguageCode );
        $generator->endValueElement( 'defaultLanguageCode' );

        $generator->startValueElement( 'languageCodes', implode( ',', $data->languageCodes ) );
        $generator->endValueElement( 'languageCodes' );

        $generator->startHashElement( 'names' );

        foreach ( $data->getNames() as $languageCode => $name )
        {
            $generator->startValueElement( 'value', $name, array( 'languageCode' => $languageCode ) );
            $generator->endValueElement( 'value' );
        }

        $generator->endHashElement( 'names' );

        $generator->startHashElement( 'descriptions' );

        foreach ( $data->getDescriptions() as $languageCode => $description )
        {
            $generator->startValueElement( 'value', $description, array( 'languageCode' => $languageCode ) );
            $generator->endValueElement( 'value' );
        }

        $generator->endHashElement( 'descriptions' );

        $generator->endObjectElement( 'ObjectStateGroup' );
    }
}
