<?php
/**
 * Gs4-Uniprotect based on Unisolutions SilverStripe-Uniprotect
 * Protecter class to handle spam protection interface
 * @package Gs4Uniprotect
 * @author gelysis <andreas@gelysis.net>
 * @copyright ©2018, Andreas Gerhards - All rights reserved
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause - Please check LICENSE.md for more information
 */

namespace gelysis\Gs4Uniprotect;

use SilverStripe\SpamProtection\SpamProtector;


class UniProtectProtector implements SpamProtector
{

    /**
     * Return the Field that we will use in this protector
     * @return string
     */
    public function getFormField($name = 'UniProtectField', $title = 'UniProtect', $value = null)
    {
        return UniProtectField($name, $title, $value);
    }

    /**
     * Not used by Gs4Uniprotect
     */
    public function setFieldMapping($fieldMapping)
    {
    }

}
