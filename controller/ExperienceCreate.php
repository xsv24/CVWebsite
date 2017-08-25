<?php
class ExperienceCreate{
    const TITLE = "exp_title";
    const LOC = "exp_loc";
    const FROM_DATE = "exp_from_date";
    const TO_DATE  = "exp_to_date";
    const DESCRIPT = "exp_descript";

    function clean_date($date_string){
        try{
            $date = date_create($date_string);
            $date->format("D-M-Y");
            $date = date_format($date, "M-Y");
            $date = str_replace("-", " ", $date);
            return $date;

        }catch(Exception $e){
            error_log("failed to convert string to date", 0);
            return $date_string;
        }
    }

    function create_exp($exp){
        echo "<div class='exp_descript'>";
        echo "<div class='loc_date_exp'>";
        echo "<h2>".$exp[self::LOC]."</h2>";
        echo "<p>".$this->clean_date($exp[self::FROM_DATE])." - ".$this->clean_date($exp[self::TO_DATE])."</p></div>";
        echo "<div class='job_description'>";
        echo "<h3>".$exp[self::TITLE]."</h3>";
        echo "<p>".$exp[self::DESCRIPT]."</p>";
        echo "</div></div>";
    }

    function create_experiences($sql_res){
        foreach($sql_res as $row){
            $this->create_exp($row);
        }
    }


}