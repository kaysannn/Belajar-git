<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suppliers extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_category_id',
        'company_name',
        'address',
        'contact_name',
        'contact_phone',
        'contact_email',
    ];


    public function supplier_categories(): BelongsTo
    {
       return $this->belongsTo(supplier_categories::class, 'supplier_category_id', 'id'); 
    }
}
