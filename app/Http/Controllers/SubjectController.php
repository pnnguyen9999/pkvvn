<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function getAllSubjects(){
      $subjects = Subject::all();
      $formatted_subjects = [];

      foreach($subjects as $subject){
        $formatted_subjects[] = ['id' => $subject->id,'text' => $subject->name];
      }

      return response()->json($formatted_subjects);
    }
}
