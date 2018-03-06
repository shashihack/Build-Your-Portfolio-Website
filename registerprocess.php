        <?php
            session_start();
                 
   
            $email=$_REQUEST["email"];
            
            $pass = $_REQUEST['pass'];
            $cpass = $_REQUEST['cpass'];
            $name = $_REQUEST['name'];
            $occupation = $_REQUEST['occupation'];
            $address = $_REQUEST['Address'];
            $theme = $_REQUEST['theme'];
            $dob = $_REQUEST['dob'];
            $pic = $_FILES["file1"]["name"];
            $temppic=$_FILES["file1"]["tmp_name"];
            $about = $_REQUEST['about'];
            $cvv = $_FILES["file"]["name"];
            $cv=$_FILES["file"]["tmp_name"];

            mkdir("profile/$name");
            move_uploaded_file($temppic,"profile/$name/$pic");

            mkdir("cv/$name");  
            move_uploaded_file($cv,"cv/$name/$cvv");
          
            $conn=mysqli_connect("localhost","root","NO","hackathon");
            
           
           echo $query ="INSERT INTO users(email, password, name, occupation, address, cv, dob, theme,profileimage) VALUES ('$email', '$pass', '$name', '$occupation', '$address', '$cvv', '$dob', $theme,'$pic')";
              $rs=mysqli_query($conn,$query);
           $query1="select * from users where email='$email'";

            $rs1=mysqli_query($conn,$query1);
            $row=mysqli_fetch_array($rs1);
             $id=$row['id'];

            $stream1=$_REQUEST['Secondary'];
            $institute1=$_REQUEST['Sname'];
            $year1=$_REQUEST['Syear'];

             $query2="INSERT INTO user_education(stream,institute,year,id) VALUES ('$stream1','$institute1',$year1,$id)";
              mysqli_query($conn,$query2);
           
            
             $stream3=$_REQUEST['SSecondary'];
            $institute3=$_REQUEST['SSname'];
            $year3=$_REQUEST['SSyear'];
            $query4="INSERT INTO user_education(stream,institute,year,id) VALUES ('$stream3','$institute3',$year3,$id)";
            mysqli_query($conn,$query4);

             $stream4=$_REQUEST['ug'];
            $institute4=$_REQUEST['iname'];
            $year4=$_REQUEST['ugyear'];

             $query5="INSERT INTO user_education(stream,institute,year,id) VALUES ('$stream4','$institute4',$year4,$id)";
             mysqli_query($conn,$query5);

            echo $stream5=$_REQUEST['pg'];
            
            $institute5=$_REQUEST['pgname'];
            $year5=$_REQUEST['pgyear'];
            if(isset($stream5))
            {
                
                echo "ayush";
             $query6="INSERT INTO user_education(stream,institute,year,id) VALUES ('$stream5','$institute5',$year5,$id)";
             mysqli_query($conn,$query6);
            }

            

             $stream6=$_REQUEST['masters'];
            $institute6=$_REQUEST['mname'];
            $year6=$_REQUEST['myear'];
            if(isset($stream6))
            {
             $query7="INSERT INTO user_education(stream,institute,year,id) VALUES ('$stream6','$institute6',$year6,$id)";
             mysqli_query($conn,$query7);
            }


