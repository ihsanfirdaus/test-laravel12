<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $checklist_id
 * @property string $item_name
 * @property int $is_completed
 */
class ChecklistItem extends Model
{
    protected $table = 'checklist_items';

    protected $fillable = [
        'checklist_id',
        'item_name',
        'is_completed'
    ];
}
