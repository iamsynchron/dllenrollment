<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MIS Form | {{auth()->user()->personalid}}</title>
    <style>
        #headings{
            font-size: 17pt;
            font-weight: 600;
            margin: 0;
            padding: 0;
        }

        #formerly{
            font-size: 12pt;
            font-weight: 600;
            margin: 0;
            padding: 0;
        }

        #contact{
            font-size: 11pt;
            margin: 0;
            padding: 0;
        }

        .setfont{
            font-family: "Times New Roman";
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            padding-left: 5px;
        }

        #signature{
            width: 150px;
        }

        table{
            width: 100%;
        }

        .page-break {
            page-break-after: always;
        }

        #misform{
            font-weight: 600;
        }

        .ui-helper-center {
            text-align: center;
        }

        #logo{
            width: 100px;
        }

        #logo-container{
            position: absolute;
            left: 75px;
        }


        footer { position: fixed; font-size: 8pt; bottom: -60px; left: 0px; right: 0px; height: 50px; }
    </style>
</head>
<body>
    <footer>This is a system generated form. Generated on {{ Carbon\Carbon::now() }}</footer>
        <div id="header" class="setfont">
                {{-- <div id="logo-container"><img id="logo" src="{{public_path('images/logo.png')}}" ></div> --}}
                <span id="headings">
                    Dalubhasaan ng Lungsod ng Lucena <br>
                </span>
                <p id="formerly">
                    (Formerly City College of Lucena)<br>
                </p>
                <p id="contact">
                    City College Main Bldg. Isabang, Lucena City<br>
                    Tel. No. & Telefax No.  (042) 797-1671 
                <p>
                <p id="misform">MIS Form</p>
        </div>

        <div>
            <table>
                <tbody>
                <tr>
                <td>Student ID:</td>
                <td>{{ auth()->user()->personalid }}</td>
                <td>Learner&apos;s Reference Number:</td>
                <td>@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->lrn)) {{$info->studentschoolone->lrn}}  @else &nbsp; @endif
                @endif  </td>
                </tr>
                <tr>
                <td>Course:</td>
                <td>@if (!is_null($getcourse))
                    {{ $getcourse->coursebelong->course_code }}
                 @else
                     &nbsp;
                 @endif</td>
                <td>Year and Section:</td>
                <td>@if (!is_null($getcourse))
                    {{$getcourse->section}}
                 @else
                     &nbsp;
                 @endif</td>
                </tr>
                <tr>
                <td>Number of Units Enrolled:</td>
                @if (!is_null($getsubject))
                @foreach ($getsubject as $subject)
                    <?php
                    $unitstotal += $subject->subject_units;
                    ?>
                @endforeach
                @endif
                <td>@if (!is_null($getsubject))
                    {{$unitstotal}}
                @else
                    0
                @endif</td>
                <td>Student Type:</td>
                <td>@if (!is_null($getcourse))
                        @if ($studtype->pivot->studtype == 'reg')
                            Regular Student
                        @elseif($studtype->pivot->studtype == 'irreg')
                            Irregular Student
                        @endif
                      @else
                        &nbsp;
                      @endif</td>
                </tr>
                </tbody>
                </table>
        </div>

        <div style="margin-top: 12pt">           
            <table>
                <tbody>
                <tr>
                    <th colspan="4">Personal Information</th>
                </tr>
                <tr>
                <td>Surname:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->lastname)) {{Str::title($info->studentpersonal->lastname)}}  @else &nbsp; @endif
                    @endif </td>
                <td>Civil Status:</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->civilstatus)) {{$info->studentadditional->civilstatus}}  @else &nbsp; @endif
                @endif </td>
                </tr>
                <tr>
                <td>First Name:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->firstname)) {{Str::title($info->studentpersonal->firstname)}}  @else &nbsp; @endif
                @endif </td>
                <td>Religion:</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->religion)) {{$info->studentadditional->religion}}  @else &nbsp; @endif
                @endif </td>
                </tr>
                <tr>
                <td>Middle Name:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->middlename)) {{Str::title($info->studentpersonal->middlename)}}  @else &nbsp; @endif
                    @endif </td>
                <td>Citizenship:</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->citizenship)) {{$info->studentadditional->citizenship}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Extension:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->extension)) {{Str::title($info->studentpersonal->extension)}}  @else &nbsp; @endif
                    @endif </td>
                <td>Email:</td>
                <td>{{auth()->user()->email}}</td>
                </tr>
                <tr>
                <td>Date of Birth:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->birthday)) {{ date('F j, Y', strtotime($info->studentpersonal->birthday))}}  @else &nbsp; @endif
                    @endif </td>
                <td>Telephone:</td>
                <td>@if (!is_null($info->studentcontact))
                    @if(!is_null($info->studentcontact->telephonenumber)) {{$info->studentcontact->telephonenumber}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Place of Birth:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->birthplace)) {{$info->studentpersonal->birthplace}}  @else &nbsp; @endif
                    @endif </td>
                <td>Mobile:</td>
                <td>@if (!is_null($info->studentcontact))
                    @if(!is_null($info->studentcontact->mobilenumber)) {{$info->studentcontact->mobilenumber}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Sex:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->sex)) {{$info->studentpersonal->sex == '1' ? 'Male' : 'Female'}}  @else &nbsp; @endif
                    @endif </td>
                <td>Student with Special Needs?</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->specialOption)) {{$info->studentadditional->specialOption == '1' ? 'Yes' : 'No'}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Gender:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->gender)) {{$info->studentpersonal->gender}}  @else &nbsp; @endif
                    @endif </td>
                <td>Type of Disability:</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->specialdisability)) {{$info->studentadditional->specialdisability}}  @else Not Applicable @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Weight:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->weight)) {{$info->studentpersonal->weight}}kg  @else &nbsp; @endif
                    @endif </td>
                <td>Indigenous Person?</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->indigenousRadio)) {{$info->studentadditional->indigenousRadio == '1' ? 'Yes' : 'No'}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Height:</td>
                <td>@if (!is_null($info->studentpersonal))
                    @if(!is_null($info->studentpersonal->height)) {{$info->studentpersonal->height}} cm  @else &nbsp; @endif
                    @endif </td>
                <td>Minority Group:</td>
                <td>@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->indigenousminority)) {{$info->studentadditional->indigenousminority}}  @else Not Applicable @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Residential Address:</td>
                <td  colspan="3">@if (!is_null($info->studentcontact))
                    @if (!is_null($info->studentcontact->res_street))
                        {{$info->studentcontact->res_street}}, 
                    @endif
                    {{$info->studentcontact->res_brgy}}, {{$info->studentcontact->res_city}}, {{$info->studentcontact->res_province}} {{ $info->studentcontact->res_zip}}
                @endif</td>
                </tr>
                <tr>
                <td>Permanent Address:</td>
                <td  colspan="3">
                    @if (!is_null($info->studentcontact))
                        @if ($info->studentcontact->is_permanent == '1')
                            Same as Residential Address
                        @else
                            @if (!is_null($info->studentcontact->per_street))
                            {{$info->studentcontact->per_street}}, 
                            @endif
                            {{$info->studentcontact->per_brgy}}, {{$info->studentcontact->per_city}}, {{$info->studentcontact->per_province}} {{ $info->studentcontact->per_zip}}
                        @endif
                    @endif
                </td>
                </tr>
                </tbody>
                </table>
        </div>

        <div style="margin-top: 12pt">
            <table>
                <tbody>
                <tr>
                    <th colspan="4">Family Background</th>
                </tr>
                <tr>
                <td>Father's Surname:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_lname)) {{Str::title($info->studentfamily->father_lname)}}  @else &nbsp; @endif
                @endif </td>
                </tr>
                <tr>
                <td>First Name:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_fname)) {{Str::title($info->studentfamily->father_fname)}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Middle Name:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_mname)) {{Str::title($info->studentfamily->father_mname)}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Occupation:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_occup)) {{$info->studentfamily->father_occup}}  @else &nbsp; @endif
                    @endif </td>
                <td>Contact:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_mobile)) {{$info->studentfamily->father_mobile}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Address:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_address)) {{$info->studentfamily->father_address}}  @else &nbsp; @endif
                    @endif </td>
                <td>Age:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->father_age)) {{$info->studentfamily->father_age}}  @else &nbsp; @endif
                    @endif </td>
                </tr>

                
                <tr>
                <td>Mother's Surname:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_lname)) {{Str::title($info->studentfamily->mother_lname)}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>First Name:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_fname)) {{Str::title($info->studentfamily->mother_fname)}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Middle Name:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_mname)) {{Str::title($info->studentfamily->mother_mname)}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Occupation:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_occup)) {{$info->studentfamily->mother_occup}}  @else &nbsp; @endif
                    @endif </td>
                <td>Contact:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_mobile)) {{$info->studentfamily->mother_mobile}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Address:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_address)) {{$info->studentfamily->mother_address}}  @else &nbsp; @endif
                    @endif </td>
                <td>Age:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if(!is_null($info->studentfamily->mother_age)) {{$info->studentfamily->mother_age}}  @else &nbsp; @endif
                    @endif </td>
                </tr>

                <tr>
                <td>Guardian (Relationship):</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        Father
                    @elseif($info->studentfamily->guardianOption == '2')
                        Mother
                    @elseif($info->studentfamily->guardianOption == '3')
                        {{$info->studentfamily->guardian_rel}}
                    @endif
                @endif</td>
                </tr>
                <tr>
                <td>Guardian's Surname:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_lname)) {{Str::title($info->studentfamily->guardian_lname)}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                </tr>
                <tr>
                <td>First Name:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_fname)) {{Str::title($info->studentfamily->guardian_fname)}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                </tr>
                <tr>
                <td>Middle Name:</td>
                <td colspan="3">@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_mname)) {{Str::title($info->studentfamily->guardian_mname)}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                </tr>
                <tr>
                <td>Occupation:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_occup)) {{$info->studentfamily->guardian_occup}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                <td>Contact:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_mobile)) {{$info->studentfamily->guardian_mobile}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                </tr>
                <tr>
                <td>Address:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_address)) {{$info->studentfamily->guardian_address}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                <td>Age:</td>
                <td>@if (!is_null($info->studentfamily))
                    @if ($info->studentfamily->guardianOption == '1')
                        --
                    @elseif($info->studentfamily->guardianOption == '2')
                        --
                    @elseif($info->studentfamily->guardianOption == '3')
                    @if(!is_null($info->studentfamily->guardian_age)) {{$info->studentfamily->guardian_age}}  @else &nbsp; @endif
                    @endif
                @endif</td>
                </tr>
                </tbody>
                </table>
        </div>

        <div style="margin-top: 12pt">
            <table>
                <tbody>
                <tr>
                    <th colspan="4">School Background</th>
                </tr>
                <tr>
                <td colspan="4">Primary (Elementary)</td>
                </tr>
                <tr>
                <td>School Name:</td>
                <td colspan="3">@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->elemSchool)) {{$info->studentschoolone->elemSchool}}  @else &nbsp; @endif
                @endif </td>
                </tr>
                <tr>
                <td>Year Attended:</td>
                <td>@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->elemAttended)) {{$info->studentschoolone->elemAttended}}  @else &nbsp; @endif
                    @endif </td>
                <td>Year Graduated:</td>
                <td>@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->elemGraduated)) {{$info->studentschoolone->elemGraduated}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Honor(s) Received:</td>
                <td colspan="3">@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->elemHonor)) {{$info->studentschoolone->elemHonor}}  @else None @endif
                    @endif </td>
                </tr>

                
                <tr>
                <td colspan="4">Secondary (Junior High School)</td>
                </tr>
                <tr>
                <td>School Name:</td>
                <td colspan="3">@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->juniorSchool)) {{$info->studentschoolone->juniorSchool}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Year Attended:</td>
                <td>@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->juniorAttended)) {{$info->studentschoolone->juniorAttended}}  @else &nbsp; @endif
                    @endif </td>
                <td>Year Graduated:</td>
                <td>@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->juniorGraduated)) {{$info->studentschoolone->juniorGraduated}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Honor(s) Received:</td>
                <td colspan="3">@if (!is_null($info->studentschoolone))
                    @if(!is_null($info->studentschoolone->juniorHonor)) {{$info->studentschoolone->juniorHonor}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                    <th colspan="4">Page 1 of 2</th>
                </tr>


                </tbody>
                </table>

        </div>

        <div class="page-break"></div>
        

        <div>
            <table>
                <tbody>
                <tr>
                    <th colspan="4">School Background</th>
                </tr>

                <tr>
                <td colspan="4">Secondary (Senior High School)</td>
                </tr>
                <tr>
                <td>School Name:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->seniorSchool)) {{$info->studentschooltwo->seniorSchool}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Track and Strand:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->seniorStrand)) {{$track[$info->studentschooltwo->seniorStrand]}}  @else &nbsp; @endif
                    @endif</td>
                </tr>
                <tr>
                <td>Year Attended:</td>
                <td>@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->seniorAttended)) {{$info->studentschooltwo->seniorAttended}}  @else &nbsp; @endif
                    @endif </td>
                <td>Year Graduated:</td>
                <td>@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->seniorGraduated)) {{$info->studentschooltwo->seniorGraduated}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Honor(s) Received:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->seniorHonor)) {{$info->studentschooltwo->seniorHonor}}  @else &nbsp; @endif
                    @endif </td>
                </tr>



                <tr>
                <td colspan="4">Vocational (Trade Course)</td>
                </tr>
                <tr>
                <td>School Name:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalSchool)) {{$info->studentschooltwo->vocationalSchool}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Course:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalCourse)) {{$info->studentschooltwo->vocationalCourse}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Highest level/Units Earned (If not graduated):</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalUnits)) {{$info->studentschooltwo->vocationalUnits}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Year Attended:</td>
                <td>@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalAttended)) {{$info->studentschooltwo->vocationalAttended}}  @else None @endif
                    @endif </td>
                <td>@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalOptiongrad))
                        @if($info->studentschooltwo->vocationalOptiongrad == '1')
                            Year Graduated
                        @elseif($info->studentschooltwo->vocationalOptiongrad == '2')
                            Year Stopped
                        @endif
                    @else
                        Year Graduated:
                    @endif
                @endif</td>
                <td>@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalGraduated))
                        {{$info->studentschooltwo->vocationalGraduated}}
                    @else
                    None
                    @endif
                @else
                None    
                @endif</td>
                </tr>
                <tr>
                <td>Honor(s) Received:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->vocationalHonor)) {{$info->studentschooltwo->vocationalHonor}}  @else None @endif
                    @endif </td>
                </tr>

          
                <tr>
                <td colspan="4">College (Tertiary)</td>
                </tr>
                <tr>
                <td>School Name:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->collegeSchool)) {{$info->studentschooltwo->collegeSchool}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Course:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->collegeCourse)) {{$info->studentschooltwo->collegeCourse}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Highest level/Units Earned (If not graduated):</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->collegeUnits)) {{$info->studentschooltwo->collegeUnits}}  @else None @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Year Attended:</td>
                <td>@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->collegeAttended)) {{$info->studentschooltwo->collegeAttended}}  @else None @endif
                    @endif </td>
                    <td>@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->collegeOptiongrad))
                            @if($info->studentschooltwo->collegeOptiongrad == '1')
                                Year Graduated
                            @elseif($info->studentschooltwo->collegeOptiongrad == '2')
                                Year Stopped
                            @endif
                        @else
                            Year Graduated:
                        @endif
                    @endif</td>
                    <td>@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->collegeGraduated))
                            {{$info->studentschooltwo->collegeGraduated}}
                        @else
                        None
                        @endif
                        @else
                            None
                        @endif</td>
                </tr>
                <tr>
                <td>Honor(s) Received:</td>
                <td colspan="3">@if (!is_null($info->studentschooltwo))
                    @if(!is_null($info->studentschooltwo->collegeHonor)) {{$info->studentschooltwo->collegeHonor}}  @else None @endif
                    @endif </td>
                </tr>

                <tr>
                    <td colspan="4">Transferred from other school</td>
                    </tr>
                    <tr>
                    <td>School Name:</td>
                    <td colspan="3">@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->transferSchool)) {{$info->studentschooltwo->transferSchool}}  @else None @endif
                        @endif </td>
                    </tr>
                    <tr>
                    <td>Course:</td>
                    <td colspan="3">@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->transferCourse)) {{$info->studentschooltwo->transferCourse}}  @else None @endif
                        @endif </td>
                    </tr>
                    <tr>
                    <td>Highest level:</td>
                    <td colspan="3">@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->transferUnits)) {{$info->studentschooltwo->transferUnits}}  @else None @endif
                        @endif </td>
                    </tr>
                    <tr>
                    <td>Year Attended:</td>
                    <td>@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->transferAttended)) {{$info->studentschooltwo->transferAttended}}  @else None @endif
                        @endif </td>
                    <td>Year Transferred:</td>
                    <td>@if (!is_null($info->studentschooltwo))
                        @if(!is_null($info->studentschooltwo->transferTransferred)) {{$info->studentschooltwo->transferTransferred}}  @else None @endif
                        @endif </td>
                    </tr>
                </tbody>
                </table>

        </div>

        <div style="margin-top: 12pt">
            <table>
                <tbody>
                <tr>
                    <th colspan="4">Insurance Beneficiary</th>
                </tr>
                <tr>
                <td>Beneficiary:</td>
                <td colspan="3">@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->insuranceOption)) {{$info->studentadditional->insuranceOption == '1' ? 'Parents/Guardian' : 'Other'}}  @else &nbsp; @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Father's Surname:</td>
                <td colspan="3">@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->insurance_lname)) {{$info->studentadditional->insurance_lname}}  @else -- @endif
                    @endif </td>
                </tr>
                <tr>
                <td>First Name:</td>
                <td colspan="3">@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->insurance_fname)) {{$info->studentadditional->insurance_fname}}  @else -- @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Middle Name:</td>
                <td colspan="3">@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->insurance_mname)) {{$info->studentadditional->insurance_mname}}  @else -- @endif
                    @endif </td>
                </tr>
                <tr>
                <td>Contact:</td>
                <td colspan="3">@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->insurance_mobile)) {{$info->studentadditional->insurance_mobile}}  @else -- @endif
                    @endif </td> 
                </tr>
                <tr>
                <td>Address:</td>
                <td colspan="3">@if (!is_null($info->studentadditional))
                    @if(!is_null($info->studentadditional->insurance_address)) {{$info->studentadditional->insurance_address}}  @else -- @endif
                    @endif </td>
                </tr>
                <tr>
                    <th colspan="4">Page 2 of 2</th>
                </tr>
                </tbody>
            </table>
        </div>


        <div style="margin-top: 12pt">           
            <table>
                <tbody>
                    <tr>
                        <th>Signature</th>
                      </tr>
                      <tr>
                        <td rowspan="4" class="ui-helper-center"> @if (!is_null($info->studentsignature))  <img id="signature" src="{{public_path('upload/student-signatures/').$info->studentsignature->image_path}}" >  @endif</td>                   
                    </tr>
                      <tr>
                        
                      </tr>
                      <tr>
                        
                      </tr>
                      <tr>
                        
                      </tr>
                      <tr>
                          <td class="ui-helper-center">Student Signature</td>
                      </tr>
                </tbody>
            </table>
        </div>

</body>
</html>