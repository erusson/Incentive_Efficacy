

// prevent spacebar scrolling                
window.onkeydown = function(e) {
    if(e.keyCode == 32 && e.target == document.body) {
        e.preventDefault();
        return false;
    }
};   

var gformattedTime = 0;

function Stopwatch() {

  var time = 0;

  var interval;

  var offset;

  function update() {
    if (this.isOn) {
        time += delta();
    }
    var formattedTime = timeFormatter(time);
    // console.log(formattedTime)
    document.getElementById("run_time").value = formattedTime;
    gformattedTime = formattedTime;
  }

  function delta () {
    var now = Date.now()
    var timePassed = now - offset;
    offset = now;
    return timePassed;
  }

  function timeFormatter(a) {
    var time = new Date(a); 
    var minutes = time.getMinutes().toString();
    var seconds = time.getSeconds().toString();
    var milliseconds = time.getMilliseconds().toString();

    if (minutes.length < 2) {
      minutes = "0" + minutes;
    }

    if (seconds.length < 2) {
      seconds = "0" + seconds;
    }

    while (milliseconds.length < 3) {
      milliseconds = '0' + milliseconds;
    }

    return minutes + ' : ' + seconds + ' . ' + milliseconds;
  }

  this.isOn = false;

  this.start = function() {
    if (!this.isOn) {
        interval = setInterval(update.bind(this), 10);
        offset = Date.now();
        this.isOn = true;
    }
  };
  this.stop = function() {
    if (this.isOn) {
        clearInterval(interval);
        interval = null;
        this.isOn = false;
    }
  };
};

var clicks = 0;
var watch = new Stopwatch()

watch.start()

var onClick =
document.querySelector( 'clicks');
document.body.onkeyup = function(e) {
    if( e.keyCode == 32 ) {
        addClick();
    }
}

var addClick = function() {
    clicks ++;
    document.getElementById("clicks").innerHTML = clicks;
    document.getElementById("total_clicks").value = clicks;
    if (clicks >= 400){
      modal.style.display = "block";
      watch.stop();
    }
  
    renderClicks();
}

var renderClicks = function() {
    onClick.innerHTML = 'clicks'
   
};

var dt = new Date();
var time_now = dt.toUTCString();
console.log(time_now);
document.getElementById("time_now").value = time_now;

