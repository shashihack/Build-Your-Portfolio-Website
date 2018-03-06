
<?php
  ob_start();
    $conn=mysqli_connect("localhost","root","NO","hackathon");
    $id=$_SESSION['id'];
    $query="select * from users where id=$id";
    $rs=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($rs);

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="logo_icon.png">

    <link rel="apple-touch-icon" href="logo_icon.png">
    <title><?php echo $row['name']; ?>- Personal Portfolio Website</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,500,600|Raleway:400,600" rel="stylesheet">

</head>
<body>


<header id="header" class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #FFFFFF"><?php echo $row['name']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#introduction">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#education">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experience">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!---------------------
Introduction Section
---------------------->
<div id="introduction">
    <div class="overly">
        <div class="landing-text">
            <h1>Hi ! I'm <?php echo $row['name']; ?></h1>
            <p><?php echo $row['occupation']; ?></p>
            <br>
            <a href="../download.php" class="btn-style-1">
                Download You Website
            </a>
        </div>
    </div>
</div>

<!---------------
About Section
---------------->
<section id="about">
    <h2 class="title">About Us</h2>
    <div class="vr-line"></div>
    <div class="container">
        <div class="about-wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="profile-img">
                        <img src="<?php echo "../profile/".$row['name']."/".$row['profileimage'];?>" class="img-responsive" id="img" alt="img">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="about">
                        <h5 class="sub-title">Personal Details :- </h5>
                        
                        <ul class="personal-info">
                            <li><p><span>Name :</span> <?php echo $row['name']; ?></p></li>
                            <li><p><span>Email :</span><?php echo $row['email']; ?></p></li>
                            <li><p><span>Occupation :</span><?php echo $row['occupation']; ?></p></li>
                            <li><p><span>Address :</span><?php echo $row['address']; ?></p></li>
                            <li><p><span>DateOfBirth :</span><?php echo $row['dob']; ?></p></li>
                        </ul>
                        <a class="btn-style-3" href="<?php  echo "../cv/".$row['name']."/".$row['cv'];?>">Download Resume</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="skills">
    <h2 class="title">Skills</h2>
    <div class="vr-line"></div>
    <div class="container">
        <div class="skills">
            <div class="row">
            <?php                
               
                $qry_skill = "SELECT * from user_skills where id = $id";
                $rs5 = mysqli_query($conn,$qry_skill);
                while($fet = mysqli_fetch_array($rs5))
                {
            ?>
                <div class="col-md-6">
                    <h3 class="progress-title"><?php echo $fet['skill_name']; 
                                                                    $value = 0;
                                                                if($fet['percentage']==1)
                                                                {$value=60;}
                                                                elseif($fet['percentage']==2)
                                                                {$value=80;}
                                                                else
                                                                {$value = 90;}
                                                ?></h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:<?php echo $value; ?>%">
                            <div class="progress-value"><?php echo $value; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
         </div>

<!-- <section id="skills">
    <h2 class="title">Skills</h2>
    <div class="vr-line"></div>
    <div class="container">
        <div class="skills">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="progress-title">HTML5</h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:90%;">
                            <div class="progress-value">90%</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h3 class="progress-title">CSS3</h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:75%;">
                            <div class="progress-value">75%</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="progress-title">HTML5</h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:90%;">
                            <div class="progress-value">90%</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h3 class="progress-title">CSS3</h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:75%;">
                            <div class="progress-value">75%</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="progress-title">HTML5</h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:90%;">
                            <div class="progress-value">90%</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h3 class="progress-title">CSS3</h3>
                    <div class="progress">
                        <div class="progress-bar" style="width:75%;">
                            <div class="progress-value">75%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> -->

<?php 

    $query1="select * from user_education where id=$id";
    $rs3=mysqli_query($conn,$query1);
    
?>
<section id="education">
    <h2 class="title">Education</h2>
    <div class="vr-line"></div>
    <div class="time-line">
        <div class="container">
          <div class="row">  
                        <?php
                            $i=0;
                         while ($row2 = mysqli_fetch_assoc($rs3)) 
                          {
                           

                            if($i%2==0)
                            {
                            ?>
                                
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                 <div class="timeline-content right ">

                            <h5><?php echo $row2['stream']; ?></h5>
                            <p class="name"><?php echo $row2['institute']; ?></p>
                            <p class="year"><?php echo $row2['year']; ?></p>
                     <!--        <a href="#" class="btn-style-2">Visit Website</a> -->
                    
                        </div>
                        </div>
                        </div>
                        </div>
                           <?php 
                            }
                            else
                            {
                                ?>
                                
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <div class="timeline-content">

                            <h5><?php echo $row2['stream']; ?></h5>
                            <p class="name"><?php echo $row2['institute']; ?></p>
                            <p class="year"><?php echo $row2['year']; ?></p>
                     <!--        <a href="#" class="btn-style-2">Visit Website</a> -->
                       
                        </div>
                        </div>
                        </div>
                        </div>
                        <?php
                            }
                            ?>

                  

                       <?php
                            $i++;
                          }
                        ?>

                       

                  

                  

         </div>      
            
       
    </div>
</section>

<?php 
$query40="select * from user_experience where id= $id";
$rs40=mysqli_query($conn,$query40);
?>
<section id="experience">
    <h2 class="title">Experience</h2>
    <div class="vr-line"></div>
    <div class="time-line">
        <div class="container">
            <div class="row">
               
                        <?php
                            $j=0;
                           while ($row40 = mysqli_fetch_assoc($rs40)) 
                          {
                            

                            if($j%2==0)
                            {
                                ?>
                                 <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                                     <div class="timeline-content right">
                            <h5><?php echo $row40['field']; ?></h5>
                            <p class="name">Organisation Name:- <?php echo $row40['organisation_name']; ?></p>
                            <p class="year">Joining Year:- <?php echo $row40['year']; ?></p>
                            <p class="name">About:- <?php echo $row40['about']; ?></p>
                            <p class="year">Duration:- <?php echo $row40['duration']; ?> months</p>


                        <!--     <a href="#" class="btn-style-2">Visit Website</a> -->
                        </div>
                        </div>
                        </div>
                        </div>
                            <?php
                        }
                            else
                            {
                                ?>
                                 <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                                     <div class="timeline-content">
                            <h5><?php echo $row40['field']; ?></h5>
                            <p class="name">Organisation Name:- <?php echo $row40['organisation_name']; ?></p>
                            <p class="year">Joining Year:- <?php echo $row40['year']; ?></p>
                            <p class="name">About:- <?php echo $row40['about']; ?></p>
                            <p class="year">Duration:- <?php echo $row40['duration']; ?> months</p>


                           <!--  <a href="#" class="btn-style-2">Visit Website</a> -->
                        </div>
                        </div>
                        </div>
                        </div>
                            <?php
                            }
                            ?>
                        
                        <?php
                        $j++;
                          }

                        ?>
                       
                    

               
            </div>
        </div>
    </div>
</section>

<?php 
$query50="select * from user_portfolio where id=$id";
$rs50=mysqli_query($conn,$query50);


?>
<section id="portfolio">
    <h2 class="title">Portfolio</h2>
    <div class="vr-line"></div>
    <div id="portfolio-category">
        <div class="btn-filter-wrap">
            <button class="btn-filter btn-active" data-filter="*">All</button>
            <button class="btn-filter" data-filter=".web">Web</button>
            <button class="btn-filter" data-filter=".photography">Photography</button>
            <button class="btn-filter" data-filter=".graphic">Graphic Design</button>
        </div>
        <div class="owl-carousel">
      
        <?php
         while ($row50 = mysqli_fetch_assoc($rs50)) 
        {
            ?>
              <div class="item photography"> 
                <div class="content">
                     <img src="<?php echo "../upload/".$row50['image'];?>" class="img-responsive" id="img" alt="img">
                     
                    <div class="overlay">
                        <div class="content-text">
                        
                            <a class="btn-style-1">View</a>
                        </div>
                    </div>
                </div>
      </div>


        <?php
        }

        ?>

           
          
           
           
           
         </div>
         
        </div>
    </div>

</section>

<section id="contact">
    <h2 class="title">Contact Me</h2>
    <div class="vr-line"></div>
    <div class="container">
        <div class="row justify-content-center contact-wrapper">
            <div class="col-lg-8">
                <form>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="full_name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="email" name="email" placeholder="Enter You Email" required>
                        </div>
                        <div class="col-lg-12">
                            <textarea required placeholder="Enter Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn-style-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section id="social">
    <h2 class="title">Join Me</h2>
    <div class="vr-line"></div>
    <div class="container">
        <div class="social">
            <ul>
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="github"><i class="fa fa-github"></i></a></li>
                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</section>
<div id="footer">
    <div class="container">
        <div class="copyright">
            2017 <i class="fa fa-copyright"></i> Copyright by Urvashi Meena and Ayush Saxena</a>
        </div>
    </div>
</div>


<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.owl-filter.js"></script>
<script src="js/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFyNe0tvtDd5JJI4euKXrtWzk9-RHz8EE&callback=myMap"></script>
</body>
</html>
<?php
    $HtmlCode= ob_get_contents(); 
    ob_end_flush(); 

    $fh=fopen('portfolio.html','w');
    fwrite($fh,$HtmlCode);

    fclose($fh);
        
    
?>