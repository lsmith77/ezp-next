<?php
/**
 * File containing a test class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Server\Tests\Input\Parser;

use eZ\Publish\Core\REST\Server\Input\Parser\ObjectStateGroupCreate;

class ObjectStateGroupCreateTest extends BaseTest
{
    /**
     * Tests the ObjectStateGroupCreateTest parser
     */
    public function testParse()
    {
        $inputArray = array(
            'identifier' => 'test-group',
            'defaultLanguageCode' => 'eng-GB',
            'names' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group'
                    )
                )
            ),
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $result = $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );

        $this->assertInstanceOf(
            '\\eZ\\Publish\\API\\Repository\\Values\\ObjectState\\ObjectStateGroupCreateStruct',
            $result,
            'ObjectStateGroupCreateStruct not created correctly.'
        );

        $this->assertEquals(
            'test-group',
            $result->identifier,
            'ObjectStateGroupCreateStruct identifier property not created correctly.'
        );

        $this->assertEquals(
            'eng-GB',
            $result->defaultLanguageCode,
            'ObjectStateGroupCreateStruct defaultLanguageCode property not created correctly.'
        );

        $this->assertEquals(
            array( 'eng-GB' => 'Test group' ),
            $result->names,
            'ObjectStateGroupCreateStruct names property not created correctly.'
        );

        $this->assertEquals(
            array( 'eng-GB' => 'Test group description' ),
            $result->descriptions,
            'ObjectStateGroupCreateStruct descriptions property not created correctly.'
        );
    }

    /**
     * Test ObjectStateGroupCreate parser throwing exception on missing identifier
     *
     * @expectedException \eZ\Publish\Core\REST\Common\Exceptions\Parser
     * @expectedExceptionMessage Missing 'identifier' attribute for ObjectStateGroupCreate.
     */
    public function testParseExceptionOnMissingIdentifier()
    {
        $inputArray = array(
            'defaultLanguageCode' => 'eng-GB',
            'names' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group'
                    )
                )
            ),
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * Test ObjectStateGroupCreate parser throwing exception on missing defaultLanguageCode
     *
     * @expectedException \eZ\Publish\Core\REST\Common\Exceptions\Parser
     * @expectedExceptionMessage Missing 'defaultLanguageCode' attribute for ObjectStateGroupCreate.
     */
    public function testParseExceptionOnMissingDefaultLanguageCode()
    {
        $inputArray = array(
            'identifier' => 'test-group',
            'names' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group'
                    )
                )
            ),
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * Test ObjectStateGroupCreate parser throwing exception on missing names
     *
     * @expectedException \eZ\Publish\Core\REST\Common\Exceptions\Parser
     * @expectedExceptionMessage Missing or invalid 'names' element for ObjectStateGroupCreate.
     */
    public function testParseExceptionOnMissingNames()
    {
        $inputArray = array(
            'identifier' => 'test-group',
            'defaultLanguageCode' => 'eng-GB',
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * Test ObjectStateGroupCreate parser throwing exception on invalid names structure
     *
     * @expectedException \eZ\Publish\Core\REST\Common\Exceptions\Parser
     * @expectedExceptionMessage Missing or invalid 'names' element for ObjectStateGroupCreate.
     */
    public function testParseExceptionOnInvalidNames()
    {
        $inputArray = array(
            'identifier' => 'test-group',
            'defaultLanguageCode' => 'eng-GB',
            'names' => array(),
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * Test ObjectStateGroupCreate parser throwing exception on invalid names structure with missing language code
     *
     * @expectedException \eZ\Publish\Core\REST\Common\Exceptions\Parser
     * @expectedExceptionMessage Missing '_languageCode' attribute for ObjectStateGroupCreate name.
     */
    public function testParseExceptionOnInvalidNamesNoLanguageCode()
    {
        $inputArray = array(
            'identifier' => 'test-group',
            'defaultLanguageCode' => 'eng-GB',
            'names' => array(
                'value' => array(
                    array(
                        '#text' => 'Test group'
                    )
                )
            ),
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * Test ObjectStateGroupCreate parser throwing exception on invalid names structure with missing value
     *
     * @expectedException \eZ\Publish\Core\REST\Common\Exceptions\Parser
     * @expectedExceptionMessage Missing value for ObjectStateGroupCreate name.
     */
    public function testParseExceptionOnInvalidNamesNoValue()
    {
        $inputArray = array(
            'identifier' => 'test-group',
            'defaultLanguageCode' => 'eng-GB',
            'names' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB'
                    )
                )
            ),
            'descriptions' => array(
                'value' => array(
                    array(
                        '_languageCode' => 'eng-GB',
                        '#text' => 'Test group description'
                    )
                )
            )
        );

        $objectStateGroupCreate = $this->getObjectStateGroupCreate();
        $objectStateGroupCreate->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * Returns the ObjectStateGroupCreate parser
     *
     * @return \eZ\Publish\Core\REST\Server\Input\Parser\ObjectStateGroupCreate
     */
    protected function getObjectStateGroupCreate()
    {
        return new ObjectStateGroupCreate( $this->getUrlHandler(), $this->getRepository()->getObjectStateService() );
    }
}
