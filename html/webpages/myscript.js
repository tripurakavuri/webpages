var myImage=document.getElementById("img1");
var imageArray=["general.jpg","image.jpg","intensive.jpg"];
var imageIndex=0;

function changeImage() {
	document.img1.src=imageArray[imageIndex];
	if (imageIndex<imageArray.length) {

		imageIndex++;
	}
	else{
		imageIndex=0;
	}
}

var intervalHandle=setInterval("changeImage()",1000);
img1.onclick=function(){
	clearInterval(intervalHandle);
}

