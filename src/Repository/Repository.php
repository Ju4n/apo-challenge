<?php
namespace Juan\ApoChallenge\Repository;

use Juan\ApoChallenge\Database\DatabaseHandler;

class Repository 
{
    public function __construct(protected readonly DatabaseHandler $database)  
    {
    }
}
