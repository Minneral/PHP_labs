<?php

// utils
{
    function output($str)
    {
        echo nl2br($str);
    }

    function pretty_open()
    {
        static $task_number = 1;
        output("<b>Задание {$task_number}</b>\n\n");
        $task_number++;
    }

    function pretty_close()
    {
        output("\n\n" . str_repeat('-', 200) . "\n\n\n");
    }
}

// 1
{
    pretty_open();


    class Student
    {
        public $name;
        public $age;
        public $group;

        public function printInfo()
        {
            output("Имя: {$this->name}\nВозраст: {$this->age}\nГруппа: {$this->group}\n\n");
        }
    }

    $s1 = new Student();
    $s1->name = 'Иван';
    $s1->age = 19;
    $s1->group = 4;

    $s2 = new Student();
    $s2->name = 'Вася';
    $s2->age = 20;
    $s2->group = 4;


    $s1->printInfo();
    $s2->printInfo();
    output("Сумма возрастов: " . ($s1->age + $s2->age) . "\n\n");

    pretty_close();
}

// 2
{
    pretty_open();


    class Student2
    {
        private $name;
        private $age;
        private $group;

        public function setName($str)
        {
            $this->name = $str;
        }

        public function setAge($age)
        {
            if ($this->checkAge($age))
                $this->age = $age;
        }

        public function setGroup($group)
        {
            $this->group = $group;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function getGroup()
        {
            return $this->group;
        }

        private function checkAge($age)
        {
            return ($age >= 0 && $age <= 100);
        }

        public function printInfo()
        {
            output("Имя: {$this->name}\nВозраст: {$this->age}\nГруппа: {$this->group}\n\n");
        }
    }

    $s1 = new Student2();
    $s1->setName('Иван');
    $s1->setAge(19);
    $s1->setGroup(4);

    $s2 = new Student2();
    $s2->setName('Вася');
    $s2->setAge(20);
    $s2->setGroup(4);

    $s1->printInfo();
    $s2->printInfo();


    output("Сумма возрастов: " . ($s1->getAge() + $s2->getAge()) . "\n\n");

    pretty_close();
}

// 3
{
    pretty_open();


    class User
    {
        protected $name;
        protected $age;

        public function setName($str)
        {
            $this->name = $str;
        }

        public function setAge($age)
        {
            $this->age = $age;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getAge()
        {
            return $this->age;
        }

        public function printInfo()
        {
            output("\nТип: User\nИмя: {$this->name}\nВозраст: {$this->age}\n");
        }

        public function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }
    }

    class Worker extends User
    {
        private $salary;

        public function getSalary()
        {
            return $this->salary;
        }

        public function setSalary($salary)
        {
            $this->salary = $salary;
        }


        public function printInfo()
        {
            output("\nТип: Worker\nИмя: {$this->name}\nВозраст: {$this->age}\nЗарплата: {$this->salary}\n");
        }

        public function __construct($name, $age, $salary)
        {
            parent::__construct($name, $age);
            $this->salary = $salary;
        }
    }

    class Student3 extends User
    {
        private $stipendium;
        private $course;

        public function getCourse()
        {
            return $this->course;
        }

        public function setCourse($course)
        {
            $this->course = $course;
        }

        public function getStipendium()
        {
            return $this->stipendium;
        }

        public function setStipendium($stipendium)
        {
            $this->stipendium = $stipendium;
        }

        public function printInfo()
        {
            output("\nТип: Student\nИмя: {$this->name}\nВозраст: {$this->age}\Стипендия: {$this->stipendium}\nКурс: {$this->course}\n");
        }

        public function __construct($name, $age, $stipendium, $course)
        {
            parent::__construct($name, $age);
            $this->stipendium = $stipendium;
            $this->course = $course;
        }
    }

    class Driver extends Worker
    {
        private $driveCategory;
        private $exp;

        public function getExp()
        {
            return $this->exp;
        }

        public function getDriveCategory()
        {
            return $this->driveCategory;
        }

        public function setExp($exp)
        {
            $this->exp = $exp;
        }

        public function setDriveCategory($category)
        {
            $this->driveCategory = $category;
        }

        public function printInfo()
        {
            output("\nТип: Driver\nИмя: {$this->name}\nВозраст: {$this->age}\nЗарплата: {$this->getSalary()}\nКатегория вождения: {$this->driveCategory}\nСтаж: {$this->exp}\n");
        }

        public function __construct($name, $age, $salary, $category, $exp)
        {
            parent::__construct($name, $age, $salary);
            $this->exp = $exp;
            $this->driveCategory = $category;
        }
    }


    $w1 = new Worker('Иван', 25, 1000);
    $w2 = new Worker('Вася', 26, 2000);

    $w1->printInfo();
    $w2->printInfo();

    output("\nСумма зарплат Васи и Ивана: " . ($w1->getSalary() + $w2->getSalary()));

    pretty_close();
}


// 4
{
    pretty_open();

    class Student4
    {
        private $name;
        private $age;
        private $group;
        private $grades;

        public function __construct($name, $age, $group)
        {
            $this->name = $name;
            $this->age = $age;
            $this->group = $group;
            $this->grades = [];
        }

        public function addGrade($grade)
        {
            if (is_numeric($grade))
                $this->grades[] = $grade;
        }

        public function getAverageGrade()
        {
            if (count($this->grades) == 0)
                return null;

            return array_reduce($this->grades, function ($carry, $item) {
                return $carry += $item / count($this->grades);
            }, 0);
        }

        public function printInfo()
        {
            output("Средний балл студента {$this->name} из группы {$this->group} равен {$this->getAverageGrade()}.");
        }
    }

    $s1 = new Student4('Нгуен Тунг Лам', 20, 9);
    $s1->addGrade(9);
    $s1->addGrade(7);
    $s1->addGrade(9);
    $s1->addGrade(7);

    $s1->printInfo();

    pretty_close();
}

// 5
{
    pretty_open();

    interface Shape
    {
        public function getArea();
        public function getPerimeter();
        public function printInfo();
    }

    class Circle implements Shape
    {

        private $radius;
        private $color;

        public function getArea()
        {
            return round(M_PI * $this->radius ** 2, 3);
        }

        public function getPerimeter()
        {
            return round(2 * M_PI * $this->radius, 3);
        }

        public function printInfo()
        {
            output("Объект: Круг\nРадиус: {$this->radius}\nПериметр: {$this->getPerimeter()}\nПлощадь: {$this->getArea()}\n\n");
        }

        public function __construct($radius)
        {
            $this->radius = $radius;
            $this->color = 'Black';
        }
    }

    class Rectangle implements Shape
    {

        private $width;
        private $height;

        public function getArea()
        {
            return $this->width * $this->height;
        }

        public function getPerimeter()
        {
            return 2 * ($this->width + $this->height);
        }

        public function printInfo()
        {
            output("Объект: Прямоугольник\nВысота: {$this->height}\nШирина: {$this->width}\nПериметр: {$this->getPerimeter()}\nПлощадь: {$this->getArea()}\n\n");
        }

        public function __construct($width, $height)
        {
            $this->width = $width;
            $this->height = $height;
        }
    }

    class Triangle implements Shape
    {

        private $edgeA;
        private $edgeB;
        private $edgeC;

        public function getArea()
        {
            $cos = ($this->edgeC ** 2 + $this->edgeB ** 2 - $this->edgeA ** 2);
            $cos /= 2 * $this->edgeC * $this->edgeB;

            $sin = sqrt(1 - $cos ** 2);

            return round(0.5 * $sin * $this->edgeB * $this->edgeC, 3);
        }

        public function getPerimeter()
        {
            return $this->edgeA + $this->edgeB + $this->edgeC;
        }

        public function printInfo()
        {
            output("Объект: Треугольник\nСторона A: {$this->edgeA}\nСторона B: {$this->edgeB}\nСторона C: {$this->edgeC}\nПериметр: {$this->getPerimeter()}\nПлощадь: {$this->getArea()}\n\n");
        }

        public function __construct($a, $b, $c)
        {
            $this->edgeA = $a;
            $this->edgeB = $b;
            $this->edgeC = $c;
        }
    }


    $circ1 = new Circle(1);
    $circ2 = new Circle(3);
    $circ1->printInfo();
    $circ2->printInfo();

    $rect1 = new Rectangle(10, 20);
    $rect2 = new Rectangle(6, 3);
    $rect1->printInfo();
    $rect2->printInfo();

    $tri1 = new Triangle(3, 4, 5);
    $tri2 = new Triangle(5, 5, 5);
    $tri1->printInfo();
    $tri2->printInfo();


    pretty_close();
}

// 6
{
    pretty_open();

    abstract class Ancestor {
        public $name;
        abstract function Foo();
    }

    class Descendent extends Ancestor {
        public function Foo()
        {
            output("\nDescendent 1");
        }

        private $field;

        public function getField()
        {
            return $this->field;
        }

        public function setField($value)
        {
            $this->field = $value + 10;
        }

        public function __construct($field)
        {
            $this->field = $field;
        }
    }

    class Descendent2 extends Ancestor {
        public function Foo()
        {
            output("\nDescendent 2");
        }
    }

    $d1 = new Descendent(0);
    $d2 = new Descendent2();

    $d1->setField(10);
    $d1->name = 'Hello';
    $d2->name = 'Hello';

    echo $d1->getField();


    $d1->Foo();
    $d2->Foo();

    pretty_close();

}
