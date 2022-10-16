<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public static function getWithManagerFullName(int $limit):array
    {
       return DB::select('SELECT orders.id,CONCAT(managers.last_name," ",managers.first_name) AS fullname
                          FROM orders,managers
                          WHERE orders.manager_id = managers.id LIMIT :limit',['limit' => $limit]);

    }
}
