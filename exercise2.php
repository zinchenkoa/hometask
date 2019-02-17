<?php

require_once __DIR__ . '/students.php';

class Student
{
    const MAX_GPA = 4.0;

    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;

    /**
     * Student constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->firstName = $data['firstName'] ?? null;
        $this->lastName = $data['lastName'] ?? null;
        $this->gender = $data['gender'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->gpa = $data['gpa'] ?? null;
    }

    /**
     * Print student's attribute variables
     */
    public function showMyself(): void
    {
        echo $this->firstName . ' ' . $this->lastName . ' ' . $this->gender . ' ' .
            $this->status . ' ' . $this->gpa . PHP_EOL;
    }

    /**
     * @param int $studyTime
     * @return float
     */
    public function studyTime(int $studyTime): float
    {
        if ($studyTime <= 0) {
            return $this->gpa;
        }

        $gpa = $this->gpa + log10($studyTime);

        return $gpa >= self::MAX_GPA
            ? $this->gpa = self::MAX_GPA
            : $this->gpa = $gpa;
    }
}

$studentList = [];
foreach ($studentsData as $student) {
    $studentList[] = new Student($student);
}

foreach ($studentList as $student) {
    $student->showMyself();
}