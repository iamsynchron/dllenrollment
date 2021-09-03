
    <footer>This is a system generated form. Generated on {{ Carbon\Carbon::now() }}</footer>
   
    {{-- REGISTRAR'S COPY --}}
    <div style="border: 2px solid black">
        <div style="margin: 10px 10px 10px 10px">
            <div class="registry">Registry No.___</div>
    <div class="reg-acc-copy">(Registrar&apos;s Copy)</div>
    
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
                <td class="border-bottom centertext">{{ $info->personalid }}</td>
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
                <td class="border-bottom centertext">
                    @if (!is_null($getcourse))
                       {{ $getcourse->coursebelong->course_code }}-{{$getcourse->section}}
                    @else
                        &nbsp;
                    @endif
                </td>
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
                                @endif
                        </td>
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
                            <td class="border-bottom centertext">
                                @if (!is_null($getcourse))
                                    @if ($getcourse->coursebelong->id == 1 || $getcourse->coursebelong->id == 8)
                                    <img class="signatures-abels" src="{{public_path('images/abels.png')}}" >
                                    @elseif ($getcourse->coursebelong->id == 2 || $getcourse->coursebelong->id == 3 || $getcourse->coursebelong->id == 4)
                                    <img class="signatures-bse" src="{{public_path('images/bse.png')}}" >
                                    @elseif($getcourse->coursebelong->id == 5)
                                    <img class="signatures-bsit" src="{{public_path('images/bsit.png')}}" >
                                    @elseif($getcourse->coursebelong->id == 6)
                                    <img class="signatures-bspa" src="{{public_path('images/bspa.png')}}" >
                                    @elseif($getcourse->coursebelong->id == 7)
                                    <img class="signatures-bssw" src="{{public_path('images/bssw.png')}}" >
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

        



     {{-- ACCOUNTANT'S COPY --}}
<div style="margin-top:5px; border: 2px solid black">
        <div style="margin: 10px 10px 10px 10px">
            <div class="registry">Registry No.___</div>
    <div class="reg-acc-copy">(Accountant&apos;s Copy)</div>
    
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
                    @if(!is_null($info->studentpersonal->lastname)) {{Str::upper($info->studentpersonal->lastname)}} @if(!is_null($info->studentpersonal->extension)) {{Str::upper($info->studentpersonal->extension)}} @endif  @else &nbsp; @endif
                    @endif</td>
                <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->firstname)) {{Str::upper($info->studentpersonal->firstname)}}  @else &nbsp; @endif
                    @endif</td>
                <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->middlename)) {{Str::upper($info->studentpersonal->middlename)}}  @else &nbsp; @endif
                    @endif</td>
                <td class="noborder righttext">Student ID:</td>
                <td class="border-bottom centertext">{{ $info->personalid }}</td>
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
        


        {{-- SUBJECTS --}}
        <div class="clearfix">         
                <div style="float: left; width:60%;">
                    <table style="width: 100%">
                        <tbody>
                        <tr>
                        <td class="noborder">Sex:</td>
                        <td class="border-bottom centertext">@if (!is_null($info->studentpersonal))
                            @if(!is_null($info->studentpersonal->sex)) {{$info->studentpersonal->sex == '1' ? 'Male' : 'Female'}}  @else &nbsp; @endif
                            @endif</td>
                        <td class="noborder righttext">LRN:</td>
                        <td class="border-bottom centertext">@if (!is_null($info->studentschoolone))
                            @if(!is_null($info->studentschoolone->lrn)) {{$info->studentschoolone->lrn}}  @else &nbsp; @endif
                        @endif</td>                   
                        </tr>
                        
                        <tr>
                        <td class="noborder">Course/Year:</td>
                        <td class="border-bottom centertext">
                            @if (!is_null($getcourse))
                            {{ $getcourse->coursebelong->course_code }}-{{$getcourse->section}}
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td colspan="2" class="noborder">{{$semester->semester}}, {{$semester->schoolyear}}</td>
                        </tr>

                        </tbody>
                        </table>
                
                <table class="bordertbl" style="width: 100%">
                    <tbody>
                    <tr>
                        <th rowspan="2">SUBJ. CODE</th>
                        <th rowspan="2">SUBJ. DESCRIPTION</th>
                        <th colspan="2">UNITS</th>
                    </tr>
                    <tr>
                        <th>LEC</th>
                        <th>LAB</th>
                    </tr>
                    @foreach ($getsubject as $subject)
                    <?php 
                        if($subject->subject_unittype == 'lec'){
                            $tuition += 550;
                        }
                        elseif($subject->subject_unittype == 'nstp'){
                            $nstpfee += 825;
                        }
                        elseif($subject->subject_unittype == 'lab'){
                            $tuition += 550;
                            $laboratory += 250;
                        }
                        elseif($subject->subject_unittype == 'com'){
                            $tuition += 550;
                            $computer += 250;
                        }
                    ?>
                    <tr>
                        <td class="fitcell">{{$subject->subject_code}}</td>
                        <td class="fitcell">{{$subject->subject_desc}}</td>
                        <td class="fitcell centertext">@if($subject->subject_unittype == 'lec'){{$subject->subject_units}}@else&nbsp;@endif</td>
                        <td class="fitcell centertext">@if($subject->subject_unittype == 'lab'){{$subject->subject_units}}@else&nbsp;@endif</td>
                    </tr>
                    @endforeach
                    @for ($i = count($getsubject); $i < 12; $i++)
                                <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                </tr>
                    @endfor

                    <tr>
                        <td></td>
                        <td class="righttext totalunit">Total Units:</td>
                        <td colspan="2" class="centertext totalunit">@if (!is_null($getsubject))
                            {{$unitstotal}}
                        @else
                            0
                        @endif</td>
                        </tr>               
                    </tbody>
                    </table>
                    <p class="prerequisites">WARNING: Subjects taken without prerequisites will not be credited.</p>
                </div>
                    

            {{-- ASSESSMENT --}}
            <table style="float: right; width:35%; border: 1px dotted black;">
                <tbody>

                   {{-- Tuition fee  --}}
                <tr>
                    <td class="font-small noborder righttext ">Tuition Fee:</td>
                    <td class="font-small noborder centertext">@if ($tuition == 0)
                        -
                    @else
                    {{number_format((float)$tuition, 2, '.', '')}}
                    @endif</td>
                </tr>
                <tr>
                    <td class="font-small noborder righttext">NSTP Fee:</td>
                    <td class="font-small noborder centertext">@if ($nstpfee == 0)
                        -
                    @else
                    {{number_format((float)$nstpfee, 2, '.', '')}}
                    @endif</td>
                </tr>    
                <tr>
                    <?php $totaltuition = $tuition + $nstpfee ?>
                    <th class="font-small noborder righttext totalamount">Total Tuition Fee:</th>
                    <th class="font-small noborder centertext totalamount underline">@if ($totaltuition == 0)
                        -
                    @else
                    {{number_format((float)$totaltuition, 2, '.', '')}}
                    @endif</th>
                </tr>

                <tr>
                <td class="font-small noborder totalamount">Miscellaneous Fees</td>
                <td class="noborder">&nbsp;</td>
                </tr>
                    @if ($studstatus->type == '1' || $studstatus->type == '3')
                        <?php 
                            $handbook = 100;
                            $schoolid = 150;
                            $admission = 500;
                        ?>
                    @endif
                <tr>
                <td class="font-small noborder">Athletic Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['athletic'], 2, '.', '')}}</td>
                </tr>

                <tr>
                <td class="font-small noborder">Computer Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$computer, 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">Cultural Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['cultural'], 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">Development Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['development'], 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">Guidance Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['guidance'], 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">Handbook Fee:</td>
                <td class="font-small noborder centertext">@if ($handbook == 0)
                    -
                @else
                    {{number_format((float)$handbook, 2, '.', '')}}
                @endif</td>
                </tr>
                <tr>
                <td class="font-small noborder">Laboratory Fee:</td>
                <td class="font-small noborder centertext">@if ($laboratory == 0)
                    -
                @else
                    {{number_format((float)$laboratory, 2, '.', '')}}
                @endif</td>
                </tr>
                <tr>
                <td class="font-small noborder">Library Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['library'], 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">Medical/Dental Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['medical'], 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">Registration Fee:</td>
                <td class="font-small noborder centertext">{{number_format((float)$fixed_fee['registration'], 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="font-small noborder">School ID Fee:</td>
                <td class="font-small noborder centertext">@if ($schoolid == 0)
                    -
                @else
                    {{number_format((float)$schoolid, 2, '.', '')}}
                @endif</td>
                </tr>
                <tr>
                <td class="font-small noborder">Admision Fee:</td>
                <td class="font-small noborder centertext">@if ($admission == 0)
                    -
                @else
                    {{number_format((float)$admission, 2, '.', '')}}
                @endif</td>
                </tr>

                <?php
                    $totalmisc = array_sum($fixed_fee) + $handbook + $schoolid + $admission + $computer + $laboratory ;
                ?>
                <tr>
                <td class="noborder totalamount">Total Misc.:</td>
                <td class="centertext totalamount border-bottom">{{number_format((float)$totalmisc, 2, '.', '')}}</td>
                </tr>
                <tr>
                <td class="noborder">&nbsp;</td>
                <td class="noborder centertext">&nbsp;</td>
                </tr>
                <?php
                    $total = $tuition + $totalmisc;
                ?>
                <tr>
                <td class="noborder centertext totalamount">GRAND TOTAL:</td>
                <td class="noborder centertext totalamount">{{number_format((float)$total, 2, '.', '')}}</td>
                </tr>               
                </tbody>
                </table>
                
        </div>

            
        </div>

        <div class="clearfix" style="margin-top: 4pt; margin-left: 7pt;">
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
                            <td class="border-bottom centertext"> @if (!is_null($info->studentsignature))  <img class="signatures-stud" src="{{public_path('upload/student-signatures/').$info->studentsignature->image_path}}" >  @endif</td>
                            <td class="border-bottom centertext"><img class="signatures-reg" src="{{public_path('images/registrar.png')}}" ></td>
                        </tr>
                        <tr>
                            <td class="noborder signatories">Signature of Student</td>
                            <td class="noborder signatories">REGISTRAR</td>
                        </tr>
                    </tbody>
                </table>
        </div>

        </div>
    </div>