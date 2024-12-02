<?php

/**
 * CharacterClass short summary.
 *
 * CharacterClass description.
 *
 * @version 1.0
 * @author rlaiacona
 */
class CharacterClass
{
    const ww_head_titles  = ["Name","Player","Chronicl","Breed","Auspice","Tribe", "Pack Name", "Pack Name", "Pack Totem", "Concept"];

    public $head_values;
    public function __get_head($id)
    {
      if(!isset($this->head_values[$id])){
          return ["","","","","","","","","",""];
      }
    }

    //public $name;
    //public $player;
    //public $chronical;
    //public $breed;
    //public $auspice;
    //public $tribe;
    //public $packname;
    //public $packtotem;
    //public $concept;
    //public $strength;
    //public $dexterity;
    //public $stamina;
    //public $charisma;
    //public $manipulation;
    //public $appearance;
    //public $perception;
    //public $intelligence;
    //public $wits;
    //public $alertness;
    //public $athletics;
 
}