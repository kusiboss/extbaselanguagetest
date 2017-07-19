<?php
namespace Webwaren\Extbaselangtest\Domain\Repository;

/***
 *
 * This file is part of the "Extbase Language Test" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * The repository for Objects
 */
class ObjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    public function initializeObject() {
        // get the settings
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');

        // modify the settings
        $querySettings->setIgnoreEnableFields(true);
        $querySettings->setRespectStoragePage(false);
        $querySettings->setRespectSysLanguage(false);

        // store the settings as default-values
        $this->setDefaultQuerySettings($querySettings);

    }

    /**
     * @param \Webwaren\Extbaselangtest\Domain\Model\Object $object
     * @param int $languageUid
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findTranslation($object, $languageUid) {

        $query = $this->createQuery();
        //$query->getQuerySettings()->setLanguageUid(1);

        $query->matching(
            $query->logicalAnd(
                $query->equals("l10n_parent", $object->getUid()),
                $query->equals("sys_language_uid",$languageUid)
            )
        );

        $result = $query->execute();

        return $result;
    }


    /**
     * @param string $identifier
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByIdentifier($identifier) {
        $query = $this->createQuery();

        $query->matching(
            $query->equals("identifier", $identifier)
        );

        $result = $query->execute();

        return $result;
    }

}
