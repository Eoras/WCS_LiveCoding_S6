<?php

class Person
{
    private $firstName;
    private $lastName;
    private $location = ["x" => 0, "y" => 0, "z" => 0];
    const LOCALISATION_AXES = ['x', 'y', 'z'];


    public function setFirstName(string $s): void
    {
        if (strlen($s) < 15) {
            $sModify = ucwords(mb_strtolower($s));
            $this->firstName = $sModify;
        }
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $s): void
    {
        $this->lastName = $s;
    }

    public function getLastName(): string
    {
        return mb_strtoupper($this->lastName);
    }

    public function getFullName()
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }

    public function getLocation(): array
    {
        return $this->location;
    }

    public function setLocation(array $a): void
    {
        foreach ($a as $key => $value) {
            if (in_array($key, self::LOCALISATION_AXES)) {
                $this->location[$key] = $value;
            }
        }
    }

}

// ------------ DEHORS ------------------
$paul = new Person();
$paul->setFirstName("pAul");
$paul->setLastName("dos santOS");


echo $paul->getFullName();
echo "\n";

$paul->setLocation(["x" => 10, "z" =>2]);

$localisation = $paul->getLocation();
echo "Ma valeur X est : " . $localisation['x'];
echo "\n";
echo "Ma valeur Y est : " . $localisation['y'];
echo "\n";
echo "Ma valeur Y est : " . $localisation['z'];

//print_r($paul->getLastName());


echo "\n";
//print_r($paul);