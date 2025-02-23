<?php declare(strict_types=1);

namespace Juan\ApoChallenge\Database\Interface;

use ClanCats\Hydrahon\Builder;

interface BuilderInterface
{
    public function getBuilder(): Builder;
}
