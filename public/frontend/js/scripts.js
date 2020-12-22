// JavaScript Document
var temp = document.getElementById("soluong").value;
var pri = document.getElementById("gia").innerText;
var giagoc = Number(pri);

$("#cong").click(function(){
	var temp = document.getElementById("soluong").value;
	var qual = Number(temp);
	qual += 1;
	document.getElementById("soluong").value = qual;
	
	document.getElementById("gia").innerText = giagoc * qual;
});
$("#tru").click(function(){
	var temp = document.getElementById("soluong").value;
	var qual = Number(temp);
	qual -= 1;
	document.getElementById("soluong").value = qual;
	
	document.getElementById("gia").innerText = giagoc * qual;
});
