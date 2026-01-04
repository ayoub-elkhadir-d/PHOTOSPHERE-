<?php

interface RepositoryInterface{
   public function  fetch(int $id);
   public function  fetchAll();
   public function  delete(int $id);
}
