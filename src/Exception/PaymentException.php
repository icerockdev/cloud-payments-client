<?php

namespace CloudPayments\Exception;

class PaymentException extends BaseException
{
    /**
     * @var string
     */
    protected $reason;

    /**
     * @var integer
     */
    protected $reasonCode;

    /**
     * @var integer
     */
    protected $transactionId;

    /**
     * @var string
     */
    protected $invoiceId;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $cardHolderMessage;

    public function __construct($response)
    {
        $this->reason = null;
        $this->reasonCode = null;
        $this->cardHolderMessage = null;

        if(isset($response['Model'])) {
            if(isset($response['Model']['Reason'])) $this->reason = $response['Model']['Reason'];
            if(isset($response['Model']['ReasonCode'])) $this->reasonCode = $response['Model']['ReasonCode'];
            if(isset($response['Model']['CardHolderMessage'])) $this->cardHolderMessage = $response['Model']['CardHolderMessage'];
            if(isset($response['Model']['TransactionId'])) $this->transactionId = $response['Model']['TransactionId'];
            if(isset($response['Model']['Amount'])) $this->amount = $response['Model']['Amount'];
            if(isset($response['Model']['InvoiceId'])) $this->invoiceId = $response['Model']['InvoiceId'];
        }

        parent::__construct($this->reason);
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return integer
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @return string
     */
    public function getCardHolderMessage()
    {
        return $this->cardHolderMessage;
    }

    /**
     * @return int
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }


}
