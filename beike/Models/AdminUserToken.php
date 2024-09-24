<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminUserToken extends Base
{
    protected $fillable = ['admin_user_id', 'token'];

    public function adminUser(): BelongsTo
    {
        return $this->belongsTo(AdminUser::class);
    }
}
