<?php

namespace App\Models;

use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    publIc function books()
    {
        return $this->hasMany('Book::class','author_id');
    }
    public static function rules($process)
    {
        if ($process == 'insert') {
            return [
                'name' => 'required|string|max:225',
                'birthdate' => 'required|date',
            ];
        } elseif ($process == 'update') {
            return [
                'name' => 'required|string|max:225',
                'birthdate' => 'required|date',
            ];
        }
    }
    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
            'name' => 'Nama',
            'birthdate' => 'Tanggal Lahir',
        ];

        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('date', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa tanggal.');
        });
    }
}
