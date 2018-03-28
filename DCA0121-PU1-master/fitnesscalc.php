<?php
/************************************************************************
/ Class fitnesscalc : Genetic Algorithms 
/
/************************************************************************/

require_once('individual.php');  //supporting class file

 class fitnesscalc {

    public static  $solution =  array();  //empty array of arbitrary length

    /* Public methods */
    // Set a candidate solution as a byte array
  
    // To make it easier we can use this method to set our candidate solution with string of 0s and 1s
    static function setSolution($newSolution) {
        
         // Loop through each character of our string and save it in our string  array
         fitnesscalc::$solution=str_split($newSolution);
        // print_r(fitnesscalc::$solution);
        

    }

    // Calculate individuals fitness by comparing it to our candidate solution
    // low fitness values are better,0=goal fitness is really a cost function in this instance
    static function  getFitness($individual, $weights) {
       $fitness = 0;

       $fitness += (

        ($individual->getGene(2)) / ($weights[1]) +

        ($individual->getGene(3)) / ($weights[2]) +

        ($individual->getGene(4)) / ($weights[3]) +

        ($individual->getGene(5)) / ($weights[4]) 

        ) / (
            ($individual->getGene(0) / ($individual->getGene(1) / 100)) 
            / ($weights[0])
        );
        
        //echo "Fitness: $fitness";
        
        return $fitness;  //inverse of cost function
        
    }
    
    // Get optimum fitness
    static function getMaxFitness() {
        $maxFitness = 0; //maximum matches assume each exact charaters yields fitness 1
        return $maxFitness;
    }
    
    
    
    
}  //end class



?>