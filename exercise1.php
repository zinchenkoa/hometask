<?php

class Student
{
    const MAX_GPA = 4.0;

    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;

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