<?php

namespace App\Http\Controllers\User\Searching;

use App\Exports\CustomExport;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Credit;
use App\Models\CreditHistory;
use App\Models\DownloadedList;
use App\Models\ExportHistori;
use App\Models\PhoneList;
use App\Models\PhoneListUserModel;
use Auth;
use DB;
use Illuminate\Http\Request;

class DataSearch extends Controller
{
    public function customExport(Request $request)
    {
        if($request->chk == null && $request->limit == null)
        {
            $credit=Credit::where('userId',Auth::user()->id)->first();
            $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
            $getdownloadedIds = 0;
            foreach ($this->allDataIds as $dataIds) {
                $getdownloadedIds = $getdownloadedIds . ',' . $dataIds->downloadedIds;
            }
            if($request->age != null)
            {
                Credit::filterCredit();
                $validated = $request->validate([
                    'age' => 'required|digits:4',
                ]);
                $age = $validated['age'];
                

            }
            if ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('first_name', '=', $request->name)
                    ->orWhere('last_name', '=', $request->name)
                    ->orWhere('full_name', '=', $request->name)
                    ->orderBy('full_name', 'ASC')
                    ;
                //$searchId = $query->pluck('id');
                 }
            elseif ($request->location != null && $request->name == null && $request->hometown == null &&
                $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('location', '=', $request->location)
                    ->orWhere('location_city', '=', $request->location)
                    ->orWhere('location_city', '=', ' ' . $request->location)
                    ->orWhere('location_state', '=', ' ' . $request->location)
                    ->orWhere('location_state', '=', ' ' . $request->location . "'")
                    ->orWhere('location_region', '=', ' ' . $request->location)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown != null && $request->name == null && $request->location == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('hometown', '=', $request->hometown)
                    ->orwhere('hometown_city', '=', $request->hometown)
                    ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                    ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                    ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                    ->orWhere('hometown_region', '=', ' ' . $request->hometown)
                    ->orderBy('full_name', 'ASC')
                    ;

                }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->groupBy('full_name')
                    ->having('first_name', '=', $request->name)
                    ->orHaving('last_name', '=', $request->name)
                    ->orHaving('full_name', '=', $request->name)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                  }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                    ;
                  }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                    ;
                }

            /*elseif ($request->name == null && $request->location == null && $request->hometown == null &&
                $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }*/
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->location != null && $request->name == null && $request->hometown == null &&
                $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown != null && $request->name == null && $request->location == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

                }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

                }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
              }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

                 }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
               }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                 }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                $dataCount = DB::table('phone_lists')
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->count();
                  }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                $dataCount = DB::table('phone_lists')
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->count();
                }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
                }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

                }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->countries = Country::all();
                $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
                $getdownloadedIds = 0;
                foreach ($this->allDataIds as $dataIds)
                {
                    $getdownloadedIds = $getdownloadedIds.','.$dataIds->downloadedIds;
                }

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',',$getdownloadedIds))
                    ->orderBy('first_name', 'ASC')
                    ;
            }

            $allDatas = $this->allData->pluck('id');

            $array = $allDatas->toArray();
            $preDownloaded = count($array);
            $preDownloaded2 = $preDownloaded - (count(array_intersect($allDatas->toArray(), explode(',',$getdownloadedIds ))));

            if ($credit->useableCredit >= $preDownloaded2)
            {
                Credit::allDataCradit($preDownloaded, $array);
                ExportHistori::allDataExportHistori($preDownloaded, $allDatas);
                DownloadedList::createAllNew($allDatas);
                CreditHistory::createAll($preDownloaded);
                PhoneListUserModel::updateUseAbleCredit($allDatas);

                return (new CustomExport($allDatas->toArray()))->download('phoneList.xlsx');
            }
            else
            {
                return redirect('/settings/upgrade');
            }
        }
        elseif($request->chk == null && $request->limit != null)
        {
            $credit=Credit::where('userId',Auth::user()->id)->first();
            $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
            $getdownloadedIds = 0;
            foreach ($this->allDataIds as $dataIds) {
                $getdownloadedIds = $getdownloadedIds . ',' . $dataIds->downloadedIds;
            }
            if($request->age != null)
            {
                Credit::filterCredit();
                $validated = $request->validate([
                    'age' => 'required|digits:4',
                ]);
                $age = $validated['age'];


            }
            if ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('first_name', '=', $request->name)
                    ->orWhere('last_name', '=', $request->name)
                    ->orWhere('full_name', '=', $request->name)
                    ->orderBy('full_name', 'ASC')
                ;
                //$searchId = $query->pluck('id');
            }
            elseif ($request->location != null && $request->name == null && $request->hometown == null &&
                $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('location', '=', $request->location)
                    ->orWhere('location_city', '=', $request->location)
                    ->orWhere('location_city', '=', ' ' . $request->location)
                    ->orWhere('location_state', '=', ' ' . $request->location)
                    ->orWhere('location_state', '=', ' ' . $request->location . "'")
                    ->orWhere('location_region', '=', ' ' . $request->location)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown != null && $request->name == null && $request->location == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('hometown', '=', $request->hometown)
                    ->orwhere('hometown_city', '=', $request->hometown)
                    ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                    ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                    ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                    ->orWhere('hometown_region', '=', ' ' . $request->hometown)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->groupBy('full_name')
                    ->having('first_name', '=', $request->name)
                    ->orHaving('last_name', '=', $request->name)
                    ->orHaving('full_name', '=', $request->name)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age == null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->orderBy('full_name', 'ASC')
                ;
            }

            /*elseif ($request->name == null && $request->location == null && $request->hometown == null &&
                $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                    ;

            }*/
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->location != null && $request->name == null && $request->hometown == null &&
                $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown != null && $request->name == null && $request->location == null
                && $request->country == null && $request->countryInputName == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->hometown == null && $request->name == null && $request->location == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('relationship_status', '=', $request->relationship_status)
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location == null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
                $dataCount = DB::table('phone_lists')
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->count();
            }
            elseif ($request->name == null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
                $dataCount = DB::table('phone_lists')
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->count();
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status == null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender == null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country == null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown == null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location == null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name == null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;
            }
            elseif ($request->name != null && $request->location != null && $request->hometown != null
                && $request->country != null && $request->gender != null && $request->relationship_status != null
                && $request->age != null) {
                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',', $getdownloadedIds))
                    ->where(function ($query) use ($request) {
                        $query->where('first_name', '=', $request->name)
                            ->orWhere('last_name', '=', $request->name)
                            ->orWhere('full_name', '=', $request->name);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('location', '=', $request->location)
                            ->orWhere('location_city', '=', $request->location)
                            ->orWhere('location_city', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location)
                            ->orWhere('location_state', '=', ' ' . $request->location . "'")
                            ->orWhere('location_region', '=', ' ' . $request->location);
                    })
                    ->where(function ($query) use ($request) {
                        $query->where('hometown', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', $request->hometown)
                            ->orwhere('hometown_city', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown)
                            ->orWhere('hometown_state', '=', ' ' . $request->hometown . "'")
                            ->orWhere('hometown_region', '=', ' ' . $request->hometown);
                    })
                    ->where('country', '=', $request->country)
                    ->where('gender', '=', $request->gender)
                    ->where('relationship_status', '=', $request->relationship_status)
                    //->where('age', 'like', '%/'.$age)
                    ->orderBy('full_name', 'ASC')
                ;

            }
            elseif ($request->name == null && $request->location == null && $request->hometown == null
                && $request->country == null && $request->gender == null && $request->relationship_status == null
                && $request->age == null) {
                $this->countries = Country::all();
                $this->allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
                $getdownloadedIds = 0;
                foreach ($this->allDataIds as $dataIds)
                {
                    $getdownloadedIds = $getdownloadedIds.','.$dataIds->downloadedIds;
                }

                $this->allData = DB::table('phone_lists')
                    ->whereNotIn('id', explode(',',$getdownloadedIds))
                    ->orderBy('first_name', 'ASC')
                ;
            }

            $allDatas = $this->allData->pluck('id')->take($request->limit);
            $array = $allDatas->toArray();
            $preDownloaded = count($array);
            $preDownloaded2 = $preDownloaded - (count(array_intersect($allDatas->toArray(), explode(',',$getdownloadedIds ))));

            if ($credit->useableCredit >= $preDownloaded2)
            {
                Credit::allDataCradit($preDownloaded, $array);
                ExportHistori::allDataExportHistori($preDownloaded, $allDatas);
                DownloadedList::createAllNew($allDatas);
                CreditHistory::createAll($preDownloaded);
                PhoneListUserModel::updateUseAbleCredit($allDatas);

                return (new CustomExport($allDatas->toArray()))->download('phoneList.xlsx');
            }
            else
            {
                return redirect('/settings/upgrade');
            }
        }
        else
        {
            $credit=Credit::where('userId',Auth::user()->id)->first();
            $allDataIds = DownloadedList::where('userId', Auth::user()->id)->get();
            $getdownloadedIds = 0;
            foreach ($allDataIds as $dataIds)
            {

                $getdownloadedIds = $getdownloadedIds.','.$dataIds->downloadedIds;
            }
            $preDownloaded = count($request->chk) - (count(array_intersect($request->chk, explode(',',$getdownloadedIds ))));


            if ($credit->useableCredit >= $preDownloaded)
            {
                Credit::updateUserCradit($request);
                ExportHistori::newExportHistori($request);
                DownloadedList::createNew($request);
                CreditHistory::create($request);
                PhoneListUserModel::updateUseAbleCredit($request);

                return (new CustomExport($request->chk))->download('phoneList.xlsx');
            }
            else
            {
                return redirect('/settings/upgrade');
            }
        }
    }
}
