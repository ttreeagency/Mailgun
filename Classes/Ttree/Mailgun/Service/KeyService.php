<?php
namespace Ttree\Mailgun\Service;

/*
 * This file is part of the Ttree.Mailgun package.
 *
 * (c) ttree ltd - www.ttree.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;

/**
 * Service to return the Mailgun API Key
 *
 * @Flow\Scope("singleton")
 */
class KeyService implements KeyServiceInterface
{
    /**
     * @Flow\Inject(setting="privateKey", package="Ttree.Mailgun")
     * @var string
     */
    protected $privateKey;

    /**
     * @Flow\Inject(setting="publicKey", package="Ttree.Mailgun")
     * @var string
     */
    protected $publicKey;

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }
}
