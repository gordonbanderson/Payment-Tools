<?php
/**
 * Created by PhpStorm.
 * User: gordon
 * Date: 27/4/2561
 * Time: 14:34 น.
 */

namespace Suilven\PaymentTools\Helper;


use SilverStripe\ORM\DataObjectInterface;

class ModelArrayHelper
{
    /** @var array blacklist of array keys */
    private $blacklist = [];

    /** @var array whitelist of array keys */
    private $whitelist = [];

    /**
     * @param array $blacklist
     */
    public function setBlacklist($blacklist)
    {
        $this->blacklist = $blacklist;
    }

    /**
     * @param array $whitelist
     */
    public function setWhitelist($whitelist)
    {
        $this->whitelist = $whitelist;
    }

    /**
     * Filter an array by whitelist and blacklist.  Blacklist takes priority
     *
     * @param $payload associative array, the form payload
     */
    public function getFilteredArray($payload)
    {
        echo "<br/>**** Filtering " . print_r($payload, 1);
        $result = [];

        echo 'WL=' . print_r($this->whitelist, 1);

        // whitelist
        foreach($this->whitelist as $key) {
            if (isset($payload[$key])) {
                $result[$key] = $payload[$key];
            }
        }

        // blacklist
        foreach($this->blacklist as $key) {
            if (isset($payload[$key])) {
                unset($result[$key]);
            }
        }

        return $result;
    }

    /**
     * Populate a model payload from an associate array.  This is based on $form->saveInto()
     *
     * @param model the model to populate or indeed upate
     * @param $payload associative array of values
     */
    public function populateModelFromFormData($dataObject, $payload, $form)
    {
        $payloadFields = array_keys($payload);
        $dataFields = $form->Fields()->saveableFields();
        $lastField = null;
        if ($dataFields) {
            foreach ($dataFields as $field) {
                // Skip fields that have been excluded
                if (!in_array($field->getName(), $payloadFields)) {
                    continue;
                }

                $saveMethod = "save{$field->getName()}";
                if ($field->getName() == "ClassName") {
                    echo "<br/>T1";
                    $lastField = $field;
                } elseif ($dataObject->hasMethod($saveMethod)) {
                    echo "<br/>T2";
                    $dataObject->$saveMethod($field->dataValue());
                } elseif ($field->getName() !== "ID") {
                    echo "<br/>T3";
                    if (isset($payload[$field->getName()])) {
                        $field->Value = $payload[$field->getName()];
                    }

                    $field->saveInto($dataObject);
                }
            }
        }

        if ($lastField) {
            $lastField->saveInto($dataObject);
        }
    }

    public function populateModelFromArray($model, $payload)
    {
        foreach(array_keys($payload) as $key){
            $model->$key = $payload[$key];
        }

        return $model->write();
    }

    public function saveInto(DataObjectInterface $dataObject, $fieldList = null)
    {
        $dataFields = $this->fields->saveableFields();
        $lastField = null;
        if ($dataFields) {
            foreach ($dataFields as $field) {
                // Skip fields that have been excluded
                if ($fieldList && is_array($fieldList) && !in_array($field->getName(), $fieldList)) {
                    continue;
                }

                $saveMethod = "save{$field->getName()}";
                if ($field->getName() == "ClassName") {
                    $lastField = $field;
                } elseif ($dataObject->hasMethod($saveMethod)) {
                    $dataObject->$saveMethod($field->dataValue());
                } elseif ($field->getName() !== "ID") {
                    $field->saveInto($dataObject);
                }
            }
        }
        if ($lastField) {
            $lastField->saveInto($dataObject);
        }
    }
}
