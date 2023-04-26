<?php

namespace App\DTO\Product;

use App\DTO\AbstractDTO;
use App\Interfaces\DTOInterface;
use Illuminate\Contracts\Validation\Validator;

class ProductDTO extends AbstractDTO implements DTOInterface
{

  public function __construct(
    public readonly string $name,
    public readonly string $merchant_id,
    public readonly float $price,
    public readonly string $status,
  ) {
    $this->validate();
  }

  public function rules(): array {
    return [
      'name' => 'required|string|min:8|max:60',
    ];
  }

  public function messages(): array {
    return [
      'name' => 'você deve informar o nome do produto.',
      'price' => 'você deve informar o preço   do produto.',
    ];
  }

  public function validator(): Validator {
    return validator($this->toArray(), $this->rules(), $this->messages());
  }

  public function validate(): array {
    return $this->validator()->validate();
  }
}
