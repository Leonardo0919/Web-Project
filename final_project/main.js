function AJAX(urlparam,callBackFunction)
{
    let httpRequest = new XMLHttpRequest();
    httpRequest.open("GET", urlparam);
    httpRequest.send();
    // hopefully the itunes server will respond with something. When it does, we need to handle that event
    httpRequest.onreadystatechange = function() 
    {
    // This code will run when some kind of response has come back.
        if(httpRequest.readyState == 4)
        {
            // We've gotten a full repsonse back
            if( httpRequest.status == 200 )
            {
                // http code 200 means succes
                callBackFunction(httpRequest.responseText);
            }
            else 
            {
                // Probably got some error
                document.querySelector("#text").innerHTML="Showing 0 of 0 result(s)";
                alert("The resources you requested could not be found !");
               
            }
        }
    }		
}
function displayResults(responseParam)
{
    let body=document.querySelector(".table_body");
    let result = JSON.parse(responseParam);
    console.log(result);
    if(result.results.length==0){

        document.querySelector("#text").innerHTML="Showing 0 of 0 result(s)";
        alert("The resources you requested could not be found !");   
    }
    else
    {

            //create a row for calory
            let row_calory = document.createElement("tr");
            let calory = document.createElement("td");
            let num_of_calory = document.createElement("td");
            calory.innerHTML = "Calories";
            num_of_calory.innerHTML = result.calories;
            row.appendChild(calory);
            row.appendChild(num_of_calory);
            body.appendChild(row_calory);

            //create a row for fat

            let row_fat = document.createElement("tr");
            let fat = document.createElement("td");
            let num_of_fat = document.createElement("td");
            fat.innerHTML = "Total Fat";
            num_of_fat.innerHTML = result.FAT.quantity+"g";
            row.appendChild(fat);
            row.appendChild(num_of_fat);
            body.appendChild(row_fat);


    }
    
}
let searchInput = document.querySelector("#item_name").innerHTML.trim();
let url= "https://api.edamam.com/api/nutrition-details?app_id=${60a0ad2d}&app_key=${d63fb83546011901de306f070f2ff9ce}" + searchInput;
console.log(url);
AJAX(url,displayResults);



