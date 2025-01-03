<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','notification_template_id','is_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notificationTemplate()
    {
        return $this->belongsTo(NotificationTemplate::class,'notification_template_id','id');
    }
}
