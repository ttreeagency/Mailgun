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

/**
 * Service Interface to return the Mailgun API Key
 */
interface KeyServiceInterface
{
    /**
     * @return string
     */
    public function get();
}
