<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 */
class Checklist extends Model
{
    protected $table = 'checklists';

    protected $fillable = [
        'name'
    ];

    public function items() : HasMany
    {
        return $this->hasMany(ChecklistItem::class, 'checklist_id', 'id');
    }
}
