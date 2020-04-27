window.addEventListener('beforeunload', (event) => {

	if (window.performance) {
	  console.log("window.performance works fine on this browser");
	}

	watch.stop();

	// will not collect data from reloaded page 
	if (performance.navigation.type != 1)  {
		var fd = new FormData();
		fd.append('clicks', clicks);
		fd.append('formattedTime', gformattedTime);
		fd.append('timestmp', time_now);

		// only collect clicks less than 20  -- prevent duplicates for completed task
		if (clicks < 400) {
			var result = navigator.sendBeacon('onclose_SI.php', fd);
			if (result) console.log('Successful');
		}
	};
	
	//event.returnValue = `Thanks for participating!`;

});