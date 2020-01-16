<?php

namespace App;


class Student
{
    public $students  = [];
    public $fst;
    public $mega;
    public $dossier;
 
    public function __construct($payment = null)
    {
        if($payment) {
 
            $this->students = $payment->student;
            $this->fst      = $payment->fst;
            $this->mega     = $payment->mega;
            $this->dossier  = $payment->dossier;
        }else {
            $this->students = [];
            $this->fst      = 0;
            $this->mega     = 0;
            $this->dossier  = 0; 
        }
    }
    public function add($user)
    {
        $student = [
              'fst'      => $user->fst,
              'mega'     => $user->mega,
              'dossier'  => $user->dossier,
              'type'     => $user->type,
        ];
        if(!array_key_exists($user->id,$this->students))
        {
            $this->students[$user->id] = $student;
            $this->fst                 = $user->fst;
            $this->mega                = $user->mega;
            $this->dossier             = $user->dossier;
        }else {
            $this->fst += $user->fst;
            $this->mega += $user->mega;
            $this->dossier += $user->dossier;
        }
    }
   
}
