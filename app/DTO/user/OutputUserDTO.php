<?php

namespace App\DTO\user;
use App\DTO\AbstractDTO;
use App\DTO\InterfaceDTO;
use Illuminate\Contracts\Validation\Validator;

class OutputUser extends AbstractDTO implements InterfaceDTO
{
  public function __construct(
    public string $name,
    public string $email,
    public bool $is_admin,
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
