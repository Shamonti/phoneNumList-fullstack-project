<?php

namespace App\Models;

use App\Exports\CustomExport;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class ExportHistori extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'createdOn',
        'file',
        'record',
    ];

    protected static $history;
    protected static $file;
    protected static $fileDirectory;
    protected static $fileName;
    protected static $fileUrl;

    public static function saveFile($request)
    {
        $filepath = 'user/release/'.\Auth::user()->id.'.'.time().'.'.'phoneList.xlsx' ;

        self::$file = Excel::store(new CustomExport($request->chk), $filepath, 'local');
        if(self::$file)
        {
            self::$fileName = \Auth::user()->id.'.'.time().'.'.'phoneList.xlsx';
            self::$fileDirectory = 'user/release/';
            self::$fileUrl = self::$fileDirectory.self::$fileName;
            return self::$fileUrl;
        }
        else{
            return '';
        }
    }
    public static function saveFileAll($request)
    {
        $filepath = 'user/release/'.\Auth::user()->id.'.'.time().'.'.'phoneList.xlsx' ;

        self::$file = Excel::store(new CustomExport($request->toArray()), $filepath, 'local');
        if(self::$file)
        {
            self::$fileName = \Auth::user()->id.'.'.time().'.'.'phoneList.xlsx';
            self::$fileDirectory = 'user/release/';
            self::$fileUrl = self::$fileDirectory.self::$fileName;
            return self::$fileUrl;
        }
        else{
            return '';
        }
    }
    public static function saveFileForOne($request)
    {
        $filepath = 'user/release/'.Auth::user()->id.'.'.time().'.'.'phoneList.xlsx' ;

        self::$file = Excel::store(new CustomExport($request), $filepath, 'local');
        if(self::$file)
        {
            self::$fileName = Auth::user()->id.'.'.time().'.'.'phoneList.xlsx';
            self::$fileDirectory = 'user/release/';
            self::$fileUrl = self::$fileDirectory.self::$fileName;
            return self::$fileUrl;
        }
        else{
            return '';
        }
    }

    public static function newExportHistori($request)
    {
        self::$history = new ExportHistori();
        self::$history->userId            = Auth::user()->id;
        self::$history->createdOn         = Carbon::now();
        self::$history->file              = self::saveFile($request);
        self::$history->record            = count($request->chk);
        self::$history->save();
    }
    public static function allDataExportHistori($request, $data)
    {


        self::$history = new ExportHistori();
        self::$history->userId            = Auth::user()->id;
        self::$history->createdOn         = Carbon::now();
        self::$history->file              = self::saveFileAll($data);
        self::$history->record            = $request;
        self::$history->save();
    }

    public static function newExportHistoriForOne($request)
    {
        self::$history = new ExportHistori();
        self::$history->userId            = Auth::user()->id;
        self::$history->createdOn         = Carbon::now();
        self::$history->file              = self::saveFileForOne($request);
        self::$history->record            = 1;
        self::$history->save();
    }
}
