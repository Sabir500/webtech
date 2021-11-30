function myfunc() 
{
	var x=document.getElementById('fname').value; 
	var y=document.getElementById('pwd').value;

	if (x.length<3)
	{
		document.getElementById('print').innerHTML = "username must be 3 characters or more"
	}

	else
	{
		document.getElementById('print').innerHTML = "your username: "+x;
	}

	if (pwd.length < 8)
	{
	document.getElementById('print').innerHTML = "password must be filled with 8 characters ";
	return false;
	} 
}

