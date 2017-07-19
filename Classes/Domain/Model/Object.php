<?php
namespace Webwaren\Extbaselangtest\Domain\Model;

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
 * Object
 */
class Object extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var int
     */
    protected $l10nParent;


    /**
     * _languageUid
     * @var int
     */
    protected $_languageUid;


    /**
     * property1
     *
     * @var string
     */
    protected $property1 = '';

    /**
     * property2
     *
     * @var string
     */
    protected $property2 = '';

    /**
     * Returns the property1
     *
     * @return string $property1
     */
    public function getProperty1()
    {
        return $this->property1;
    }

    /**
     * Sets the property1
     *
     * @param string $property1
     * @return void
     */
    public function setProperty1($property1)
    {
        $this->property1 = $property1;
    }

    /**
     * Returns the property2
     *
     * @return string $property2
     */
    public function getProperty2()
    {
        return $this->property2;
    }

    /**
     * Sets the property2
     *
     * @param string $property2
     * @return void
     */
    public function setProperty2($property2)
    {
        $this->property2 = $property2;
    }

    /**
     * @return int
     */
    public function getTranslationParent()
    {
        return $this->l10nParent;
    }

    /**
     * @param int $obj
     * @return void
     */
    public function setTranslationParent($obj)
    {
        $this->l10nParent = $obj;
    }

    /**
     * @param int $_languageUid
     * @return void
     */
    public function setLanguageUid($_languageUid) {
        $this->_languageUid = $_languageUid;
    }

    /**
     * @return int
     */
    public function getLanguageUid() {
        return $this->_languageUid;
    }

    /**
     * Set values
     *
     * @param array
     * @return void
     */
    public function setValues(array $values)
    {
        if (isset($values['identifier'])){
            $this->identifier = $values['identifier'];
        }
        if (isset($values['property1'])){
            $this->property1 = $values['property1'];
        }
        if (isset($values['property2'])){
            $this->property2 = $values['property2'];
        }
        if (isset($values['property1_fr'])){
            $this->property1 = $values['property1_fr'];
        }
        if (isset($values['property2_fr'])){
            $this->property2 = $values['property2_fr'];
        }
    }

}
