<?php
namespace Webwaren\Extbaselangtest\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ObjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Webwaren\Extbaselangtest\Domain\Model\Object
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Webwaren\Extbaselangtest\Domain\Model\Object();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }



    /**
     * @test
     */
    public function getProperty1ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getProperty1()
        );
    }

    /**
     * @test
     */
    public function setProperty1ForStringSetsProperty1()
    {
        $this->subject->setProperty1('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'property1',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getProperty2ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getProperty2()
        );
    }

    /**
     * @test
     */
    public function setProperty2ForStringSetsProperty2()
    {
        $this->subject->setProperty2('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'property2',
            $this->subject
        );
    }
}
