<?php

namespace App\Imports;

use App\Models\PhoneList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * @method validate(array $row, string[] $array)
 */
class PhoneListImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return float|\Illuminate\Database\Eloquent\Model|int|null
    */
    public static function checkNegative($value)
    {
        if ($value)
        {
            $value ;
            return $value;
        }
    }
    public function model(array $row)
    {
        $location_info = explode(',', $row['location']);
        if(count($location_info) == 1)
        {
            $location_info[1] = null;
            $location_info[2] = null;
            $location_info[3] = null;

        }
        elseif (count($location_info) == 2)
        {
            $location_info[2] = null;
            $location_info[3] = null;
        }
        elseif (count($location_info) == 3)
        {
            $location_info[3] = null;
        }

        $hometown_info = explode(',', $row['hometown']);
        if(count($hometown_info) == 1)
        {
            $hometown_info[1] = null;
            $hometown_info[2] = null;
            $hometown_info[3] = null;

        }
        elseif (count($hometown_info) == 2)
        {
            $hometown_info[2] = null;
            $hometown_info[3] = null;
        }
        elseif (count($hometown_info) == 3)
        {
            $hometown_info[3] = null;
        }


        return new PhoneList([

            'phone'                 => $row['phone'],
            'uid'                   => $row['uid'],
            'email'                 => $row['email'],
            'first_name'            => $row['first_name'],
            'last_name'             => $row['last_name'],
            'name'                  => $row['first_name'] . ' ' . $row['last_name'],
            'gender'                => $row['gender'],
            'country'               => "United States",/*$row['country'],*/
            'location'              => $row['location'],
            'location_city'         => $location_info[0],
            'location_state'        => $location_info[1],
            'location_region'       => $location_info[2],
            'location_country'      => $location_info[3],
            'hometown'              => $row['hometown'],
            'hometown_city'         => $hometown_info[0],
            'hometown_state'        => $hometown_info[1],
            'hometown_region'       => $hometown_info[2],
            'hometown_country'      => $hometown_info[3],
            'relationship_status'   => $row['relationship_status'],
            'education_last_year'   => $row['education_last_year'],
            'work'                  => $row['work'],
        ]);

    }

    /*public function startRow(): int
    {
        return 1;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }*/



}
