<?php

namespace App\Enums;

enum ChannelTypeEnum: String {
    case SMS = 'SMS';
    case Email = 'Email';
    case PushNotification = 'PushNotification';
}