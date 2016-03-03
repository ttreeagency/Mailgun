<?php
namespace Ttree\Mailgun\Validation\Validator;

/*
 * This file is part of the Ttree.Mailgun package.
 *
 * (c) ttree ltd - www.ttree.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Ttree\Mailgun\ClientFactory;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Validation\Validator\AbstractValidator;

/**
 * Service to return the Mailgun API Key
 *
 * @Flow\Scope("singleton")
 */
class EmailAddressValidator extends AbstractValidator
{
    /**
     * @Flow\Inject
     * @var ClientFactory
     */
    protected $clientFactory;

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to Result.
     *
     * @param mixed $value
     * @return void
     * @throws \TYPO3\Flow\Validation\Exception\InvalidValidationOptionsException if invalid validation options have been specified in the constructor
     */
    protected function isValid($value)
    {
        if (!is_string($value) || !$this->validEmail($value)) {
            $this->addError('Please specify a valid email address.', 1221559976);
        }
    }

    /**
     * @param string $emailAddress Input string to evaluate
     * @return boolean Returns true if the $email address (input string) is valid
     */
    protected function validEmail($emailAddress)
    {
        if (strlen($emailAddress) > 512) {
            return false;
        }
        $client = $this->clientFactory->create(false);
        $response = $client->get('address/validate', [
            'address' => $emailAddress
        ]);
        $result = json_decode(json_encode($response->http_response_body), true);
        if (isset($result['did_you_mean']) && $result['did_you_mean'] !== null) {
            $this->addError('Did you mean "%s" ?', 1456964592, [$result['did_you_mean']]);
        }
        return $result['is_valid'];
    }
}
