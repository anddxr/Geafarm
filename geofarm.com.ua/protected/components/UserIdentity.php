<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    // Будем хранить id.
    protected $_id;
    public $username;

    public function authenticate()
    {
        $user = Settings::model()->findByAttributes(['admin_email' => $this->username]);
        if (($user === null) || (sha1($this->password) !== $user->admin_pass)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->_id = $user->admin_email;
            $this->username = $user->admin_email;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}
