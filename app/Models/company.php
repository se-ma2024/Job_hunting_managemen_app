<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // タイムスタンプを自動的に更新しない
    public $timestamps = false;
    
    /**
     * データベースに企業を追加する。
     */
    public static function addCompany($name)
    {
        return self::create(['name' => $name]);
    }
}
