<?php

namespace App\DTO\user;

use App\DTO\AbstractDTO;
use App\DTO\InterfaceDTO;
use Illuminate\Contracts\Validation\Validator;

class UserDTO extends AbstractDTO implements InterfaceDTO
{
  public readonly bool $is_admin;

  public function __construct(
    public readonly string $name,
    public readonly string $email,
    public readonly string $password,
    public readonly ?bool $status = false,
  ) {
    $this->is_admin = $status;
    $this->validate();
  }

  public function rules(): array {
    return [
      'name' => 'required|string|min:8|max:60',
    ];
  }

  public function messages(): array {
    return [
      'name' => 'você deve informar o nome do usuário.'
    ];
  }

  public function validator(): Validator {
    return validator($this->toArray(), $this->rules(), $this->messages());
  }

  public function validate(): array {
    return $this->validator()->validate();
  }
}
