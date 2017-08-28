<?php 
  include("./controller/DB.php");
  include("./controller/NameSkill.php");
  include("./controller/ExperienceCreate.php");

  $db = new DB("localhost", "root", "root", "cv");
  
  // get all language results
  $lang_res = $db->query("SELECT name, skill FROM languages;");
  // get all concepts
  $concept_res = $db->query("SELECT name, skill FROM concepts;");
  // get all platforms
  $platform_res = $db->query("SELECT name, skill FROM platforms;");
  // get all experiences
  $experience_res = $db->query("SELECT exp_title, exp_loc, exp_from_date, exp_to_date, exp_descript FROM experiences ORDER BY exp_from_date;");
  
?>
<!DOCTYPE html>
<html>

<head>
  <title>Thomas Pearson CV</title>
 
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="./styles/about.css">
  <link rel="stylesheet" type="text/css" href="./styles/containers.css">
  <link rel="stylesheet" type="text/css" href="./styles/experiences.css">
  <link rel="stylesheet" type="text/css" href="./styles/global.css">
  <link rel="stylesheet" type="text/css" href="./styles/languages.css">
  <link rel="stylesheet" type="text/css" href="./styles/resize.css">
  <link rel="stylesheet" type="text/css" href="./styles/showcase.css">
  <link rel="stylesheet" type="text/css" href="./styles/footer.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/velocity/1.1.0/velocity.min.js"></script>

  <script src="./scripts/submit.js"></script>
  <script src="./scripts/links.js"></script>
  <script src="./scripts/list_highlight.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <section id="showcase">
    <img src="./images/showcase_2.png" alt="My Desk layout">
  </section>

  <section>
    <div class="container">
    <h1>Profile</h1>
    <p class="sub_title">Developer, Programmer, Problem Solver!</p>  
    
    <div id="about">
      <div id="description">
          <h2>About Me</h2>
          <p>
            My name Thomas Pearson, I'm a Developer from Auckland, New Zealand.
            I'm Developer with a huge passion for devloping and creating. I love to learn, about any of the newest technologies wether
            it's the newest language to the newest framework.
          </p>
        </div>

        <div id="about_pic">
          <img class="center_img" src="./images/me.png"/>
        </div>

        <div id="education">
          <h2>Education</h2>
          <p>          
            I've majored in Computer Science and minored in Information Technology at Massey University. I've gained
            commercial experience working on Full Stack Developer for Tennis North Harbor. Where we've
            used Agile Scrum, AWS Dyanamo, AWS Lambda, SQLite, Git, MVC and Test Driven Development.
          </p>
        </div>
      </div>
    </div>

    <div class="container">
      <h1>Skills</h1>
      <p class="sub_title"></p>
      <div class=languages>
        <?php
          $name_skill_creator = new NameSkillCreator();
          $name_skill_creator->create_name_skill_list(array_merge($lang_res, $concept_res, $platform_res), 12);?>
      </div>
      
      <input type="submit" value="Git Hub" class="git_hub">
    </div>
  </section>
  
  <div class="container">
    <h1>Experiences</h1>
    <p class="sub_title"/>
    <?php 
      $creator = new ExperienceCreate();
      $creator->create_experiences($experience_res);
    ?>
  </div>

  <div class="container">
    <h1>Contact Me</h1>
    <p class="sub_title"></p>
    <form action="#">
      <input id="name" type="text" name="name" value="Name"></br>
      <input id="email" type="text" name="email" value="E-mail"></br>
      <input id="subject" type="text" name="subject" value="Subject"></br>
      <textarea id="message"name="message">Message</textarea></br>
    </form>

    <input id="submit" type="submit" value="Submit" name="submit">
    <p id="error_text" class="center_text"></p>
  
  </div>
 
  <footer>
    <div class="container flex_horizontal">
      <div class="footer_item" id="linkedin"><span id="linkedin_logo"></span> <p>Linkedin</p></div>
      <div class="footer_item git_hub"><span id="git_hub_logo"></span><p>Git Hub</p></div>
      <div class="footer_item" id="email_manual"><span id="email_logo"></span><p>Email</p></div>
    </div>
  </footer>

</body>

</html>