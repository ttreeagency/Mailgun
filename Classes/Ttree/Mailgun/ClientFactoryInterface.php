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

/**
 * Mailgun Client Factory Interface
 */
interface ClientFactoryInterface
{
    /**
     * @return Mailgun
     */
    public function create();
}
