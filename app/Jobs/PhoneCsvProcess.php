<?php

namespace App\Jobs;
use App\Models\PhoneList;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class PhoneCsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $header;
    public $data;
    public $phoneArray=[];

    public function __construct($data, $header, $phoneArray)
    {
        $this->data = $data;
        $this->header = $header;
        $this->phoneArray = $phoneArray;

        $this->handle();
    }
    public function handle()
    {
        $inputArray = [];
        foreach ($this->data as $phone) {
            if (!in_array($phone[0], $this->phoneArray)) {
                array_push($inputArray, array_combine($this->header,array_slice(array_pad($phone, count($this->header),''), 0, count($this->header))));
                if (count($inputArray) == 500) {
                    PhoneList::insert($inputArray);
                    $inputArray = [];
                }
            }
        }
    }

    /*public function handle()
    {
        $inputArray = [];
        foreach ($this->data as $phone) {
            if (!in_array($phone[0], $this->phoneArray)) {
                $tempArray = array_pad($phone, count($this->header),'');
                $tempData = array_slice($tempArray, 0, count($this->header));
                $phoneData = array_combine($this->header,$tempData);
                PhoneList::create($phoneData);
                
                
                /*array_push($inputArray, array_combine($this->header,array_slice(array_pad($phone, count($this->header),''), 0, count($this->header))));
                if (count($inputArray) == 500) {
                    PhoneList::create($inputArray);
                    $inputArray = [];
                }*/
           /* }
        }
    }*/
}