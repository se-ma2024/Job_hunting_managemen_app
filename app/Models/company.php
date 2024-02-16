<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'industry', 'company_size', 'strengths', 'benefits_package', 'selection_status', 'reason_for_applying', 'memo'];

    public $timestamps = false;

    public static function addCompany($data)
    {
        return self::create($data);
    }
    
    public static function showDetail($id)
    {
        return self::findOrFail($id);
    }

    public static function deleteCompany($id)
    {
        return self::find($id)->delete();
    }

    public function updateCompany($data)
    {
        $this->update($data);
    }
}
