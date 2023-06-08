var slideIndex = new Array(2);
slideIndex[0]=1;
slideIndex[1]=1;

showSlides(1, 0);  
showSlides(1, 1);


function plusSlides(n, slideshownumber) 
{
  slideIndex[slideshownumber] = slideIndex[slideshownumber] + n; 
  showSlides( slideIndex[slideshownumber], slideshownumber );
}

function currentSlide(n, slideshownumber) 
{
  slideIndex[slideshownumber] = n;
  showSlides(slideIndex[slideshownumber], slideshownumber);
}

function showSlides(n, slideshownumber) 
{
  var i;
  var slideshowname = "slider" + slideshownumber;
  var slides = document.getElementsByName(slideshowname);
  var dotname = "dot" + slideshownumber;
  var dots = document.getElementsByName(dotname);

  if (n > slides.length) 
  {
      slideIndex[slideshownumber] = 1;
  }

  if (n < 1) 
  {
      slideIndex[slideshownumber] = slides.length;
  }

  for (i = 0; i < slides.length; i++) 
  {
      slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex[slideshownumber]-1].style.display = "block";
  dots[slideIndex[slideshownumber]-1].className += " active";
} 