<?php

class MY_Form_validation extends CI_Form_validation
{
    public function run($module = '', $group = '')
    {
        (is_object($module)) and $this->CI = &$module;

        return parent::run($group);
    }
}
