<?php

namespace Components;

class MyWebUser extends \CWebUser
{
    /** @var User */
    private $_profile = null;

    public function init(): void
    {
        parent::init();

        if (!$this->isGuest) {
            /** @var $u User */
            $u = \User::model()->findByPk($this->id);

            $this->_profile = $u;
        }
    }

    public function getProfile(): ?User
    {
        return $this->_profile;
    }
}
