<?php

namespace Shankl\Services;

use Shankl\Repositories\TeacherRepository;

class TeacherService{

    private $teacherRebo;

    public function __construct(TeacherRepository $teacherRebo)
    {
        $this->teacherRebo = $teacherRebo;
    }


    public function updateProfile($data){

        $this->teacherRebo->update($data);
    }
}