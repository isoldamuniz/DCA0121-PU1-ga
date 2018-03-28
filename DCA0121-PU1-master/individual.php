<?php
/************************************************************************
/ Class Individual : Genetic Algorithms 
/
/************************************************************************/

require_once('fitnesscalc.php');  //supporting class file
 

 class individual {
    public  $genes = [];  //defines an empty  array of genes arbitrary length
    
	// Cache
    public $fitness = 0;

    // Create a random individual
    public function generateIndividual() {
        $this->genes[0] = rand(1, 1000); //Price
        $this->genes[1] = rand(1, 100);  //Costvalue
        $this->genes[2] = rand(1, 100);  //beachCloseness
        $this->genes[3] = rand(1, 100);  //breakfast
        $this->genes[4] = rand(1, 100);  //wifi
        $this->genes[5] = rand(1, 100);  //acomodation
    }

    /* Getters and setters */
    // Use this if you want to create individuals with different gene lengths
    // public function setDefaultGeneLength($length) {
    //     $this->defaultGeneLength = $length;
    // }
    
    public function getGene($index) {
        return $this->genes[$index];
    }

    public function setGene($index,$value) {
        $this->genes[$index] = $value;
        $this->fitness = 0;
    }

    /* Public methods */
    public function getFitness() {
        $weights = [(5/5), (1/5), (2/5), (3/5), (4/5)];

        if ($this->fitness == 0) {
            $this->fitness = FitnessCalc::getFitness($this, $weights);  //call static method to calculate fitness
        }
        return $this->fitness;
    }

    public function __toString() {
       $population_string=null;
       $population_string.="\n [".$this->genes[0].",".$this->genes[1].",".$this->genes[2].",".$this->genes[3].",".$this->genes[4].",".$this->genes[5]." ] Fitness:".$this->fitness;
       
        return $population_string;
          
    }
}


?>