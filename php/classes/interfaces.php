<?php

interface PaymentProcessor {
  public function processPayment(float $amount): bool;
  public function refundPayment(float $amount): bool;
}

// abstract class PaymentProcessor {
//   abstract public function processPayment(float $amount): bool;
//   abstract public function refundPayment(float $amount): bool;
// }

abstract class OnlinePaymentProcessor implements PaymentProcessor {
  public function __construct(
    protected string $apiKey
  ) {}

  abstract protected function validateApiKey(): bool;
  abstract protected function executePayment(float $amount): bool;
  abstract protected function executeRefund(float $amount): bool;

  public function processPayment(float $amount): bool {
    if (!$this->validateApiKey()) {
      throw new Exception("Invalid API key");
    }
    return $this->executePayment($amount);
  }

  public function refundPayment(float $amount): bool {
    if (!$this->validateApiKey()) {
      throw new Exception("Invalid API key");
    }
    return $this->executeRefund($amount);
  }
}

class StripeProcessor extends OnlinePaymentProcessor {
  protected function validateApiKey(): bool {
    return strpos($this->apiKey, 'sk_') === 0;
  }
}
class PayPalProcessor extends OnlinePaymentProcessor {
  protected function validateApiKey(): bool {
    return strlen($this->apiKey) === 32;
  }
}

class CashPaymentProcessor implements PaymentProcessor {
  public function processPayment(float $amount): bool {
    echo "Cash payment...";
    return true;
  }
  public function refundPayment(float $amount): bool {
    echo "Cash refund...";
    return true;
  }
}


$processor = new StripeProcessor("sk_");
$processor->processPayment(500);