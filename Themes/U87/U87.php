<?php
namespace App\Themes\U87;
class U87
{
    public function handler(): void
    {
		$this->boot();
		$this->helpers();
    }
    
   public function helpers(){
       include __DIR__."/helpers.php";
   }
   
   public function boot(){
       include __DIR__."/bootstrap.php";
   }

}