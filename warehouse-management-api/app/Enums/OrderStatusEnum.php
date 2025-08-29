<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case SHIPPED = 'shipped';
    case CANCELLED = 'cancelled';

    public static function toArray(): array
    {
        return array_column(TransferStatusEnum::cases(), 'value');
    }    
}
