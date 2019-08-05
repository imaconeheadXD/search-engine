function addItem() {
  var i = document.getElementById("site-area");
  var candidate = document.getElementById("newItem");
  var anchor = document.createElement("a");
  var br = document.createElement("br");
  var checkbox = document.createElement('input');
  checkbox.type = "checkbox";
  checkbox.name = "name";
  checkbox.value = "value";
  var hr = document.createElement("hr");

  // var newLink = "<input name=\"checkThis\" class=\"form-check-input \" type=\"checkbox\" id=\"blankCheckbox\" value=\">"+" "+"<a target=\"_blank\" href=\""+candidate.value+"\" >"+candidate.value+"</a>";
  // document.getElementById("site-area").innerHTML = newLink;
  // p.setAttribute('href',candidate.value);
  // p.href = "https://"+candidate.value;
  //  i.appendChild(document.createTextNode(candidate.value));
  //  i.appendChild(p);
  //  i.appendChild(br);
  anchor.setAttribute('href',candidate.value);
  anchor.innerHTML = candidate.value;
  i.appendChild(checkbox);
  i.appendChild(anchor);
  i.appendChild(hr);



  document.getElementById("site-area").style.textAlign="center";

}

function removeItems() {

}

function selectAll() {
		  var items = document.getElementsByName('checkThis');
		    for (var i = 0; i < items.length; i++) {    
		        if (items[i].type == 'checkbox')    
		            items[i].checked = true;    
		    }    
		}

function deselectAll() {
		var items = document.getElementsByName('checkThis');
		  for (var i = 0; i < items.length; i++) {    
		      if (items[i].type == 'checkbox')    
		          items[i].checked = false;    
		}    
}
