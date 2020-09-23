<?php
// notre class Month

namespace tabibe\calendrier;

class Month { 

    public  $days   = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
    private $months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
    private $month;
    private $year;
    private $toDay;
/**
 * Month constructeur
 * @param int $month les 12 mois
 * @param int $year l'année
 * @throws \Exception
 */
    public function __construct(?int $month = null, ?int $year=null) { //? type nullable 


        if($month  === null) {
            $month = intval(date('m')); 
        }

        if($year === null) {
            $year = intval(date('Y'));
        }

        $month = $month % 12; // la division sur 12 si le mois depasse 12 automatiquement sera le mois de janvier 1
   
        $this->month = $month;
        $this->year = $year;

    }


    /**
     * @return  mois en lettre(ex : septembre 2020)
     */
    public function  toString(): string {

        return $this->months[$this->month -1] . ' ' . $this->year;

    }
    /**
     *le nombre des semains d'un mois
     *@return int
     */

    public function getWeeks() : int {// retorn un entier 

        // afficher le mois de debut 
        $start = $this->getFirstDay();
        $end = (clone $start)->modify('+1 month -1 day');// **clone** permete de creer un nouveau temps et de le modifier 
                                                        //  **sans changer le contenu de  notre variable $strat

        $weeks = intval($end->format('W'))-intval($start->format('W')) + 1;

        if ($weeks < 0) {
            // le nombre de semain par mois
            $weeks = intval($start->format('W'));
        }

        return $weeks;
    }


    public function getFirstDay (): \DateTime {// recupere le premier jour du mois
        $toDay = intval(date('d')); //afficher le jour actuel
        return new \DateTime("{$this->year}-{$this->month}-$toDay");
    }


    /**
     * savoir si le jour fait partie du mois en cours 
     * @return bool
     */
    public function DayInMonth(\DateTime $date ): bool{
      return $this->getFirstDay()->format('Y-m') === $date->format('Y-m');
    }

    public function tabHeader(){// creation de l'entete dynamique du tableau
     
        $countenu= "<tr>";
            $dayName = strftime("%u",time())-1;
            for($i = $dayName ; $i < 7; $i++):
                $countenu.= "<td>".$this->days[$i]."</td>";
            endfor;

        $countenu.= "</tr>";
    
       return $countenu;
        
    }
  

        

}