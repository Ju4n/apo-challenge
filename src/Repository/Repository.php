<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Repository;

use ClanCats\Hydrahon\Builder;
use Juan\ApoChallenge\Database\Interface\BuilderInterface;

class Repository
{
    protected Builder $database;

    public function __construct(BuilderInterface $builder)
    {
        $this->database = $builder->getBuilder();
    }
}
