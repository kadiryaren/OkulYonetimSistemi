let count = 0;
let list = ["url(../photos/sinif.jpg)","url(../photos/oglan.jpg)","url(../photos/girl.jpg)"]
setInterval(function(){ 
	$('body').css('background-image',list[count % 3]);
    count++;
}, 6000);//run this thang every 2 seconds