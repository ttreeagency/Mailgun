<?php
namespace Ttree\Mailgun;

/*
 * This file is part of the Ttree.Mailgun package.
 *
 * (c) ttree ltd - www.ttree.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Mailgun\Mailgun;
use Ttree\Mailgun\Service\KeyServiceInterface;
use TYPO3\Flow\Annotations as Flow;

/**
 * Mailgun Client Factory
 *
 * @Flow\Scope("singleton")
 */
class ClientFactory implements ClientFactoryInterface
{
    /**
     * @Flow\Inject
     * @var KeyServiceInterface
     */
    protected $keyService;

    /**
     * @param boolean $usePrivateKey
     * @return Mailgun
     */
    public function create($usePrivateKey = true)
    {
        $key = $usePrivateKey ? $this->keyService->getPrivateKey() : $this->keyService->getPublicKey();
        return new Mailgun($key);
    }
}
