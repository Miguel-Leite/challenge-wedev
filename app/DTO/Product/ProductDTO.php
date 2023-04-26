<?php

declare(strict_types=1);

namespace App\DTO\Product;

use App\DTO\AbstractDTO;
use App\Interfaces\DTOInterface;
use Illuminate\Contracts\Validation\Validator;

class ProductDTO extends AbstractDTO implements DTOInterface
{
  public readonly int $merchant_id;
  public function __construct(
    public readonly string $name,
    public readonly string $price,
    public readonly ?string $status,
  ){
    $this->merchant_id = auth()->user()->id;
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
