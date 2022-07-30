<?php

namespace App\Exports;

use App\Models\CSVExportSettings;
use App\Models\Phonelist;
use Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomExport implements FromQuery, WithHeadings
{
    use Exportable;
    protected $ids;
    protected $z;
    protected $exports;
    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query()
    {
        $this->exports = CSVExportSettings::where('userId', Auth::user()->id)->first();
        //dd($exports);
        //return Phonelist::whereIn('id',$this->ids);
        return DB::table('phone_lists')
            ->select(explode(',',$this->exports->collumn))
            ->whereIn('id',$this->ids)
            ->orderBy('id', 'asc');
    }
    public function headings() :array
    {
        $this->exports = CSVExportSettings::where('userId', Auth::user()->id)->first();
        return [
            explode(',',$this->exports->collumn)
        ];
        /*return [
            'phone',
            'email',
            'uid',
            'first_name',
            'last_name',
            'name',
            'gender',
            'country',
            'location',
            'hometown',
            'relationship_status',
            'education_last_year',
            'work',
        ];*/
    }
}
