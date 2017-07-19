<?php
namespace Webwaren\Extbaselangtest\Task;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Markus Boss <mboss@webwaren.ch>, Webwaren
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * FileController
 */

class Task extends \TYPO3\CMS\Scheduler\Task\AbstractTask
{
    const ID_DE = 0;
    const ID_FR = 1;
    const ID_IT = 2;
    const ID_EN = 3;


    /**
     * Task Start
     *
     * @return bool
    */
    public function execute()
    {
        return $this->importObjects();
    }

    /**
     * Import objects.
     *
     * @return bool
     */
    protected function importObjects() {
        $success = false;
        //$objects = $this->getObjectsFromXml();


        // prepare objects to save (results in two objects, each with a translation)
        $items[0][0]['identifier'] = 'object1';
        $items[0][0]['property1'] = 'Property 1 object1';
        $items[0][0]['property2'] = 'Property 2 object1';
        $items[0][1]['property1_fr'] = 'Property 1 object1 FR';
        $items[0][1]['property2_fr'] = 'Property 2 object1 FR';

        $items[1][0]['identifier'] = 'object2';
        $items[1][0]['property1'] = 'Property 1 object2';
        $items[1][0]['property2'] = 'Property 2 object2';
        $items[1][1]['property1_fr'] = 'Property 1 object2 FR ';
        $items[1][1]['property2_fr'] = 'Property 2 object2 FR ';

        if (is_array($items)) {
            $success = $this->saveObjects($items);
            return $success;
        }
    }



    /**
     * Save the objects.
     *
     * @param array $courses
     * @return bool
     */
    protected function saveObjects(array $items) {
        foreach ($items as $item) {
            if (is_array($item)) {

                $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');

                $persistenceManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager');
                $objectRepository = $objectManager->get('Webwaren\\Extbaselangtest\\Domain\\Repository\\ObjectRepository');


                // lookup object by field identifier
                $object = $objectRepository->findByIdentifier($item[self::ID_DE]['identifier'])->getFirst();

                if ($object) {
                    // if it does exist, update it
                    $object->_setProperty('_languageUid', self::ID_DE);
                    $object->setValues($item[self::ID_DE]);
                    $objectRepository->update($object);

                } else {
                    // if it doesn't exist, add it
                    $object = new \Webwaren\Extbaselangtest\Domain\Model\Object();
                    $object->_setProperty('_languageUid', self::ID_DE);
                    $object->setValues($item[self::ID_DE]);
                    $objectRepository->add($object);

                }

                $persistenceManager->persistAll();

                if ($object) {

                    // lookup for a translated object
                    $translatedObject = $objectRepository->findTranslation($object, self::ID_FR)->getFirst();

                    if ($translatedObject) {
                        // if it does exist, update it
                        $translatedObject->setTranslationParent($object);
                        $translatedObject->setLanguageUid(self::ID_FR);
                        $translatedObject->setValues($item[self::ID_DE]);
                        $translatedObject->setValues($item[self::ID_FR]);
                        $objectRepository->update($translatedObject);

                    } else {
                        // if it doesn't exist, add it
                        $translatedObject = new \Webwaren\Extbaselangtest\Domain\Model\Object();
                        $translatedObject->setTranslationParent($object);
                        $translatedObject->setLanguageUid(self::ID_FR);
                        $translatedObject->setValues($item[self::ID_DE]);
                        $translatedObject->setValues($item[self::ID_FR]);
                        $objectRepository->add($translatedObject);
                        $persistenceManager->persistAll();
                    }

                    $persistenceManager->persistAll();
                }
            }
        }
        return true;
    }
}