///Experience

            $eyear1=$_REQUEST['eyear1'];
            $orname1=$_REQUEST['orname1'];
            $earea1=$_REQUEST['earea1'];
            $edur1=$_REQUEST['edur1'];
            $about1=$_REQUEST['about1'];

            echo $query8="INSERT INTO user_experience(id,year,organisation_name,field,duration,about) VALUES ($id,$eyear1,'$orname1','$earea1',$edur1,'$about1')";
            mysqli_query($conn,$query8);

             $eyear2=$_REQUEST['eyear2'];
            $orname2=$_REQUEST['orname2'];
            $earea2=$_REQUEST['earea2'];
            $edur2=$_REQUEST['edur2'];
            $about2=$_REQUEST['about2'];

             $query9="INSERT INTO user_experience(id,year,organisation_name,duration,field,about) VALUES ($id,$eyear2,'$orname2',$edur2,'$earea2','$about2')";
            mysqli_query($conn,$query9);



             $eyear3=$_REQUEST['eyear3'];
            $orname3=$_REQUEST['orname3'];
            $earea3=$_REQUEST['earea3'];
            $edur3=$_REQUEST['edur3'];
            $about3=$_REQUEST['about3'];

            if(isset($eyear3))
            {
                    $query10="INSERT INTO user_experience(id,year,organisation_name,duration,field,about) VALUES ($id,$eyear3,'$orname3',$edur3,'$earea3','$about3')";
                     mysqli_query($conn,$query10);

            }
           



             $eyear4=$_REQUEST['eyear4'];
            $orname4=$_REQUEST['orname4'];
            $earea4=$_REQUEST['earea4'];
            $edur4=$_REQUEST['edur4'];
            $about4=$_REQUEST['about4'];

            if(isset($eyear4))
            {
                  $query11="INSERT INTO user_experience(id,year,organisation_name,duration,field,about) VALUES ($id,$eyear4,'$orname4',$edur4,'$earea4','$about4')";
                  mysqli_query($conn,$query11);

            }
          
            //skills



    $sn1 = $_REQUEST['skillname1'];
    $sr1 = $_REQUEST['skillrate1'];
    $qry31 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn1',$sr1,$id)";
    mysqli_query($conn,$qry31);
    
    $sn2 = $_REQUEST['skillname2'];
    $sr2 = $_REQUEST['skillrate2'];
    $qry32 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn2',$sr2,$id)";
    mysqli_query($conn,$qry32);
    
    echo $sn3 = $_REQUEST['skillname3'];
    echo $sr3 = $_REQUEST['skillrate3'];
    echo $qry33 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn3',$sr3,$id)";
    mysqli_query($conn,$qry33);
    
    if($_REQUEST['skillname4'])
    {
        $sn4 = $_REQUEST['skillname4'];
        $sr4 = $_REQUEST['skillrate4'];
        $qry34 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn4',$sr4,$id)";
        mysqli_query($conn,$qry34);
    }
  
    if($_REQUEST['skillname5']!='')
    {
        $sn5 = $_REQUEST['skillname5'];
        $sr5 = $_REQUEST['skillrate5'];
        $qry35 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn5',$sr5,$id)";
        mysqli_query($conn,$qry35);
    }
    if($_REQUEST['skillname6']!='')
    {
        $sn6 = $_REQUEST['skillname6'];
        $sr6 = $_REQUEST['skillrate6'];
        $qry36 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn6',$sr6,$id)";
        mysqli_query($conn,$qry36);
    }
    if($_REQUEST['skillname7']!='')
    {
        $sn7 = $_REQUEST['skillname7'];
        $sr7 = $_REQUEST['skillrate7'];
        $qry37 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn7',$sr7,$id)";
        mysqli_query($conn,$qry37);
    }
    if($_REQUEST['skillname8']!='')
    {
        $sn8 = $_REQUEST['skillname8'];
        $sr8 = $_REQUEST['skillrate8'];
        $qry38 = "INSERT INTO user_skills(skill_name,percentage,id) VALUES ('$sn8',$sr8,$id)";
        mysqli_query($conn,$qry38);
    }



