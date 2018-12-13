<?php
namespace Pluswerk\Simpleblog\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AuthorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Pluswerk\Simpleblog\Domain\Model\Author
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Pluswerk\Simpleblog\Domain\Model\Author();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFullnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFullname()
        );
    }

    /**
     * @test
     */
    public function setFullnameForStringSetsFullname()
    {
        $this->subject->setFullname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'fullname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmialReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmial()
        );
    }

    /**
     * @test
     */
    public function setEmialForStringSetsEmial()
    {
        $this->subject->setEmial('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'emial',
            $this->subject
        );
    }
}
