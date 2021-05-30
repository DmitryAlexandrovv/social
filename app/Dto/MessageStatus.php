<?php


    namespace App\Dto;


    use Spatie\Enum\Enum;

    /**
     * @method static self RECEIVED()
     * @method static self DELIVERED()
     */
    class MessageStatus extends Enum
    {
        protected static function values(): array
        {
            return [
                'RECEIVED' => 1,
                'DELIVERED' => 2
            ];
        }
    }
