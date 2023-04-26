<?php

namespace App\DTO\Login;

use App\DTO\AbstractDTO;
use App\Interfaces\DTOInterface;
use Illuminate\Contracts\Validation\Validator;

class LoginDTO extends AbstractDTO  implements DTOInterface {

  public function __construct(
    public readonly string $email,
    public readonly string $password,
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
