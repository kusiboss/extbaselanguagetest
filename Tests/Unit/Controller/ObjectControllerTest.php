<?php
namespace Webwaren\Extbaselangtest\Tests\Unit\Controller;

/**
 * Test case.
 */
class ObjectControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Webwaren\Extbaselangtest\Controller\ObjectController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Webwaren\Extbaselangtest\Controller\ObjectController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }



    /**
     * @test
     */
    public function listActionFetchesAllObjectsFromRepositoryAndAssignsThemToView()
    {

        $allObjects = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $objectRepository = $this->getMockBuilder(\Webwaren\Extbaselangtest\Domain\Repository\ObjectRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $objectRepository->expects(self::once())->method('findAll')->will(self::returnValue($allObjects));
        $this->inject($this->subject, 'objectRepository', $objectRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('objects', $allObjects);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
