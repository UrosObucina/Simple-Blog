<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 15.12.2018
 * Time: 15:44
 */

namespace Simpleblog\Simpleblog\View;
class TemplateParser extends \TYPO3\CMS\Fluid\Core\Parser\TemplateParser {
    protected $namespacesBase = array();
    public function initializeObject() {
        $this->namespacesBase = $this->namespaces += array(
            'simpleblog' => 'Simpleblog\Simpleblog\ViewHelpers'
        );
    }
    protected function reset() {
        $this->namespaces = $this->namespacesBase;
    }
}