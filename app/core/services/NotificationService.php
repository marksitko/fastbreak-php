<?php
namespace FastbreakCore\services;

class NotificationService
{

    private $msg;
    private $status;

    public function __construct()
    {
        $this->status = null;
        $this->msg = null;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function getNotification()
    {
        if (is_null($this->getStatus()) && is_null($this->getMsg())) {
            return null;
        }
        return array(
            'status' => $this->getStatus(),
            'msg' => $this->getMsg(),
        );
    }

}

?>