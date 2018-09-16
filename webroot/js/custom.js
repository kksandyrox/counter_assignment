$(document).ready(function(){

	function getUnits() {
		var units;
    	 $.ajax({
	        url: '/units/getUnits',
	        type: 'get',
	        dataType: 'html',
	        async: false,
	        success: function(data) {
	            units = JSON.parse(data);
	            console.log('Units', units);
	        } 
	     });
		return units;
	}

	function getCounters() {
		var counters;
    	 $.ajax({
	        url: '/counters/getCounters',
	        type: 'get',
	        dataType: 'html',
	        async: false,
	        success: function(data) {
	            counters = JSON.parse(data);
	            console.log('Counters', counters);
	        } 
	     });
		return counters;		
	}
 
	 $('.modal').modal();

	$("#counter-name, #counter-name-modal").autocomplete({
		data: getCounters(),
		minLength: 1
	});

	$("#unit-name, #unit-name-modal").autocomplete({
		data: getUnits(),
		minLength: 0
	});

	$('#start-date').datepicker({
		format: "yyyy-mm-dd"
	});
	$('#end-date').datepicker({
		format: "yyyy-mm-dd"
	});

    function createBackgroundColor() {
    	var bgColors = [];
   		for(var i = 0; i < 40 ; i++) {
   			var rgbaString = 'rgba(' + getRandom() + ',' + getRandom() + ',' + getRandom() + ', 0.2)';
   			bgColors.push(rgbaString);
   		}
   		return bgColors;
    }

    function createBorderColor() {
    	var bdColors = [];
   		for(var i = 0; i < 40 ; i++) {
   			var rgbaString = 'rgba(' + getRandom() + ',' + getRandom() + ',' + getRandom() + ', 1)';
   			bdColors.push(rgbaString);
   		}
   		return bdColors;
    }

    function getRandom() {
    	return Math.floor(Math.random() * 255) + 1  
    }

    function getLabels() {
    	var values = $("#labels").data("values");
    	console.log('Labels', values)
    	return values;
    }

    function getValues() {
    	var values = $("#stat-values").data("values");
    	console.log('Values', values)
    	return values;
    }

    function getUnitName() {
    	var values = $("#zzz").data("values");
    	console.log('Values', values)
    	return values;
    }

    if($("#myChart").length) {
	    var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: getLabels(),
		        datasets: [{
		            label: getUnitName(),
		            data: getValues(),
		            backgroundColor: createBackgroundColor(),
		            borderColor: createBorderColor(),
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }],
		           	xAxes: [{
		                ticks: {
		                    autoSkip:false
		                }
		            }]
		        }
		    }
		});
    }

    $(".modal-trigger").click(function(e) {
    	console.log($(this).data('usercounterid'))
    	var userCounterId = $(this).data('usercounterid');
		$.ajax({
        	type: "POST",
        	data: {id: $(this).data('usercounterid')},
        	url: '/userCounters/getUserCounterData/',
			beforeSend: function (xhr) { // Add this line
		        xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
		    }
    	}).done(function(data){
    		var userCounterData = JSON.parse(data);
    		console.log(userCounterData);
    		$("#counter-name-modal").val(userCounterData.counter_name);
    		$("#unit-name-modal").val(userCounterData.unit_name);
    		$("#quantity-modal").val(userCounterData.quantity);
    		$("#user-counter-id-modal").val(userCounterData.user_counter_id);
    		$("#user-counter-edit-form").attr('action', '/usercounters/edit/' + userCounterData.user_counter_id);

    	});
    });

});