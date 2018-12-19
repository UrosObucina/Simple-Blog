<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 19.12.2018
 * Time: 12:44
 */

namespace Simpleblog\Simpleblog\Service;


class GoogleAutocompleteApiService implements \TYPO3\CMS\Core\SingletonInterface
{
    /**
     * @param mixed $object
     * @param string $property
     * @return array
     */
    public function validateData($object, $property)
    {
        $errors = array();
        // Get value from property
        $getter = 'get' . ucfirst($property);
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($getter);
        $getValue = strtolower($object->$getter());
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($getValue);
        // URL to ask for autocomplete suggestions
        $url = 'http://www.google.com/complete/search?output=firefox&q=' . urlencode($getValue);
        if (!empty($getValue)) {
            $result = json_decode(utf8_encode(file_get_contents($url)));
            \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($result);
        }// check if either no result or the property value is not in the suggestions
        if (!empty($getValue) && (empty($result[1]) || array_search($getValue, $result[1]) === FALSE)) {
            $errors[$property] = 'No autocomplete entry for <strong>' . $getValue . '</strong>';
        // Add autocompletion values (if there are any)
            if (!empty($result[1])) {
                \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($result);
                $errors[$property] .= ' (possible values are: ' . implode(', ', $result[1]) . ')';
            }
        }
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($errors);
        return $errors;
    }
}