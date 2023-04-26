<?php

namespace App\DTO\User;

use App\DTO\AbstractDTO;
use App\Interfaces\DTOInterface;
use Illuminate\Contracts\Validation\Validator;

class OrderDTO extends AbstractDTO  implements DTOInterface {

  public function __construct(
    public readonly int $user_id,
    public readonly ?string $status = "in_stock",
  ) {}
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
