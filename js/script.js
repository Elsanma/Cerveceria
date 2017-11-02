var myvids = [];
var valid = [];
var myvid = document.getElementById('myvideo');
var activeVideo = 0;

function play(){
  myvid.addEventListener('ended', addVideos);
}

function addVideos(e){
  if(activeVideo+1 === myvids.length){
    myvid.removeEventListener('ended', addVideos)
  }
  // update the video source and play
  myvid.src = myvids[activeVideo];
  myvid.play();
  // update the new active video index
  activeVideo = (++activeVideo);
}

function macerar(){
  myvids.push("videos/maceracion.mp4");
  valid.push(1);
}
function hervir(){ 
  myvids.push("videos/hervor.mp4");
  valid.push(2);
}
function enfriar(){
  myvids.push("videos/enfriado.mp4");
  valid.push(3);
}
function fermentar(){
  myvids.push("videos/fermentacion.mp4");
  valid.push(4);
}
function madurar(){
  myvids.push("videos/maduracion.mp4");
  valid.push(5);
}
function embotellar(){
  myvids.push("videos/embotellamiento.mp4");
  valid.push(6);
}

