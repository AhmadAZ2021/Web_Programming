<pre>
<?php
//Creating a class and an instance (object)
  // class Dog{
  //   public $name=false;

  //   function park(){
  //     echo $this->name . " can park"."\n";
  //   }
  // }

  // $silver=new Dog();

  // $silver->name="Silver";
  // $silver->park();

//Using stdClass
// $myClass=new stdClass();
// $myClass->name="Odat";
// $myClass->num=54;

// print_r($myClass);

// class MyClass{
//   public $name="Odat";
//   public $num=45;
// }
// $mine=new MyClass();
// print_r($mine);
//using existing classes
  // try {
  //   $myDateTime=new DateTime();
  // } catch (Exception $e) {
  //  print_r( DateTime::getLastErrors());
  // }
  
  // echo "\n".$myDateTime->getTimezone()->getName();
  // echo "\n".$myDateTime->getTimestamp();
  // echo "\n". DateTime::ATOM;
  //echo  DateTime::getLastErrors();
//constructor, destructor, inheritance, ....
  class Foo{
    public $x=1;
    protected $y=6;
    private $z=8;

    function __construct($a,$b,$c){
      $this->x=$a;
      $this->x=$b;
      $this->z=$c;
      echo "In Foo constructor\n";
    }

    function myX(){
      return $this->x;
    }
    function myY(){
      return $this->y;
    }
    function myZ(){
      return $this->z;
    }

    function __destruct(){
      echo "In Foo destructor\n";
    }
  }
  $mine=new Foo(5,9,7);
  echo $mine->myY();
  class XYZ extends Foo{
    function __construct($a,$b,$c){
      echo "In XYZ constructor\n";
    }
    function printVars(){
      echo "x in Foo: ".$this->x."\n";
      echo "y in Foo: ".$this->y."\n";
      echo "z in Foo: ".$this->z."\n";
    }
  }

   $mine=new XYZ(0,7,9);
  // $mine->printVars();
   echo $mine->myZ();
?>
</pre>