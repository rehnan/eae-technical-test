<?php

namespace App\Contracts;

interface IRepositoryAdapter
{
    public function findById();
    public function list();
    public function add();
    public function delete();
    public function edit();
    public function getDto(): string;
}
