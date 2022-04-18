<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [ 'url', 'hash'];

    public function getLinkByHashKey($hashKey)
    {
        return $this->where('hash', $hashKey)->first();
    }

    public function insertUrl($inputData){
        return self::create($inputData);
    }

    public function updateUrlById($id, $inputData){
        return self::where('id', $id)->update($inputData);
    }
}
