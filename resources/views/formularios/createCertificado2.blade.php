<html>
<body onload="displayData()">
<div class="row">
    <form action="/prueba" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-4"><div id="dataList"> </div></div>
    <div class="col-sm-4"><div id="radioBtn"></div></div>
    <div class="row mt-4">
        <div class="col-sm-5 mx-auto text-center">
            <button class="btn btn-primary btn-lg">Emitir Certificado</button>
        </div>
    </div>
    </form>
  
</div>
<script>
    function displayData()
{
	var data=['Apple', 'Banana', 'Kiwi'];
	var output="";
	var output2="";
	var dataList;
	
	for(var i=0; i< data.length; i++)
	{
		dataList=data[i];
		
		output2+= 'yes:<input type="radio" value="si" name="medicamentos[]">'+'no:<input type="radio" value="yes" name="medicamentos[]">'+'<br><br>';
		output2+= 'yes:<input type="radio" value="si" name="medicamentos[]">'+'no:<input type="radio" value="yes" name="medicamentos[]">'+'<br><br>';

		
		document.getElementById("radioBtn").innerHTML=output2;
	}
}
</script>
</body>
</html>