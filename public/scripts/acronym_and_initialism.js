$(document).ready(function()
{
	var num = 1;
	var name;
	$("#increaseListButton").click(function()
	{
		name = 'list' + num;
		$("#listArea").append("<label for='" + name + "'>" + name + " </label><textarea row='3' cols='50' name='" + name + "'></textarea><br>");
		num++;
	});
 

});
