<?php
/**
 * Gs4-Uniprotect based on Unisolutions SilverStripe-Uniprotect
 * Provides an {@link FormField} which allows form to validate for non-bot submissions
 * by checking if value in that field is correct. The value of this field is set using javascript events.
 * @package Gs4Uniprotect
 * @author gelysis <andreas@gelysis.net>
 * @copyright ©2018, Andreas Gerhards - All rights reserved
 * @license http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause - Please check LICENSE.md for more information
 */

namespace Gs4Uniprotect;

use SilverStripe\Control\Session;
use SilverStripe\Forms\FormField;
use SilverStripe\View\Requirements;


class UniProtectField extends FormField
{

    /**
     * {@inheritDoc}
     * @see \SilverStripe\Forms\FormField::Field()
     */
    public function Field($properties = array())
    {
        if ($this->stat('jquery_included')) {
            Requirements::javascript(THIRDPARTY_DIR.'/jquery/jquery.js');
        }

        Session::clear('FormField.'.$this->form->FormName().'.'.$this->getName().'.error');

        $value = md5(mt_rand());
        Session::set($this->class.'.'.$this->form->FormName().'.'.$this->getName(), $value);

        if ($this->stat('javascript_included')) {
            Requirements::customScript("
                (function($){
                    $(document).on('mousemove keydown', function(e){
                        $('#".$this->form->FormName()." input[name=".$this->getName()."]').val('".$value."');
                    });
                }(jQuery));
            ");
        }

        $obj = ($properties) ? $this->customise($properties) : $this;
        $this->extend('onBeforeRender', $this);

        return $obj->renderWith($this->getTemplates());
    }

    /**
     * {@inheritDoc}
     * @see \SilverStripe\Forms\FormField::FieldHolder()
     */
    public function FieldHolder($properties = array())
    {
        return $this->XML_val('Field');
    }

    /**
     * Validate checking if the value in the field is correct
     * {@inheritDoc}
     * @see \SilverStripe\Forms\FormField::validate()
     */
    public function validate($validator)
    {
        if (!isset($_REQUEST[$this->getName()])
            || $_REQUEST[$this->getName()] != Session::get($this->class.'.'.$this->form->FormName().'.'.$this->getName())
        ) {
            $validator->validationError(
                $this->getName(),
                _t($this->class . '.INVALID', 'Apologies but looks like that you are trying to post spam here.'),
                'validation',
                false
            );

            $valid = false;
        }else {
            $valid = true;
        }

        return $valid;
    }

}
