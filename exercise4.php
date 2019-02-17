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
     * @return string
     */
    public function __toString()
    {
        return $this->showMyself();
    }

    /**
     * @param $name
     * @return mixed
     * @throws Exception
     */
    public function __get(string $name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new Exception("Can't read a property $name");
    }

    /**
     * @param string $name
     * @param $value
     * @throws Exception
     */
    public function __set(string $name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
        throw new Exception("Can't set a property $name");
    }

    public function __sleep()
    {
        return ['firstName', 'lastName', 'gpa'];
    }

    /**
     * Print student's attribute variables
     * @return string
     */
    public function showMyself(): string
    {
        return $this->firstName . ' ' . $this->lastName . ' ' . $this->gender . ' ' .
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

$time = [60, 100, 40, 300, 1000];

$studentList = [];
foreach ($studentsData as $student) {
    /** @var Student[] $studentList */
    $studentList[] = new Student($student);
}

foreach ($studentList as $student) {
    echo $student;
}

$i = 0;
foreach ($studentList as $student) {
    $student->studyTime($time[$i]);
    $i++;
}

foreach ($studentList as $student) {
    echo $student;
}

try {
    $studentList[0]->status = 'senior' . PHP_EOL;
    $studentList[0]->name = 'Alex' . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

try {
    echo $studentList[0]->status . PHP_EOL;
    echo $studentList[0]->statu . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

foreach ($studentList as $student) {
    echo serialize($student) . PHP_EOL;
}
