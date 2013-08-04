<?php

// src/Product.php
/**
 * @Entity @Table(name="users")
 **/
class Users
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(length=50) **/
    protected $email;

    /** @Column(length=100) **/
    protected $password;

    /** @Column(length=20) **/
    protected $username;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->password;
    }

    public function setUsername($name)
    {
        $this->username = $name;
    }
}