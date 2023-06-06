<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rejwan's Portfolio</title>
    <!-- Font Awesome CDN link -->
 
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js"></script>
    
  </head>

  <body>
    <!-- Nav Section Start Here -->
    <nav>
      <div class="container nav_container">
        <a href="index.php">
          <h4>Md. <span>Rejwan</span> Ahmed</h4>
        </a>
        <ul class="nav_menu">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#education">Education</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <button id="open-menu-btn"><i class="fa-solid fa-bars"></i></button>
        <button id="close-menu-btn"><i class="fa-solid fa-xmark"></i></button>
      </div>
    </nav>
    <!-- Nav Section End Here -->

    <!-- Header Section Start Here -->
    <header>    
      <div class="container header_container" id="home">
        <div class="header_left">
          <div class="header_left_img animate__animated animate__backInLeft">
            <img src="image/rejwan.png" alt="Model Image" />
          </div>
        </div>
        <div class="header_right">
          <div class="text-1">Hello, this is</div>
          <div class="text-2">Md. Rejwan Ahmed</div>
          <div class="text-3">And I'm a <span class="typing"></span></div>
          
          <div class = "animate__animated animate__backInLeft">
            <p><i class = "fas fa-home"></i> 12/E,3/78, Mirpur, Dhaka-1216</p>
            <p><i class = "fas fa-phone"></i> +8801775781898</p>
            <p style = "text-transform:lowercase"><i class = "fas fa-envelope"></i> rejwancse10@gmail.com</p>
            <p style = "text-transform:lowercase;margin-bottom:30px;"><i class = "fa-brands fa-linkedin"></i> https://www.linkedin.com/in/md-rejwan-ahmed-338121166/</p>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Section End Here -->

    <!-- About Me Section Start Here -->
    <section class="about" id="about">
      <h2 class="border_bottom">About Me</h2>
      <div class="container about_container">
        <div class="about-img">
          <img src="image/rejwan.png" alt="about model" />
        </div>
        <div class="about-text">
          <div class="text">
            Hello, this is <b>Md. <span>Rejwan</span> Ahmed</b> and I'm a <span class="typing-2"></span>
          </div>
          <p style = "text-align:justify; text-transform:capitalize">
            I have completed my M.Sc. and B.Sc. in Computer Science & Engineering from <i>Jatiya Kabi Kazi Nazrul Islam University</i>. I want to develop my career as a web developer. I have completed some projects which have been used in my university. Among them <span style = "color:#29e9bc">"A Secure E-Voting System"</span> and <span style = "color:#29e9bc">"GST Online Admission System"</span> are the two most significant projects. <br>
            Now, I am interested to explore myself with the newest technology of software and I like to build up a dynamic and superior professional life in a challenging atmosphere with my creativity and knowledge. I am looking for opportunity to enhance my skill.
          </p>
          <a
            href="file/cv_rejwan_ahmed.pdf"
            download="rejwan"
            target="_blank"
            class="btn"
            >Download CV</a
          >
        </div>
      </div>
    </section>
    <!-- About Me Section End Here -->

    <!-- My Skills Section Start Here -->
    <div class="skills" id="skills">
      <div class="new">
        <h2 class="border_bottom">My Skills</h2>
      </div>
      <div class="container skills_container">
        <div class="flex-1">
          <div class="bar">
            <div class="info">
              <span>HTML</span>
            </div>
            <div class="progress-line html">
              <span></span>
            </div>
          </div>
          <div class="bar">
            <div class="info">
              <span>CSS</span>
            </div>
            <div class="progress-line css">
              <span></span>
            </div>
          </div>
          <div class="bar">
            <div class="info">
              <span>Bootstrap</span>
            </div>
            <div class="progress-line bootstrap">
              <span></span>
            </div>
          </div>
          <div class="bar">
            <div class="info">
              <span>Tailwind CSS</span>
            </div>
            <div class="progress-line tailwindcss">
              <span></span>
            </div>
          </div>
        </div>
        <div class="flex-2">
          <div class="bar">
            <div class="info">
              <span>PHP</span>
            </div>
            <div class="progress-line php">
              <span></span>
            </div>
          </div>
          <div class="bar">
            <div class="info">
              <span>Javascript</span>
            </div>
            <div class="progress-line javascript">
              <span></span>
            </div>
          </div>
          
          <div class="bar">
            <div class="info">
              <span>Java</span>
            </div>
            <div class="progress-line java">
              <span></span>
            </div>
          </div>
          <div class="bar">
            <div class="info">
              <span>SQL</span>
            </div>
            <div class="progress-line sql">
              <span></span>
            </div>
          </div>
        </div>
        <div class="flex-3">
          <div class="bar">
            <div class="info">
              <span>MySQL</span>
            </div>
            <div class="progress-line mysql">
              <span></span>
            </div>
          </div>
          
          <div class="bar">
            <div class="info">
              <span>Laravel</span>
            </div>
            <div class="progress-line laravel">
              <span></span>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <!-- My Skills Section End Here -->
    <!-- Start Education Section -->
    <section id="education">
      <div class="container">
        <div class="col">
          <div class="st-education-wrap">
            <h2
              style="
                text-align: center;
                color: var(--primary);
                text-decoration: underline;"
            >
              Education
            </h2>
            <div class="st-education-timeline-wrap">
              <div class="st-education-timeline">
                <h3 class="st-education-timeline-title">M.Sc.</h3>
                <div class="st-education-timeline-duration">2019-2020 (held in 2023)</div>
                <h4 class="st-education-timeline-subtitle">
                  Jatiya Kabi Kazi Nazrul Islam University
                </h4>
                <div class="st-education-timeline-text">
                  <p>
                    My. M.Sc. session is 2019-2020 but due to Corona it started lately at the end of 2021, and it finished in April, 2023 
                  </p>
                  <p>Result: Appeared</p>
                </div>
              </div>
              <!-- st-education-timeline -->
              <div class="st-height-b50 st-height-lg-b30"></div>
              <div class="st-education-timeline">
                <h3 class="st-education-timeline-title">B.Sc.</h3>
                <div class="st-education-timeline-duration">2016-2019 (Held in 2021)</div>
                <h4 class="st-education-timeline-subtitle">
                  Jatiya Kabi Kazi Nazrul Islam University
                </h4>
                <div class="st-education-timeline-text">
                  <p>
                    My B.Sc. session is 2015-2016. The examination should have been finished in 2019 but due to Corona and some other reasons, it finished in 2021. 
                  </p>
                  <p>Result: 3.52</p>
                </div>
              </div>
              <!-- st-education-timeline -->
              <div class="st-height-b50 st-height-lg-b30"></div>
              <div class="st-education-timeline">
                <h3 class="st-education-timeline-title">H.S.C</h3>
                <div class="st-education-timeline-duration">2012-2014</div>
                <h4 class="st-education-timeline-subtitle">
                  Shaheed Police Smrity College
                </h4>
                <div class="st-education-timeline-text">
                  <p>Result: 5.00</p>
                </div>
              </div>
              <!-- st-education-timeline -->
              <div class="st-height-b50 st-height-lg-b30"></div>
              <div class="st-education-timeline">
                <h3 class="st-education-timeline-title">S.S.C</h3>
                <div class="st-education-timeline-duration">2010-2012</div>
                <h4 class="st-education-timeline-subtitle">
                  Kalshi Islamia High School
                </h4>
                <div class="st-education-timeline-text">
                  <p>Result: 4.81</p>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End education Seciton -->

    <!-- My projects Section Start Here -->
    <div class="projects" id="projects">
      <h2 class="border_bottom">My Projects</h2>
      <div class="container projects_container">
        
        <!--Start: Result Management Syste -->
        <article>
          <div class="project_image card_btn">
            <img src="image/rms-1.png" alt="project 1" />
          </div>
          <!--====== Modal-01 ======-->
          <div class="modal">
            <div class="modal_wrapper">
              <div class="modal_content">
                <div class="modal_head">
                  <h3 class="heading">Result Management System of Fine Arts for JKKNIU</h3>
                  <small> <b>Duration: </b> 2021-2023(Aug-Apr)</small>
                </div>
                <!-- Carousel: Start -->
                <div class="carousel-container">
                  <div class="images1 fade">
                    <img src="image/rms-1.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-2.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-3.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-4.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-5.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-6.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-7.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-8.png">
                  </div>
                  <div class="images1 fade">
                    <img src="image/rms-9.png">
                  </div>
                     
                     <!-- Previous and Next Buttons -->
                     <a class="previous" onclick="plusSlides1(-1)">❮</a>
                     <a class="next" onclick="plusSlides1(1)">❯</a>
               </div>
               <br>
               
               <!-- Navigation Dots-->
               <div style="text-align:center">
                  <span class="navigation-dot1" onclick="currentSlide1(1)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(2)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(3)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(4)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(5)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(6)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(7)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(8)"></span>
                  <span class="navigation-dot1" onclick="currentSlide1(9)"></span>
               </div>
                <!-- Carousel : End -->
                <div class="modal_body">
                  <p style = "font-size: 15px;">
                    This is a web based system for managing reults of Fine Arts at JKKNIU. This system has three panels.<br>
                    
                    1. <strong>Admin:</strong> He is responsible for managing functionalities such as teacher, student, course, department, exam committee, and assigning course to teachers. 
                    
                    <br>
                    
                    2. <strong>Teacher:</strong> They are responsible for entering internal marks of assigned courses and generates results in PDF format.
                    
                    <br>
                    
                    3. <strong>Tabulators:</strong> They are responsible for entering internal and final marks both. They also enter improvement marsk. After entering marks, they can generate results semester wise in PDF format.
                    <br>
                    
                    <small><b>Technologies: HTML, CSS, Bootstrap, Javascript, PHP, SQL, MySQL</b></small>
                    
                  </p>
                  <div style="margin-top: 2rem">
                    <!-- <a type="button" class="btn" href="#" target="_blank"
                      >Github</a
                    >
                    <a type="button" class="btn" href="#" target="_blank"
                      >Live</a
                    > -->
                    <small><b>This system is under development</b></small>
                  </div>
                </div>
                <div class="modal_foot">
                  <button type="button" class="btn close_btn">Close</button>
                </div>
              </div>
            </div>
          </div>
        </article>
        <!--End: Result Management Syste -->
        
        <!-- Start: GST Online Admission System -->
        <article>
          <div class="project_image card_btn">
            <img src="image/gst-1.png" alt="project 2" />
          </div>

          <!--====== Modal-02 ======-->
          <div class="modal">
            <div class="modal_wrapper">
              <div class="modal_content">
                <div class="modal_head">
                  <h3 class="heading">GST Online Admission System, JKKNIU</h3>
                  <small> <b>Duration: </b> 2021-2022(Nov-Jan)</small>
                  <!-- Carousel: Start -->
                  <div class="carousel-container">
                      <div class="images2 fade">
                        <img src="image/gst-1.png">
                      </div>
                      <div class="images2 fade">
                        <img src="image/gst-2.png">
                      </div>
                      <div class="images2 fade">
                        <img src="image/gst-3.png">
                      </div>
                      <div class="images2 fade">
                        <img src="image/gst-4.png">
                      </div>
                      <div class="images2 fade">
                        <img src="image/gst-5.png">
                      </div>
                      <div class="images2 fade">
                        <img src="image/gst-6.png">
                      </div>
                       
                      <!-- Previous and Next Buttons -->
                      <a class="previous" onclick="plusSlides2(-1)">❮</a>
                      <a class="next" onclick="plusSlides2(1)">❯</a>
                    </div>
                    <br>
                 
                    <!-- Navigation Dots-->
                    <div style="text-align:center">
                        <span class="navigation-dot2" onclick="currentSlide2(1)"></span>
                        <span class="navigation-dot2" onclick="currentSlide2(2)"></span>
                        <span class="navigation-dot2" onclick="currentSlide2(3)"></span>
                        <span class="navigation-dot2" onclick="currentSlide2(4)"></span>
                        <span class="navigation-dot2" onclick="currentSlide2(5)"></span>
                        <span class="navigation-dot2" onclick="currentSlide2(6)"></span>
                    </div>
                  <!-- Carousel : End -->
                <div class = "modal_body">  
                  <p style = "font-size: 15px">
                  Undergraduate Admission System 2020-2021 for Jatiya Kabi Kazi Nazrul Islam University (JKKNIU). In this system, 28907 applicants applied and confirmed the payment with Sonali bank payment gateway. The application charge was 400 taka. We worked as a team with 5 members to develop this system. I was the team leader of this project. There are three panels in this system: The applicant's Panel, Admin Panel, and Unit Panel. Its work was successfully completed on the 5th and 6th of January with the Viva + subject allocation. Earlier, through this system, admission applications were accepted from 12th December to 30th December and the merit list was successfully published on 3rd January.
                  <br>
                  
                  <small><b>Technologies: HTML, CSS, Bootstrap, Javascript, PHP, SQL, MySQL</b></small>
                  </p>
                  <div style="margin-top: 2rem">
                    <!-- <a type="button" class="btn" href="" target="_blank"
                      >Github</a
                    >
                    <a type="button" class="btn" href="" target="_blank"
                      >Live</a
                    > -->
                    <small><b>Github and Live Link are not available due to security reasons.</b></small>
                  </div>
                </div>
                <div class="modal_foot">
                  <button type="button" class="btn close_btn">Close</button>
                </div>
              </div>
            </div>
          </div>
        </article>
        <!-- End: GST Online Admission System -->

        <article>
          <div class="project_image card_btn">
            <img src="image/ovs-1.png" alt="project 3" />
          </div>

          <!--====== Modal-03 ======-->
          <div class="modal">
            <div class="modal_wrapper">
              <div class="modal_content">
                <div class="modal_head">
                  <h3 class="heading">A Secure E-Voting System</h3>
                  <small> <b>Duration:</b> 2020-2021(Jan-Feb)</small>
                  
                  <!-- Carousel: Start -->
                  <div class="carousel-container">
                      <div class="images3 fade">
                        <img src="image/ovs-1.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-2.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-3.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-4.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-5.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-6.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-7.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-8.png">
                      </div>
                      <div class="images3 fade">
                        <img src="image/ovs-9.png">
                      </div>
                       
                      <!-- Previous and Next Buttons -->
                      <a class="previous" onclick="plusSlides3(-1)">❮</a>
                      <a class="next" onclick="plusSlides3(1)">❯</a>
                  </div>
                  <br>
               
                  <!-- Navigation Dots-->
                  <div style="text-align:center">
                      <span class="navigation-dot3" onclick="currentSlide3(1)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(2)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(3)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(4)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(5)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(6)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(7)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(8)"></span>
                      <span class="navigation-dot3" onclick="currentSlide3(9)"></span>
                  </div>
                  <!-- Carousel : End -->
                  
                </div>
                <div class="modal_body">
                  <p style = "font-size: 15px;">
                    This is a web-based online voting system that will help a university to manage elections of teacher associations easily and securely. There are two panels.
                    <br>
                    
                    1. <strong>Admin:</strong>  He has the authority to manage candidates, manage voters, create an election, generate passwords for voters, send the passwords to voters, starting voting process, and finishing voting process.
                    <br>
                    
                    2. <strong>User:</strong> He/She has an id in his/her mail. They can use that ID for once to vote to their preferred candidates.
                    <br>
                    <small><b>Technologies: HTML, CSS, Bootstrap, Javascript, PHP, SQL, MySQL</b></small>
                    <br><br>
                    <strong>N.b: <i>This system has already been used twice in Jatiya Kabi Kazi Nazrul Islam University in 2021. Some online news portal have published news about this software </i> 
                    <a style = "color: blue" href="https://www.kalerkantho.com/online/miscellaneous/2021/05/04/1030355" target="_blank"> News Link1 </a>,
                    <a style = "color: blue" href="https://www.somoynews.tv/pages/details/277309" target="_blank">News Link2</a>.</strong>
                    <br>
                    
                    <strong>Certificate: <a style = "color: blue" href="https://drive.google.com/file/d/1CUsRD2nGJHjnyod8MD1WwqfZHyELYjOt/view?usp=share_link" target = "_blank">Google Drive</a></strong>
                  </p>
                  <div style="margin-top: 2rem">
                    <a
                      type="button"
                      class="btn"
                      href="https://github.com/RejwanAhmed/online_voting_system"
                      target="_blank"
                      >Github</a
                    >
                    <a
                      type="button"
                      class="btn"
                      href="https://onlinevotingsystem.rejwancse10.com/admin/"
                      target="_blank"
                      >Live</a
                    >
                  </div>
                </div>
                <div class="modal_foot">
                  <button type="button" class="btn close_btn">Close</button>
                </div>
              </div>
            </div>
          </div>
        </article>

        <article>
          <div class="project_image card_btn">
            <img src="image/hm-1.png" alt="project 3" />
          </div>

          <!--====== Modal-04 ======-->
          <div class="modal">
            <div class="modal_wrapper">
              <div class="modal_content">
                <div class="modal_head">
                  <h3 class="heading">Dolon-Chanpa Hall Management System</h3>
                  <small> <strong>Duration: </strong> 2020-2021(Jan-Apr)</small>
                   <!-- Carousel: Start -->
                   <div class="carousel-container">
                      <div class="images4 fade">
                        <img src="image/hm-1.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-2.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-3.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-4.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-5.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-6.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-7.png">
                      </div>
                      <div class="images4 fade">
                        <img src="image/hm-8.png">
                      </div>
                       
                      <!-- Previous and Next Buttons -->
                      <a class="previous" onclick="plusSlides4(-1)">❮</a>
                      <a class="next" onclick="plusSlides4(1)">❯</a>
                  </div>
                    <br>
                 
                  <!-- Navigation Dots-->
                  <div style="text-align:center">
                      <span class="navigation-dot4" onclick="currentSlide4(1)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(2)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(3)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(4)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(5)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(6)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(7)"></span>
                      <span class="navigation-dot4" onclick="currentSlide4(8)"></span>
                  </div>
                  <!-- Carousel : End -->
                </div>
                <div class="modal_body">
                  <p style = "font-size: 15px">
                    This is a web based system for managing information of Dolo-Chapa Hall at JKKNIU. It has only one panel which is admin. He is responsible for managing student information, account information, resource information, room allocation, student monthly bill, and many more.
                    <br>
                    <small><b>Technologies: HTML, CSS, Bootstrap, Javascript, PHP, SQL, MySQL</b></small>
                    
                  </p>
                  <div style="margin-top: 2rem">
                    <a
                      type="button"
                      class="btn"
                      href="https://github.com/RejwanAhmed/hall_management"
                      target="_blank"
                      >Github</a
                    >
                    <a
                      type="button"
                      class="btn"
                      href="https://dchallmanagement.rejwancse10.com/"
                      target="_blank"
                      >Live</a
                    >
                  </div>
                </div>
                <div class="modal_foot">
                  <button type="button" class="btn close_btn">Close</button>
                </div>
              </div>
            </div>
          </div>
        </article>

        <article>
          <div class="project_image card_btn">
            <img src="image/pb-1.png" alt="project 3" />
          </div>

          <!--====== Modal-05 ======-->
          <div class="modal">
            <div class="modal_wrapper">
              <div class="modal_content">
                <div class="modal_head">
                  <h3 class="heading">Project Book</h3>
                  <small> <strong>Duration:</strong> 2018(Jul-Dec)</small>
                </div>
                <!-- Carousel: Start -->
                <div class="carousel-container">
                  <div class="images5 fade">
                     <img src="image/pb-1.png">
                     </div>
                     <div class="images5 fade">
                        <img src="image/pb-2.png">
                     </div>
                     <div class="images5 fade">
                        <img src="image/pb-3.png">
                     </div>
                     <div class="images5 fade">
                        <img src="image/pb-4.png">
                     </div>
                     <div class="images5 fade">
                        <img src="image/pb-5.png">
                     </div>
                     <!-- Previous and Next Buttons -->
                     <a class="previous" onclick="plusSlides5(-1)">❮</a>
                     <a class="next" onclick="plusSlides5(1)">❯</a>
                 </div>
                 
                 <!-- Navigation Dots-->
                <div style="text-align:center">
                  <span class="navigation-dot5" onclick="currentSlide5(1)"></span>
                  <span class="navigation-dot5" onclick="currentSlide5(2)"></span>
                  <span class="navigation-dot5" onclick="currentSlide5(3)"></span>
                  <span class="navigation-dot5" onclick="currentSlide5(4)"></span>
                  <span class="navigation-dot5" onclick="currentSlide5(5)"></span>
                </div>
                 <!-- Carousel : End -->
                <div class="modal_body">
                  <p style = "font-size: 15px">
                    This is a system for collecting information of projects that have been done previously. This project is developed for keeping the record of previous projects which are taken by a student of a department so that new students can get idea of previous projects and can get their report also.
                    <br>
                    <small><b>Technologies: HTML, CSS, Bootstrap, Javascript, PHP, SQL, MySQL</b></small>
                  </p>
                  <div style="margin-top: 2rem">
                    <a
                      type="button"
                      class="btn"
                      href="https://github.com/RejwanAhmed/project_book"
                      target="_blank"
                      >Github</a
                    >
                    <a
                      type="button"
                      class="btn"
                      href="https://projectbook.rejwancse10.com/user/index.php"
                      target="_blank"
                      >Live</a
                    >
                  </div>
                </div>
                <div class="modal_foot">
                  <button type="button" class="btn close_btn">Close</button>
                </div>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
    <!-- My projects Section End Here -->

    <!-- Footer Section Start Here -->
    <footer style="margin-top: 5rem">
      <div class="container footer_container">
        <div class="footer_1">
          <a href="index.html" class="footer_logo">
            <h4>Rejwan</h4>
          </a>
          <p>
            This is all about myself. I hereby declare that the above information is true. You can contact me or call me for an interview. Thanks for visiting my portfolio.
        </div>

        <div class="footer_2">
          <h4>Permalinks</h4>
          <ul class="permalinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#projects">Projects</a></li>
          </ul>
        </div>

        <div class="footer_4">
          <h4 id="contact">Contact Me</h4>
          <div>
            <p> <i class = "fas fa-home"></i> 12/E, 3/78, Mirpur, Dhaka</p>
            <p><i class = "fas fa-phone"></i> +880 1775781898</p>
            <p><i class = "fas fa-envelope"></i><a href="mailto:rejwancse10@gmail.com" class="mail"
                > rejwancse10@gmail.com</a
              ></p>
          </div>
          <ul class="footer_social">
            <li>
              <a href="https://www.facebook.com/Rejwan.cse" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/rejwan_rj/" target="_blank">
                <i class="fa-brands fa-instagram"></i>
              </a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/md-rejwan-ahmed-338121166/"
                target="_blank"
              >
                <i class="fa-brands fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer_copyright">
        <small
          >Copyright &copy;
          <span id="current_year"></span>
          , DEVELOPER Rejwan</small
        >
      </div>
    </footer>
    <!-- Footer Section End Here -->
    
     <!-- Custom Javascript File Link -->
     <script src = "js/carousel_script.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>

