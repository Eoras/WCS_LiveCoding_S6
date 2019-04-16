<?php

namespace App\Entity;

class Person
{

    private $firstName;
    private $lastName;
    private $email;
    private $phoneNumber;

    /**
     * Person constructor.
     */
    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = ucwords(mb_strtolower($firstName));
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = mb_strtoupper($lastName);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = mb_strtolower($email);
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }


}