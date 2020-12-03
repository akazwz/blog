<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**关联到模型的数据表
     * @var string
     */
    protected $table = 'book';

    /**Laravel有默认时间字段，不需要可以修改成 false
     * @var bool
     */
    public $timestamps = false;

}
