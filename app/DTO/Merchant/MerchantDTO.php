<?php

declare(strict_types=1);

namespace App\DTO\Merchant;

use App\DTO\AbstractDTO;
use App\Interfaces\DTOInterface;
use Illuminate\Contracts\Validation\Validator;

class MerchantDTO extends AbstractDTO implements DTOInterface
{
  public readonly string $merchant_name;
  public function __construct(
    public readonly ?int $id = null,
    public readonly string $name,
    public readonly string $email,
    public readonly string $password,
    public readonly ?bool $is_admin = true,
  ){
    $this->merchant_name = $this->name;
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
