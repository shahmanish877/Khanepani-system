
	var end = new Date();
	$(document).ready(function(){
		$('#nepaliDateD').nepaliDatePicker({
			disableBefore: '12/08/2073',
			disableAfter: '12/20/2073'
		});
		$('#nepaliDateD1').nepaliDatePicker({
			disableDaysBefore: '10',
			disableDaysAfter: '10'
		});

		$('#nepaliDate5').nepaliDatePicker({
			npdMonth: true,
			npdYear: true,
			npdYearCount: 10
		});
		$('#nepaliDate').nepaliDatePicker({
			ndpEnglishInput: 'englishDate'
		});
		

		$('#nepaliDate1').nepaliDatePicker({
			onChange: function(){
				alert('ss');
			}
		});
		
		$('#nepaliDate2').nepaliDatePicker();
		$('#nepaliDate3').nepaliDatePicker({
			onFocus: false,
			npdMonth: true,
			npdYear: true,
			ndpTriggerButton: true,
			ndpTriggerButtonText: 'Date',
			ndpTriggerButtonClass: 'btn btn-primary btn-sm'
		});

		$('#englishDate').change(function(){
			$('#nepaliDate').val(AD2BS($('#englishDate').val()));
		});

		$('#englishDate9').change(function(){
			$('#nepaliDate9').val(AD2BS($('#englishDate9').val()));
		});

		$('#nepaliDate9').change(function(){
			$('#englishDate9').val(BS2AD($('#nepaliDate9').val()));
		});

		
	});
