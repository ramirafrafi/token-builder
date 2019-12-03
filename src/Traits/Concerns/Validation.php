<?php

namespace Shetabit\Tokenable\Traits\Concerns;

use Shetabit\Tokenable\Models\Token;

trait validation
{
    /**
     * Retrieve a token if it is valid.
     *
     * @return Token|null
     */
    public function findValidToken() : ?Token
    {
        $token = $this->getToken();
        $type = $this->getType();
        $tokenable = $this->getRelatedItem();

        return  empty($token) ? null : $this->tokensRepository->findValidToken($token, $type, $tokenable);
    }

    /**
     * Determine if token is valid
     * 
     * @return bool
     */
    public function isValid() : bool
    {
        return (bool) $this->findValidToken();
    }

    /**
     * Determine if token is invalid
     * 
     * @return bool
     */
    public function isInvalid() : bool
    {
        return !$this->isValid();
    }

    /**
     * Alias for invalid
     * 
     * @alias isInvalid
     * 
     * @return bool
     */
    public function isNotValid() : bool
    {
        return $this->isInvalid();
    }
}