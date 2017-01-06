// webrtc script file
var img1;
var canvas;
 base1 = new Image();
 base1.src = 'img/frame.png';
var webrtc = (function() {

    var getVideo = true,
        getAudio = true,
        
        //creating video tag
        video = document.createElement('video'),

        
        display = document.getElementById('display'),
        displayContext = display.getContext('2d'),
        photo1 = document.getElementById('photo'),
        context = photo1.getContext('2d');
		//glasses = new Image();
		//glasses.src = "../img/like.png";
	display.style.visibility='visible';
        photo.style.visibility='hidden';
		
    navigator.getUserMedia ||
        (navigator.getUserMedia = navigator.mozGetUserMedia ||
        navigator.webkitGetUserMedia || navigator.msGetUserMedia);

    window.audioContext ||
        (window.audioContext = window.webkitAudioContext);

    window.requestAnimationFrame ||
        (window.requestAnimationFrame = window.webkitRequestAnimationFrame || 
            window.mozRequestAnimationFrame || 
            window.oRequestAnimationFrame || 
            window.msRequestAnimationFrame || 
        function( callback ){
            window.setTimeout(callback, 1000 / 60);
        });

    function onSuccess(stream) {
        var videoSource,
            audioContext,
            mediaStreamSource;

        if (getVideo) {
            if (window.webkitURL) {
                videoSource = window.webkitURL.createObjectURL(stream);
            } else {
                videoSource = stream;
            }

           video.autoplay = true;
           video.src = videoSource;

            //display.width = 220;
            //display.height=260;
            
            //display canvas
            displayContext.translate(display.width,0);
            displayContext.scale(-1,1);
            streamFeed();
        }

        if (getAudio && window.audioContext) {
            audioContext = new window.audioContext();
            mediaStreamSource = audioContext.createMediaStreamSource(stream);
            mediaStreamSource.connect(audioContext.destination);
        }
    }

    function onError() {
        alert('There has been a problem retreiving the streams - are you running on file:/// or did you disallow access?');
    }
	function back(){
		location.reload();
		//context.clearRect(0, 0, photo.width, photo.height);
		display.style.visibility='visible';
                photo.style.visibility='hidden';
		
		
	}
	function convertCanvasToImage(canvas) {
  //var image = new Image();
  
	var image = canvas.toDataURL("image/png");
	//image.onload=function(){
		
	return image;
	//}
  
        }


    //download image in photo canvas
    function downloadCanvas(link,canvasId,filename) {
        link.href = document.getElementById(canvasId).toDataURL();
        link.download = filename;
        
    }
    //add event to download button
    document.getElementById('download').addEventListener('click',function(){
        downloadCanvas(this,'photo','test.png');
    }, false);
    
    //add image to canvas
    function additem(item){
        
        var name="img/vr/";
        name+=item;
        //var canvas=new fabric.Canvas('photo');
        canvas.remove(img1);
        fabric.Image.fromURL(name, function(img2) {
            
            img1=img2;
        canvas.add(img1.set({ left: 250, top: 150, angle:0 }).scale(0.25));
    });
    }
    //take photos
    function takePhoto() {
        
        display.style.visibility='hidden';
        photo.style.visibility='visible';
        document.getElementById("mask").style.display="none";
       // photo.width = display.width;
       // photo.height = display.height;

        context.drawImage(display, 0, 0, photo1.width, photo1.height);
		//var img=context.getImageData(0, 0, photo.width, photo.height);
	var img=convertCanvasToImage(photo);
		
        canvas=new fabric.Canvas('photo');
		//canvas.clear();
	alert("done");
        //canvas.add(new fabric.Circle({ radius: 30, fill: '#f55'}));
        fabric.Image.fromURL('img/vr/neck1.png', function(img2) {
            img1=img2;
        canvas.add(img1.set({ left: 275, top: 190, angle:0 }).scale(0.15));
        });
		//canvas.add(new fabric.Image.fromURL('../img/like.png',function(img) {
            /*img.set({
                left: fabric.util.getRandomInt(0, 10),
                top: fabric.util.getRandomInt(0, 10),
                angle: fabric.util.getRandomInt(0, 90)
            
            });
            img.scale(fabric.util.getRandomInt(10, 50) / 10);
        canvas.add(img);
        }); */
        canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
		
	}
    function requestStreams() {
        if (navigator.getUserMedia) {
            navigator.getUserMedia({
                video: getVideo,
                audio: getAudio
            }, onSuccess, onError);
        } else {
            alert('getUserMedia is not supported in this browser.');
        }
    }

    function streamFeed() {
		
        requestAnimationFrame(streamFeed);
		//displayContext.translate(display.width,0);
		//displayContext.scale(-1,1);
        displayContext.drawImage(video, 0, 0, display.width, display.height);
        
        //displayContext.drawImage(base1, 0, 0, display.width, display.height);
		//displayContext.scale(-1,1);
		//displayContext.drawImage(glasses,100,150,70,70);
    }

    function initEvents() {
        var photoButton = document.getElementById('takePhoto');
        photoButton.addEventListener('click', takePhoto, false);
	var photoButton2 = document.getElementById('takePhoto2');
        photoButton2.addEventListener('click', back, false);
    }
    
    //initially happen function
    (function init() {
        //get stream
        requestStreams();
        //initialling cliick events
        initEvents();
    }());
    
    $('#jtype a').on('click',function(){
    var value=$(this).attr('value');
    //alert(value);
    additem(value);
});
})();

//add jewellery image to canvas




