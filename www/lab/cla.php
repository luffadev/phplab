<?php
class Student
{
    private $fname;
    public $laname;
    private $telno;
    private $score;
    private $grade;
    function __construct($fname, $lname)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->telno = "0000000";
    }
    public function getTelno()
    {
        return $this->telno;
    }
    public function setFname($fname)
    {
        $this->fname = $fname;
    }
    public function getFname()
    {
        return $this->fname;
    }
    public function setLname($lname)
    {
        $this->lname = $lname;
    }
    public function getLname()
    {
        return $this->lname;
    }
    public function setScore($score)
    {
        $this->score = $score;
    }
    public function getGrade()
    {
        if (isset($this->score)) {
            switch ($this->score) {
                case ($this->score > 79):
                    $this->grade = 'A';
                    break;
                case ($this->score > 69 && $this->score < 80):
                    $this->grade = 'B';
                    break;
                case ($this->score > 59 && $this->score < 70):
                    $this->grade = 'C';
                    break;
                case ($this->score > 49 && $this->score < 60):
                    $this->grade = 'C';
                    break;
                case ($this->score < 50):
                    $this->grade = 'F';
                    break;
                default:
                    $this->grade = 'F';
                    break;
            }
        } else {
            $this->grade = 'F';
        }
       return $this->grade;
    }

}
$suradet = new Student('Suradet1', 'Petcharanon');
$score = 90;
$suradet->setScore($score);
echo "ชื่อ: " . $suradet->getFname() ."<br>";
echo "นามสกุล: " . $suradet->getLname() . "<br>";
echo "คะแนน: " . $score."<br>";
echo "เกรด: " . $suradet->getGrade() . "<br>";

$somchai = new Student('Somchai', 'Petcharanon');
$score = 50;
$suradet->setScore($score);
echo "ชื่อ: " . $somchai->getFname() . "<br>";
echo "นามสกุล: " . $somchai->getLname() . "<br>";
echo "คะแนน: " . $score . "<br>";
echo "เกรด: " . $somchai->getGrade() . "<br>";
