<?php

class AddMembersResponse
{
    private String $success;
    private String $message;

    public function __construct(String $success, String $message)
    {
        $this->success = $success;
        $this->message = $message;
    }

    public function getSuccess(): String
    {
        return $this->success;
    }

    public function getMessage(): String
    {
        return $this->message;
    }

    public function setMessage(String $message): void
    {
        $this->message = $message;
    }
    public function setSuccess(String $success): void
    {
        $this->success = $success;
    }
}