///portdolio


     $link=$_REQUEST['link'];
    if(!empty($_FILES['cv']['name'])) {
        // $allowedExts = array("gif", "jpeg", "jpg", "png");
        // $error_uploads = 0;
        $total_uploads = array();
        $upload_path = 'upload/';
        foreach($_FILES['cv']['name'] as $key => $value) 
        {
            $temp = explode(".", $_FILES['cv']['name'][$key]);
            $extension = end($temp);
           
            $file_name = time().rand(1,5).rand(6,10).'_'.str_replace(' ', '_', $_FILES["cv"]['name'][$key]);
            if(move_uploaded_file($_FILES["cv"]['tmp_name'][$key], $upload_path.$file_name)) {
                $total_uploads[] = $file_name;
               $query50="INSERT INTO user_portfolio(id,image,link) VALUES ($id,'$file_name','$link')";
               mysqli_query($conn,$query50);
            } 
        }
       

        // if(sizeof($total_uploads)) {
        // //Do what ever you like after file uploads, you can run query here to save it in database or set redirection after success upload
        // }
        }


        //acheivements


            $area1 = $_REQUEST['area1'];
    $position1 = $_REQUEST['position1'];
    $description1 = $_REQUEST['description1'];
    $year1 = $_REQUEST['year1'];
    $qry41 = "INSERT INTO user_achievements(id,field,position,description,year) values($id,'$area1','$position1','$description1',$year1)";
    $rs = mysqli_query($conn,$qry41);
    
    $area2 = $_REQUEST['area2'];
    $position2 = $_REQUEST['position2'];
    $description2 = $_REQUEST['description2'];
    $year2 = $_REQUEST['year2'];
    $qry42 = "INSERT INTO user_achievements(id,field,position,description,year) values($id,'$area2','$position2','$description2',$year2)";
    $rs = mysqli_query($conn,$qry42);
    
    $area3 = $_REQUEST['area3'];
    $position3 = $_REQUEST['position3'];
    $description3 = $_REQUEST['description3'];
    $year3 = $_REQUEST['year3'];
    $qry43 = "INSERT INTO user_achievements(id,field,position,description,year) values($id,'$area3','$position3','$description3',$year3)";
    $rs = mysqli_query($conn,$qry43);
    
    if($_REQUEST['area4']!='')
    {
        $area4 = $_REQUEST['area4'];
        $position4 = $_REQUEST['position4'];
        $description4 = $_REQUEST['description4'];
        $year4 = $_REQUEST['year4'];
        $qry44 = "INSERT INTO user_achievements(id,field,position,description,year) values($id,'$area4','$position4','$description4',$year4)";
        $rs = mysqli_query($conn,$qry44);
    }
    if($_REQUEST['area5']!='')
    {
        $area5 = $_REQUEST['area5'];
        $position5 = $_REQUEST['position5'];
        $description5 = $_REQUEST['description5'];
        $year5 = $_REQUEST['year5'];
        $qry45 = "INSERT INTO user_achievements(id,field,position,description,year) values($id,'$area5','$position5','$description5',$year5)";
        $rs = mysqli_query($conn,$qry45);
    }



    ///social links

    $facebook = $_REQUEST['facebook'];
    $google = $_REQUEST['gplus'];
    $twitter = $_REQUEST['twitter'];
    $qry71 = "INSERT INTO user_connection(id,facebook_link,twitter_link,google_link) VALUES($id,'$facebook','$twitter','$google')";
    mysqli_query($conn,$qry71);
    

            










        $_SESSION['id']=$id;

        if($theme==1)
        {
            header("location:theme1/index.php");
        }
        elseif ($theme==2)
        {
            header("location:theme2/index.php");
        }
        elseif ($theme==3)
        {
            header("location:theme3/index.php");
        }
        
         
         //   print_r($rs);
           
//             $rs1=mysqli_query($conn,$query1);
//             $row=mysqli_fetch_array($rs1);
//             $id=$row['id'];
                  
            
//             $_SESSION['id']=$id;
//             if($theme==1)
//             {
//                 header("location:Theme1/index.php");
//             }
//             elseif($theme==2)
//             {
//                 header("location:Theme2/index.php");
//             }
//             elseif($theme==3)
//             {
//                 header("location:Theme3/index.php");
//             }
            

           
         ?>

