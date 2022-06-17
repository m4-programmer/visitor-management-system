
 							
									(function() {
  
  const video = document.querySelector('#basic video');
  const audio = document.querySelector('#basic audio');

  canvas = document.getElementById('canvas');
  context = canvas.getContext('2d');
  photo = document.getElementById('photo');
  visitor = document.getElementById('visitors');


  
  const captureVideoButton = document.querySelector('#basic .capture-button');
  const stopVideoButton = document.querySelector('#basic #stop-button');
  const retakeVideoButton = document.querySelector('#basic #retake-button');
  
  //Capture Video
  captureVideoButton.onclick = function() {
    // trigger the video display to block
    stopVideoButton.style.display = "inline-block";
    // set video panel to take the picture to true

      video.style.display = "block";
      captureVideoButton.style.display = "none";
      // Set the image src to none 
      photo.setAttribute('src','');
      photo.style.display = "none";
     navigator.mediaDevices.getUserMedia({
      audio: false,
      video: true
    })
    .then(stream => {
      window.localStream = stream;
      video.srcObject = stream;
     // audio.srcObject = stream;
    })
    .catch((err) => {
      console.log(err);
    });
  };
  
  stopVideoButton.onclick = function() {
    // Once a User click on take photo, stop the camera and take their photo
    // make video  hidden 
    video.style.display = "none";
    //and image block
    photo.style.display = "block";
   
    captureVideoButton.innerHTML = "Retake Image";
    captureVideoButton.style.display = "inline-block";
    stopVideoButton.style.display = "none";
    
    context.drawImage(video, 0,0,400,300);
    photo.setAttribute('src', canvas.toDataURL('visitor/jpg'));
    localStream.getVideoTracks()[0].stop();
    video.src = '';
    visitor.value = canvas.toDataURL('visitor/jpg');
    
   // localStream.getAudioTracks()[0].stop();
    //audio.src = '';
   
  };
})();


								