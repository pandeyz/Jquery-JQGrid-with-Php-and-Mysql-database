<!DOCTYPE HTML>
<html>
<head>
<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css' />

<script type='text/javascript' src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js'></script>        
<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js'></script>
<script type='text/javascript' src='http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js'></script>

<script>
$(document).ready(function () {
   	$("#list2").jqGrid({
		url:'getGridData.php', 
		datatype: "json",
		colNames:['EMP ID','LAST NAME', 'FIRST NAME', 'BIRTH DATE','ADDRESS','CITY','REGION','COUNTRY'], 
		colModel:[ {name:'EmployeeID',index:'EmployeeID', width:50,classes: 'cvteste'}, 
		   {name:'LastName',index:'LastName', width:90,classes: 'cvteste'}, 
		   {name:'FirstName',index:'FirstName', width:80,classes: 'cvteste'},
		   {name:'BirthDate',index:'BirthDate', width:135,align:"center",classes: 'cvteste'},
		   {name:'Address',index:'Address', width:150, sortable:false,classes: 'cvteste'},
		   {name:'City',index:'City', width:60, sortable:false,classes: 'cvteste'},
		   {name:'Region',index:'Region', width:70, sortable:false,classes: 'cvteste'},
		   {name:'Country',index:'Country', width:70, sortable:false,classes: 'cvteste'}	   
		],
		rowNum:2, 
		//rowList:[10,20,30], 
		rowList:[2,4,6,8], 
		pager: '#pager2', 
		sortname: 'EmployeeID', 
		recordpos: 'left', 
		viewrecords: true, 
		sortorder: "asc", 
		height: '100%'
   });
});
</script>
<title>jqGrid Demo</title>
</head>
<body>
	<table id="list2"></table> 
	<div id="pager2" ></div>	
</body>
</html>