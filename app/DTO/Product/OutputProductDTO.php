<?php

namespace App\DTO\Product;
use App\DTO\AbstractDTO;
use App\Interfaces\DTOInterface;
use Illuminate\Contracts\Validation\Validator;

class OutputProductDTO extends AbstractDTO implements DTOInterface
{
  public function __construct(
    public string $name,
    public string $merchant_id,
    public float $price,
    public string $status,
    public readonly \DateTime $created_at,
    public readonly \DateTime $updated_at,
  ) {
    $this->validate();
  }
  public function rules(): array
  {
    return [];
  }

  public function messages(): array
  {
    return [];
  }

  public function validator(): Validator
  {
    return validator($this->toArray(), $this->rules(), $this->messages());
  }

  public function validate(): array
  {
    return $this->validator()->validate();
  }
}
