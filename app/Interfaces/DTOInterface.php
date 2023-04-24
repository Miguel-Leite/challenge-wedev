<?php

declare(strict_types=1);

namespace App\Interfaces;

use Illuminate\Contracts\Validation\Validator;

interface DTOInterface
{
  public function rules(): array;
  public function messages(): array;
  public function validator(): Validator;
  public function validate(): array;
}
