<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COR | {{auth()->user()->personalid}}</title>
    <style>

        #headings{
            font-size: 10pt;
            font-weight: 600;
            margin: 0;
            padding: 0;
        }

        #formerly{
            font-size: 10pt;
            margin: 3px 0 0 0;
            padding: 0;
        }


        .setfont{
            font-family: "Times New Roman";
            text-align: center;
        }

        .bordertbl, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 8pt;
            padding-left: 5px;
            font-family: Calibri, sans-serif;
        }


        .signatures{
            width: 80px;
        }

        .signatures-reg{
            width: 50px;
        }

        

        table{
            width: 100%;
        }

        .page-break {
            page-break-after: always;
        }

        #logo{
            width: 50px;
        }

        #logo-container{
            position: absolute;
            left: 230px;
        }

        .smallfont{
            font-size: 9px;
            vertical-align: text-top;
        }

        .centertext {
            text-align: center;
        }

        .righttext {
            text-align: right;
        }

        .totalunit{
            font-weight: 600;   
        }

        .totalamount{
            font-weight: 600;   
            font-size: 8pt;
        }

        .font-small{
            font-size: 8pt;
        }

        .signatories{
            font-weight: 600; 
            text-align: center;
        }
        
        .prerequisites{
            margin: 0;
            font-size: 9pt;
        }

        .reg-acc-copy{
            position: absolute;
            left: 20px;
            font-size: 8px;
        }

        .registry{
            position: absolute;
            right: 20px;
            font-size: 8px;
        }

        .noborder{
            border: none;
        }

        .border-bottom{
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        .clearfix::after {
        clear: both;
        display: table;
        }

        .fitcell
            {
                width: 1px;
                white-space: nowrap;
            }
      

        footer { position: fixed; font-size: 8pt; bottom: -30px; left: 0px; right: 0px; height: 50px; }
    </style>
</head>
<body>
    <footer>This is a system generated form. Generated on {{ Carbon\Carbon::now() }}</footer>
   
    {{-- REGISTRAR'S COPY --}}
    <div style="border: 2px solid black">
        <div style="margin: 10px 10px 10px 10px">
            <div class="registry">Registry No.___</div>
    <div class="reg-acc-copy">(Student&apos;s Copy)</div>
    
        <div  id="header" class="setfont">   
                {{-- <div id="logo-container"><img id="logo" src="{{public_path('images/logo.png')}}" ></div> --}}
                <span id="headings">
                    Dalubhasaan ng Lungsod ng Lucena <br>
                </span>
                <p id="formerly">
                    (Formerly City College of Lucena)<br>
                </p>
        </div>

        {{-- INFORMATION --}}
        <div style="margin-top: 12pt">
            <table>
                <tbody>
                <tr>
                <td class="noborder">Name:</td>
                <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->lastname)) {{Str::upper($info->studentpersonal->lastname)}} @if(!is_null($info->studentpersonal->extension)) {{Str::upper($info->studentpersonal->extension)}} @endif @else &nbsp; @endif
                    @endif</td>
                <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->firstname)) {{Str::upper($info->studentpersonal->firstname)}}  @else &nbsp; @endif
                    @endif</td>
                <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->middlename)) {{Str::upper($info->studentpersonal->middlename)}}  @else &nbsp; @endif
                    @endif</td>
                <td class="noborder righttext">Student ID:</td>
                <td class="border-bottom centertext">{{ auth()->user()->personalid }}</td>
                </tr>

                <tr>
                <td class="noborder"></td>
                <td class="noborder centertext smallfont">Lastname</td>
                <td class="noborder centertext smallfont">Firstname</td>
                <td class="noborder centertext smallfont">Middlename</td>
                <td class="noborder"></td>
                <td class="noborder"></td>
                </tr>

                </tbody>
                </table>
        </div>
        <div style="margin-top: 1pt">
            <table>
                <tbody>
                <tr>
                    <td class="noborder righttext">Sex:</td>
                    <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                        @if(!is_null($info->studentpersonal->sex)) {{$info->studentpersonal->sex == '1' ? 'Male' : 'Female'}}  @else &nbsp; @endif
                        @endif</td>
                    <td class="noborder righttext">LRN:</td>
                    <td class="border-bottom centertext">@if (!is_null($info->studentschoolone))
                        @if(!is_null($info->studentschoolone->lrn)) {{$info->studentschoolone->lrn}}  @else &nbsp; @endif
                    @endif</td>
                    <td class="noborder righttext">Course/Year:</td>
                    <td class="border-bottom centertext"> @if (!is_null($getcourse))
                        {{ $getcourse->coursebelong->course_code }}-{{$getcourse->section}}
                     @else
                         &nbsp;
                     @endif</td>
                    <td class="noborder">{{$semester->semester}}, {{$semester->schoolyear}}</td>
                </tr>

                </tbody>
                </table>
        </div>


        {{-- SUBJECTS --}}
        <div style="margin-top: 2pt">           
            <table class="bordertbl" style="max-width: 93%; width:93%;">
                <tbody>
                <tr>
                    <th rowspan="2">SUBJ. CODE</th>
                    <th rowspan="2">SUBJ. DESCRIPTION</th>
                    <th colspan="2">UNITS</th>
                    <th rowspan="2">TIME</th>
                    <th rowspan="2">DAY</th>
                    <th rowspan="2">ROOM</th>
                </tr>
                <tr>
                    <th>LEC</th>
                    <th>LAB</th>
                </tr>
                @if (!is_null($getsubject))
                    @foreach ($getsubject as $subject)
                    <tr>
                        <td class="fitcell">{{$subject->subject_code}}</td>
                        <td class="fitcell">{{$subject->subject_desc}}</td>
                        <td class="fitcell centertext">@if($subject->subject_unittype == 'lec'){{$subject->subject_units}}@else&nbsp;@endif</td>
                        <td class="fitcell centertext">@if($subject->subject_unittype == 'lab'){{$subject->subject_units}}@else&nbsp;@endif</td>
                        <td class="fitcell centertext">{{date('H:i a', strtotime($subject->subject_from)) }} - {{ date('H:i a', strtotime($subject->subject_to))}}</td>
                        <td class="fitcell centertext">{{$subject->subject_day}}</td>
                        <td class="fitcell centertext">{{$subject->subject_room}}</td>
                    </tr>
                    <?php
                        $unitstotal += $subject->subject_units;
                    ?>
                    @endforeach
                    @for ($i = count($getsubject); $i < 12; $i++)
                                <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                </tr>
                    @endfor
                @else
                    @for ($i = 0; $i < 12; $i++)
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                    @endfor
                @endif

                <tr>
                    <td></td>
                    <td class="righttext totalunit">Total Units:</td>
                    <td colspan="2" class="centertext totalunit">@if (!is_null($getsubject))
                        {{$unitstotal}}
                    @else
                        0
                    @endif</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>               
                </tbody>
                </table>
                <p class="prerequisites">WARNING: Subjects taken without prerequisites will not be credited.</p>
        </div>

        <div class="clearfix" style="margin-top: 4pt">
                <table style="float: left; width:45%;">
                    <tbody>
                        <tr>
                            <td class="border-bottom centertext">@if (!is_null($studstatus))
                                @if ($studstatus->type == '1')
                                    X
                                @else
                                    &nbsp;
                                @endif
                            @else
                                &nbsp;
                            @endif</td>
                            <td class="noborder">New</td>
                            <td class="border-bottom centertext">@if (!is_null($studstatus))
                                @if ($studstatus->type == '2')
                                    X
                                @else
                                    &nbsp;
                                @endif
                            @else
                                &nbsp;
                            @endif</td>
                            <td class="noborder">Old</td>
                        </tr>
                        <tr>
                            <td class="border-bottom centertext">@if (!is_null($studstatus))
                                @if ($studstatus->type == '3')
                                    X
                                @else
                                    &nbsp;
                                @endif
                            @else
                                &nbsp;
                            @endif</td>
                            <td class="noborder">Transferee</td>
                            <td class="border-bottom centertext">@if (!is_null($studstatus))
                                @if ($studstatus->type == '4')
                                    X
                                @else
                                    &nbsp;
                                @endif
                            @else
                                &nbsp;
                            @endif</td>
                            <td class="noborder">Cross Enrollee</td>
                        </tr>
                    </tbody>
                </table>
            
                <table style="float: right; width: 45%; table-layout: fixed;">
                    <tbody>
                        <tr>
                            <td class="border-bottom centertext"> @if (!is_null($getcourse))
                                @if ($getcourse->coursebelong->id == 1 || $getcourse->coursebelong->id == 8)
                                <img class="signatures" src="{{public_path('images/abels.png')}}" >
                                @elseif ($getcourse->coursebelong->id == 2 || $getcourse->coursebelong->id == 3 || $getcourse->coursebelong->id == 4)
                                <img class="signatures" src="{{public_path('images/bse.png')}}" >
                                @elseif($getcourse->coursebelong->id == 5)
                                <img class="signatures" src="{{public_path('images/bsit.png')}}" >
                                @elseif($getcourse->coursebelong->id == 6)
                                <img class="signatures" src="{{public_path('images/bspa.png')}}" >
                                @elseif($getcourse->coursebelong->id == 7)
                                <img class="signatures" src="{{public_path('images/bssw.png')}}" >
                                @elseif($getcourse->coursebelong->id == 9)

                                @endif
                            @endif</td>
                            <td class="border-bottom centertext"><img class="signatures-reg" src="{{public_path('images/registrar.png')}}" ></td>
                        </tr>
                        <tr>
                            <td class="noborder signatories">DEAN</td>
                            <td class="noborder signatories">REGISTRAR</td>
                        </tr>
                    </tbody>
                </table>
        </div>

        </div>
    </div>

        



</body>
</html>