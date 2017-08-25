<?php
class NameSkillCreator{

  function create_skill($skill){
    // creates a score out of 5 based on skill 
    $stars= "";
    for($i = 5; $i > 0; $i--){
      if($i < $skill){
        // add a span to fill-in the star 
        $stars = $stars."<span class='fill_skill_star star_list'>";
      }else{
        // add span to leave the star greyed
        $stars = $stars."<span class='skill_star star_list'>";
      }
      // append star alt character
      $stars = $stars."✪</span>";
    }
    return $stars;
  }
  
  function create_name_skill_list($db_res, $max_len){
    $i = 0;
    echo "<ul>";

    foreach($db_res as $row){
      // if max height reached create new ul
      if($i === $max_len){
        echo "</ul><ul>";
        $i = 0;
      }
      // create li with name and skill
      echo "<li><span>". $row['name']. $this->create_skill($row['skill']).
           "</span></li>";
      $i++;
    }
    echo "</ul>";
  }
}  