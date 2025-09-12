<?php

interface sons{
    public function animais(); 
}
class cachorro implements sons{
    public function animais(){
        echo"Au, Au!";
    }
}
class gato implements sons {
        public function animais() {
            echo"Miau!";
        }
    }
class vaca implements sons{
    public function animais(){
        echo"Muuuu!";
    }
}
?>