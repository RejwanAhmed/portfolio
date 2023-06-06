    // <!--Start: Script for Carousel: 1st  -->
    // <script>
      var currentIndex1 = 1;
      
      //Show current image
      showSlides1(currentIndex1);
      
      //Function to move Next
      function plusSlides1(n) {
         showSlides1(currentIndex1 += n);
      }
      
      //Function to move back
      function currentSlide1(n) {
         showSlides1(currentIndex1 = n);
      }
      
      
      //Initiate moving of slides
      function showSlides1(n) {
         var i;
         var slides = document.getElementsByClassName("images1");
         var dots = document.getElementsByClassName("navigation-dot1");
         if (n > slides.length) {currentIndex1 = 1}
         if (n < 1) {currentIndex1 = slides.length}
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
         }
         for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
         }
         slides[currentIndex1-1].style.display = "block";
         dots[currentIndex1-1].className += " active";
      }
    // </script>
    // <!--End: Script for Carousel: 1st  -->
    
    
    // <!--Start: Script for Carousel: 2nd  -->
    // <script>
      var currentIndex2 = 1;
      
      //Show current image
      showSlides2(currentIndex2);
      
      //Function to move Next
      function plusSlides2(n) {
         showSlides2(currentIndex2 += n);
      }
      
      //Function to move back
      function currentSlide2(n) {
         showSlides2(currentIndex2 = n);
      }
      
      
      //Initiate moving of slides
      function showSlides2(n) {
         var i;
         var slides = document.getElementsByClassName("images2");
         var dots = document.getElementsByClassName("navigation-dot2");
         if (n > slides.length) {currentIndex2 = 1}
         if (n < 1) {currentIndex2 = slides.length}
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
         }
         for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
         }
         slides[currentIndex2-1].style.display = "block";
         dots[currentIndex2-1].className += " active";
      }
    // </script>
    // <!--End: Script for Carousel: 2nd  -->
    
    // <!--Start: Script for Carousel: 3rd  -->
    // <script>
      var currentIndex3 = 1;
      
      //Show current image
      showSlides3(currentIndex3);
      
      //Function to move Next
      function plusSlides3(n) {
        showSlides3(currentIndex3 += n);
      }
      
      //Function to move back
      function currentSlide2(n) {
        showSlides3(currentIndex3 = n);
      }
      
      
      //Initiate moving of slides
      function showSlides3(n) {
         var i;
         var slides = document.getElementsByClassName("images3");
         var dots = document.getElementsByClassName("navigation-dot3");
         if (n > slides.length) {currentIndex3 = 1}
         if (n < 1) {currentIndex3 = slides.length}
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
         }
         for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
         }
         slides[currentIndex3-1].style.display = "block";
         dots[currentIndex3-1].className += " active";
      }
    // </script>
    // <!--End: Script for Carousel: 3rd  -->
    
    //  <!--Start: Script for Carousel: 4th  -->
    //  <script>
      var currentIndex4 = 1;
      
      //Show current image
      showSlides4(currentIndex4);
      
      //Function to move Next
      function plusSlides4(n) {
        showSlides4(currentIndex4 += n);
      }
      
      //Function to move back
      function currentSlide4(n) {
        showSlides4(currentIndex4 = n);
      }
      
      
      //Initiate moving of slides
      function showSlides4(n) {
         var i;
         var slides = document.getElementsByClassName("images4");
         var dots = document.getElementsByClassName("navigation-dot4");
         if (n > slides.length) {currentIndex4 = 1}
         if (n < 1) {currentIndex4 = slides.length}
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
         }
         for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
         }
         slides[currentIndex4-1].style.display = "block";
         dots[currentIndex4-1].className += " active";
      }
    // </script>
    // <!--End: Script for Carousel: 4th  -->
  
    // <!--Start: Script for Carousel: 5th  -->
    // <script>
      var currentIndex5 = 1;
      
      //Show current image
      showSlides5(currentIndex5);
      
      //Function to move Next
      function plusSlides5(n) {
         showSlides5(currentIndex5 += n);
      }
      
      //Function to move back
      function currentSlide5(n) {
         showSlides5(currentIndex5 = n);
      }
      
      
      //Initiate moving of slides
      function showSlides5(n) {
         var i;
         var slides = document.getElementsByClassName("images5");
         var dots = document.getElementsByClassName("navigation-dot5");
         if (n > slides.length) {currentIndex5 = 1}
         if (n < 1) {currentIndex5 = slides.length}
         for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
         }
         for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
         }
         slides[currentIndex5-1].style.display = "block";
         dots[currentIndex5-1].className += " active";
      }
    // </script>
    // <!--End: Script for Carousel: 5th  -->