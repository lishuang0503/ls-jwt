<?php

namespace Larke\JWT;

use Larke\JWT\Contracts\Signer;
use Larke\JWT\Contracts\Key;

/**
 * This class represents a token signature
 */
class Signature
{
    /**
     * The resultant hash
     *
     * @var string
     */
    protected $hash;

    /**
     * Initializes the object
     *
     * @param string $hash
     */
    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * Verifies if the current hash matches with with the result of the creation of
     * a new signature with given data
     *
     * @param Signer $signer
     * @param string $payload
     * @param Key|string $key
     *
     * @return boolean
     */
    public function verify(Signer $signer, $payload, $key)
    {
        return $signer->verify($this->hash, $payload, $key);
    }

    /**
     * Returns the current hash as a string representation of the signature
     *
     * @return string
     */
    public function __toString()
    {
        return $this->hash;
    }
}
