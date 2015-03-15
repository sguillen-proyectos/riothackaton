(function($) {
  var photoCellChart, ultrasonicChart;
  var photoCellData = [], ultrasonicData = [];
  function startStreaming() {
    bridge = new BeehiveBridge({
      wsUrl: 'http://' + document.domain +':9999/echo',
      deviceKey: 'riot_mqtt'
    });

    bridge.on('connect', function() {
      console.log('TEST CONNECTED');

      bridge.subscribe('sensor/camera', function(res) {
        try {
          var image = document.getElementById('camera');
          image.src = 'data:image/jpg;base64,'  + res.data;
        } catch(e) {
          console.log("ERROR: ", res.data, e);
        }
      });
      bridge.subscribe('sensor/photocell', function(res) {
        var value = parseFloat(res.data);
        console.log('photocell', value);
          if (value > 10000) {
            value = 10000;
          }
          photoCellData.push([photoCellData.length+1, value]);
          photoCellChart.setData([photoCellData]);
          photoCellChart.setupGrid();
          photoCellChart.draw();
      });
      bridge.subscribe('sensor/ultrasonic', function(res) {
        var value = parseFloat(res.data);
        console.log('ultrasonic', value);
        if (value > 300) {
          value = 300;
        }
        ultrasonicData.push([ultrasonicData.length+1, value]);
        ultrasonicChart.setData([ultrasonicData]);
        ultrasonicChart.setupGrid();
        ultrasonicChart.draw();
      });
    });

    bridge.on('error', function(err) {
      console.log('TEST ERROR', err);
    });

    bridge.connect();
  }

  $(document).ready(function() {
    startStreaming();
    $('#photo-cell').height('300px');
    $('#ultrasonic').height('300px');
    photoCellChart = $.plot("#photo-cell", [ [] ], {
      yaxis: {
        min: 0,
        max: 10000
      },
      xaxis: {
        show: false
      }
    });
    ultrasonicChart = $.plot("#ultrasonic", [ [] ], {
      yaxis: {
        min: 0,
        max: 300
      },
      xaxis: {
        show: false
      }
    });
  });
}).call(document, jQuery);
