<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminSectionReport extends Component
{

     //Database Models;
     public $courses;
     public $sections;
     public $subjects;

     //Select list
    public $sectionlist = null;

    public $coursemodel = null;
    public $sectionmodel = null;


    public function render()
    {
        // $subject = Section::with(['subjects', 'subjects.subjectToStudent', 'subjects.subjectToStudent.studentpersonal', 'subjects.subjectToStudent.studentcontact', 'subjects.subjectToStudent.studentToSection', 'subjects.subjectToStudent.studentformstatus'])->where('id', 6)->get();
        //  $getSubjects = $subject->pluck('subjects')->first();
        //  dd($getSubjects);

        return view('livewire.admin-section-report',[
            'courseslist' => $this->courses
        ]);
    }

    public function mount(){
        $this->courses = Course::all();
        $this->sections = Section::all();
    }

    public function updatedcoursemodel($course_id){
        $this->sectionlist = $this->sections->where('course_id', $course_id);   
     }


     public function submit(){
        $this->validate([
            'coursemodel' =>  'required',
            'sectionmodel' => 'required',
          ],
          [
            'coursemodel.required' => 'Course is required.',
            'sectionmodel.required' => 'Section is required.'
          ]);



        $getSection = Section::with('subjects', 'subjects.subjectToStudent', 'subjects.subjectToStudent.studentpersonal', 'subjects.subjectToStudent.studentcontact', 'subjects.subjectToStudent.studentToSection',  'subjects.subjectToStudent.studentformstatus')->where('id', $this->sectionmodel)->get();
        $getSubjects = $getSection->pluck('subjects')->first()->sortBy('studentpersonal.lastname',SORT_REGULAR,false)->sortBy('studentpersonal.firstname',SORT_REGULAR,false);

        //Create New Workbook
    
       $inputFileName = public_path('templates\section_template.xlsx');
       $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
       $spreadsheet = $reader->load(  $inputFileName);
       $sheet1 = $spreadsheet->getActiveSheet();

        //Loop Through Subjects
        foreach ($getSubjects as $subject) {
            //COPY SHEETS
            $sheet = $sheet1->copy();
            $sheet->setTitle($subject->subject_code);
	        $spreadsheet->addSheet($sheet);

            //SET SUBJECT INFO
            $sheet->setCellValue('A9', "INSTRUCTOR NAME: ".$subject->subject_teacher);
            $sheet->setCellValue('A10', "SUBJECT/NO. OF UNITS: ".$subject->subject_desc."/ ".$subject->subject_units);
            $sheet->setCellValue('D10', "TIME/DAYS: ".date('H:i a', strtotime($subject->subject_from))."-".date('H:i a', strtotime($subject->subject_to))." ".$subject->subject_day);
            
            $name_iterate = 13;
            $students = $subject->subjectToStudent->whereIn('studentformstatus.form1', 1)
            ->whereIn('studentformstatus.form2', 1)
            ->whereIn('studentformstatus.form3', 1)
            ->whereIn('studentformstatus.form4', 1)
            ->whereIn('studentformstatus.form5', 1)
            ->whereIn('studentformstatus.form6', 1)
            ->whereIn('studentformstatus.section', 1)
            ->whereIn('studentformstatus.signature', 1)->sortBy('studentpersonal.lastname',SORT_REGULAR,false)->sortBy('studentpersonal.firstname',SORT_REGULAR,false)->all();


            foreach ($students as $stud) {

                $sheet->setCellValue('A'.strval($name_iterate), strval($name_iterate - 12));
		        $sheet->setCellValue('B'.strval($name_iterate), $stud->personalid);
                $sheet->setCellValue('C'.strval($name_iterate), $stud->studentpersonal->lastname.", ".$stud->studentpersonal->firstname." ".$stud->studentpersonal->middlename);
                $sheet->setCellValue('D'.strval($name_iterate), $this->getCourse($stud->studentToSection->first()->course_id)."-".$stud->studentToSection->first()->section);
                if($stud->studentpersonal->sex == 1){
                    $sheet->setCellValue('E'.strval($name_iterate), 'M');
                }
                else{
                    $sheet->setCellValue('E'.strval($name_iterate), 'F');
                }
                $sheet->setCellValue('G'.strval($name_iterate), $stud->studentcontact->mobilenumber);
		        $sheet->setCellValue('H'.strval($name_iterate), $stud->email);
                $name_iterate++;
            }
        }


        //Save Excel
       $spreadsheet->removeSheetByIndex(0);
       $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $response = new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="'.$this->getCourse($this->coursemodel).'-'.$getSection->first()->section.'.xlsx"');
        $response->headers->set('Cache-Control', 'max-age=0');
        return $response;

     }

     public function backPage(){
        return redirect()->route('excelreport');
    }


    public function getCourse($courseid){
        switch ($courseid) {
            case 1:
        return  'ABELS';
                break;
            case 2:
        return  'BSA';
                break;
            case 3:
        return  'BSAIS';
                break;
            case 4:
        return  'BSEntrep';
                break;
            case 5:
        return  'BSIT';
                break;
            case 6:
        return  'BSPA';
                break;
            case 7:
        return  'BSSW';
                break;
            case 8:
        return  'BTVTE';
                break;
            case 9:
        return  'DHRS';
                break;                   
            default:
        return  'ERROR';
                break;
        }
    }


}
