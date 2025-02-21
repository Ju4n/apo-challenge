<?php


class QueryException extends Exception
{
    public function __construct(string $message)
    {
        $this->message = 'There is an error executing the query: ' . $message;
    }
}
