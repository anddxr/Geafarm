<?php

class WebUser extends CWebUser
{

    private $_model = null;

    private function getModel()
    {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = Settings::model()->findByAttribute(['admin_email' => $this->id]);
        }
        return $this->_model;
    }
}
