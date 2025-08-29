<?php

namespace App\Enums;

enum TransferStatusEnum: string
{
  case PENDING = 'pending';
  case ONGOING = 'ongoing';
  case COMPLETED = 'completed';
  case CANCELLED = 'cancelled';

  public static function toArray(): array
  {
    return array_column(TransferStatusEnum::cases(), 'value');
  }
}