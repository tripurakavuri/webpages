var myImage=document.img1;
var imageArray=["Study.jpg","general.jpg","image.jpg","intensive.jpg"];
var imageIndex=0;

function changeImage() {
  document.img1.src=imageArray[imageIndex];
 
  if (imageIndex<imageArray.length-1) {
    
    imageIndex++;
  }
  else{
    imageIndex=0;
  }
}

var intervalHandle=setInterval("changeImage()",2000);
img1.onclick=function(){
	clearInterval(intervalHandle);
}

